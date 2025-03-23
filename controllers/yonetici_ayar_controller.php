<?php
session_start();
require_once '../models/ayar_model.php';

class YoneticiAyarController {
    private $ayar_model;

    public function __construct() {
        $this->ayar_model = new AyarModel();
    }

    public function guncelleGenelAyarlar() {
        if (isset($_POST['guncelle'])) {
            $site_adi = $_POST['site_adi'];
            $site_aciklamasi = $_POST['site_aciklamasi'];
            $this->ayar_model->guncelleGenelAyarlar($site_adi, $site_aciklamasi);
            header('Location: ../views/yonetici/genel_ayarlar.php');
        }
    }

    public function guncelleOdemeAyarlari() {
        if (isset($_POST['guncelle_odeme'])) {
            $odeme_yontemi = $_POST['odeme_yontemi'];
            $odeme_saglayici = $_POST['odeme_saglayici'];
            $this->ayar_model->guncelleOdemeAyarlari($odeme_yontemi, $odeme_saglayici);
            header('Location: ../views/yonetici/odeme_ayarlari.php');
        }
    }

    public function guncelleEpostaAyarlari() {
        if (isset($_POST['guncelle_eposta'])) {
            $smtp_sunucu = $_POST['smtp_sunucu'];
            $smtp_kullanici = $_POST['smtp_kullanici'];
            $smtp_sifre = $_POST['smtp_sifre'];
            $eposta_sablonu = $_POST['eposta_sablonu'];
            $eposta_bildirimleri = $_POST['eposta_bildirimleri'];
            $this->ayar_model->guncelleEpostaAyarlari($smtp_sunucu, $smtp_kullanici, $smtp_sifre, $eposta_sablonu, $eposta_bildirimleri);
            header('Location: ../views/yonetici/diger_ayarlar.php');
        }
    }

    public function guncelleApiAyarlari() {
        if (isset($_POST['guncelle_api'])) {
            $api_anahtari = $_POST['api_anahtari'];
            $api_izni = $_POST['api_izni'];
            $api_entegrasyonu = $_POST['api_entegrasyonu'];
            $api_gunlukleri = $_POST['api_gunlukleri'];
            $this->ayar_model->guncelleApiAyarlari($api_anahtari, $api_izni, $api_entegrasyonu, $api_gunlukleri);
            header('Location: ../views/yonetici/diger_ayarlar.php');
        }
    }

    public function guncelleGuvenlikAyarlari() {
        if (isset($_POST['guncelle_guvenlik'])) {
            $yonetici_izinleri = $_POST['yonetici_izinleri'];
            $parola_politikasi = $_POST['parola_politikasi'];
            $iki_faktorlu_kimlik = $_POST['iki_faktorlu_kimlik'];
            $guvenlik_duvari = $_POST['guvenlik_duvari'];
            $ssl_sertifikasi = $_POST['ssl_sertifikasi'];
            $veri_yedekleme = $_POST['veri_yedekleme'];
            $this->ayar_model->guncelleGuvenlikAyarlari($yonetici_izinleri, $parola_politikasi, $iki_faktorlu_kimlik, $guvenlik_duvari, $ssl_sertifikasi, $veri_yedekleme);
            header('Location: ../views/yonetici/diger_ayarlar.php');
        }
    }

    // Diğer ayar işlevleri buraya eklenebilir
}

$yonetici_ayar_controller = new YoneticiAyarController();

if (isset($_POST['guncelle'])) {
    $yonetici_ayar_controller->guncelleGenelAyarlar();
}

if (isset($_POST['guncelle_odeme'])) {
    $yonetici_ayar_controller->guncelleOdemeAyarlari();
}

if (isset($_POST['guncelle_eposta'])) {
    $yonetici_ayar_controller->guncelleEpostaAyarlari();
}

if (isset($_POST['guncelle_api'])) {
    $yonetici_ayar_controller->guncelleApiAyarlari();
}

if (isset($_POST['guncelle_guvenlik'])) {
    $yonetici_ayar_controller->guncelleGuvenlikAyarlari();
}

// Diğer ayar işlemleri buraya eklenebilir
?>