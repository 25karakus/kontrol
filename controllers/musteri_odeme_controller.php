<?php
require_once '../models/odeme_model.php';
require_once '../inc/paytr.php';
require_once '../inc/netgsm.php';

class MusteriOdemeController {
    private $odeme_model;
    private $paytr;
    private $netgsm;

    public function __construct() {
        $this->odeme_model = new OdemeModel();
        $this->paytr = new PayTR();
        $this->netgsm = new Netgsm();
    }

    public function gonderEposta($alici, $konu, $mesaj) {
        $baslik = 'From: webmaster@example.com' . "\r\n" .
                   'Reply-To: webmaster@example.com' . "\r\n" .
                   'Content-type: text/html; charset=utf-8' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        mail($alici, $konu, $mesaj, $baslik);
    }

    public function odemeYap() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kart_numarasi = $_POST['kart_numarasi'];
            $son_kullanma_tarihi = $_POST['son_kullanma_tarihi'];
            $cvv = $_POST['cvv'];

            $paytr_sonuc = $this->paytr->odemeYap(
                $_SESSION['siparis_id'],
                $_SESSION['siparis_tutari'],
                $kart_numarasi,
                $son_kullanma_tarihi,
                $cvv
            );

            if ($paytr_sonuc['durum'] == 'basarili') {
                $this->odeme_model->siparisOnayla($_SESSION['siparis_id']);

                // Müşteriye e-posta gönder
                $this->gonderEposta(
                    $_SESSION['kullanici_eposta'],
                    'Sipariş Ödeme Başarılı',
                    'Siparişiniz başarıyla ödendi. Sipariş numaranız: ' . $_SESSION['siparis_id'] . "\n" .
                    'Ödeme tutarı: ' . $_SESSION['siparis_tutari'] . ' TL'
                );

                // Yöneticiye e-posta gönder
                $this->gonderEposta(
                    'yonetici@example.com',
                    'Yeni Sipariş Ödeme Başarılı',
                    'Yeni bir sipariş başarıyla ödendi. Sipariş numaranız: ' . $_SESSION['siparis_id'] . "\n" .
                    'Müşteri e-postası: ' . $_SESSION['kullanici_eposta'] . "\n" .
                    'Ödeme tutarı: ' . $_SESSION['siparis_tutari'] . ' TL'
                );

                // Müşteriye SMS gönder
                $musteri_sms_sonuc = $this->netgsm->smsGonder(
                    $_SESSION['kullanici_telefon'],
                    'Siparişiniz başarıyla ödendi. Sipariş numaranız: ' . $_SESSION['siparis_id']
                );

                // Yöneticiye SMS gönder
                $yonetici_sms_sonuc = $this->netgsm->smsGonder(
                    'Yönetici_Telefon_Numarası',
                    'Yeni bir sipariş başarıyla ödendi. Sipariş numaranız: ' . $_SESSION['siparis_id']
                );

                // SMS gönderim sonuçlarını kontrol et
                if ($musteri_sms_sonuc['durum'] == 'basarili' && $yonetici_sms_sonuc['durum'] == 'basarili') {
                    // SMS gönderimi başarılı
                    // ...
                } else {
                    // SMS gönderimi başarısız
                    // ...
                }

                header('Location: odeme_basarili.php');
            } else {
                echo $paytr_sonuc['hata_mesaji'];
                header('Location: odeme_basarisiz.php');
            }
        }
    }
}

$musteri_odeme_controller = new MusteriOdemeController();
$musteri_odeme_controller->odemeYap();
?>