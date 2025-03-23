<?php
require_once '../inc/baglanti.php';

class AyarModel {
    private $db;

    public function __construct() {
        $this->db = Baglanti::getDB();
    }

    public function getGenelAyarlar() {
        $sql = "SELECT * FROM ayarlar WHERE tur = 'genel'";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guncelleGenelAyarlar($site_adi, $site_aciklamasi) {
        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'site_adi' AND tur = 'genel'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$site_adi]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'site_aciklamasi' AND tur = 'genel'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$site_aciklamasi]);
    }

    public function getOdemeAyarlari() {
        $sql = "SELECT * FROM ayarlar WHERE tur = 'odeme'";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guncelleOdemeAyarlari($odeme_yontemi, $odeme_saglayici) {
        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'odeme_yontemi' AND tur = 'odeme'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$odeme_yontemi]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'odeme_saglayici' AND tur = 'odeme'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$odeme_saglayici]);
    }

    public function getEpostaAyarlari() {
        $sql = "SELECT * FROM ayarlar WHERE tur = 'eposta'";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guncelleEpostaAyarlari($smtp_sunucu, $smtp_kullanici, $smtp_sifre, $eposta_sablonu, $eposta_bildirimleri) {
        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'smtp_sunucu' AND tur = 'eposta'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$smtp_sunucu]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'smtp_kullanici' AND tur = 'eposta'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$smtp_kullanici]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'smtp_sifre' AND tur = 'eposta'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$smtp_sifre]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'eposta_sablonu' AND tur = 'eposta'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$eposta_sablonu]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'eposta_bildirimleri' AND tur = 'eposta'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$eposta_bildirimleri]);
    }

    public function getApiAyarlari() {
        $sql = "SELECT * FROM ayarlar WHERE tur = 'api'";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guncelleApiAyarlari($api_anahtari, $api_izni, $api_entegrasyonu, $api_gunlukleri) {
        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'api_anahtari' AND tur = 'api'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$api_anahtari]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'api_izni' AND tur = 'api'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$api_izni]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'api_entegrasyonu' AND tur = 'api'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$api_entegrasyonu]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'api_gunlukleri' AND tur = 'api'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$api_gunlukleri]);
    }

    public function getGuvenlikAyarlari() {
        $sql = "SELECT * FROM ayarlar WHERE tur = 'guvenlik'";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guncelleGuvenlikAyarlari($yonetici_izinleri, $parola_politikasi, $iki_faktorlu_kimlik, $guvenlik_duvari, $ssl_sertifikasi, $veri_yedekleme) {
        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'yonetici_izinleri' AND tur = 'guvenlik'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$yonetici_izinleri]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'parola_politikasi' AND tur = 'guvenlik'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$parola_politikasi]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'iki_faktorlu_kimlik' AND tur = 'guvenlik'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$iki_faktorlu_kimlik]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'guvenlik_duvari' AND tur = 'guvenlik'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$guvenlik_duvari]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'ssl_sertifikasi' AND tur = 'guvenlik'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$ssl_sertifikasi]);

        $sql = "UPDATE ayarlar SET deger = ? WHERE ad = 'veri_yedekleme' AND tur = 'guvenlik'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$veri_yedekleme]);
    }

    // Diğer ayar işlevleri buraya eklenebilir
}
?>