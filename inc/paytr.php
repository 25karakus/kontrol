<?php
class PayTR {
    private $merchant_id;
    private $merchant_salt;
    private $merchant_key;
    private $test_mode = 0; // Test modu için 1, gerçek mod için 0

    public function __construct() {
        // PayTR merchant bilgilerini config dosyanızdan alın veya burada tanımlayın
        $this->merchant_id = 'Sizin_Merchant_ID';
        $this->merchant_salt = 'Sizin_Merchant_Salt';
        $this->merchant_key = 'Sizin_Merchant_Key';
    }

    public function odemeYap($siparis_id, $siparis_tutari, $kart_numarasi, $son_kullanma_tarihi, $cvv) {
        $post_values = array(
            'merchant_id' => $this->merchant_id,
            'merchant_salt' => $this->merchant_salt,
            'merchant_oid' => $siparis_id,
            'email' => $_SESSION['kullanici_eposta'], // Müşteri e-posta adresi
            'payment_amount' => $siparis_tutari * 100, // Tutar kuruş cinsinden
            'paytr_token' => $this->generateToken($siparis_id, $siparis_tutari),
            'user_ip' => $_SERVER['REMOTE_ADDR'],
            'user_name' => $_SESSION['kullanici_adi'], // Müşteri adı
            'user_address' => $_SESSION['kullanici_adresi'], // Müşteri adresi
            'user_phone' => $_SESSION['kullanici_telefon'], // Müşteri telefon numarası
            'merchant_ok_url' => 'odeme_basarili.php', // Başarılı ödeme sonrası yönlendirilecek sayfa
            'merchant_fail_url' => 'odeme_basarisiz.php', // Başarısız ödeme sonrası yönlendirilecek sayfa
            'user_basket' => base64_encode(json_encode(array(
                array('Ürün Adı', $siparis_tutari, 1)
            ))),
            'debug_on' => $this->test_mode,
            'test_mode' => $this->test_mode,
            'no_installment' => 1,
            'card_no' => $kart_numarasi,
            'card_exp_month' => substr($son_kullanma_tarihi, 0, 2),
            'card_exp_year' => substr($son_kullanma_tarihi, 3, 2),
            'card_cvv' => $cvv
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_values));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return array('durum' => 'hata', 'hata_mesaji' => curl_error($ch));
        }

        curl_close($ch);

        $json = json_decode($result, true);

        if ($json['status'] == 'success') {
            return array('durum' => 'basarili', 'token' => $json['token']);
        } else {
            return array('durum' => 'hata', 'hata_mesaji' => $json['reason']);
        }
    }

    private function generateToken($siparis_id, $siparis_tutari) {
        $hash_str = $this->merchant_id . $siparis_id . $siparis_tutari * 100 . $_SESSION['kullanici_eposta'] . $this->merchant_salt;
        return base64_encode(hash_hmac('sha256', $hash_str, $this->merchant_key, true));
    }
}
?>