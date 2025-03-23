<?php
    session_start();
    require_once '../models/ssl_model.php';

    class YoneticiSSLController {
        private $ssl_model;

        public function __construct() {
            $this->ssl_model = new SSLModel();
        }

        public function sslEkle() {
            if (isset($_POST['ekle'])) {
                $alan_adi = $_POST['alan_adi'];
                $durum = $_POST['durum'];
                $bitis_tarihi = $_POST['bitis_tarihi'];
                $this->ssl_model->sslEkle($alan_adi, $durum, $bitis_tarihi);
                header('Location: ../views/yonetici/ssl_yonetimi.php');
            }
        }

        public function sslSil() {
            if (isset($_GET['sil'])) {
                $alan_adi = $_GET['sil'];
                $this->ssl_model->sslSil($alan_adi);
                header('Location: ../views/yonetici/ssl_yonetimi.php');
            }
        }

        public function sslYenile() {
            if (isset($_GET['yenile'])) {
                $alan_adi = $_GET['yenile'];
                $bitis_tarihi = date('Y-m-d', strtotime('+1 year')); // 1 yıl sonrasına ayarla
                $this->ssl_model->sslYenile($alan_adi, $bitis_tarihi);
                header('Location: ../views/yonetici/ssl_yonetimi.php');
            }
        }

        // Diğer SSL işlemleri
    }

    $yonetici_ssl_controller = new YoneticiSSLController();

    if (isset($_POST['ekle'])) {
        $yonetici_ssl_controller->sslEkle();
    }

    if (isset($_GET['sil'])) {
        $yonetici_ssl_controller->sslSil();
    }

    if (isset($_GET['yenile'])) {
        $yonetici_ssl_controller->sslYenile();
    }

    // Diğer SSL işlemleri
    ?>