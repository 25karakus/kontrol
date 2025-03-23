<?php
    session_start();
    require_once '../models/ftp_model.php';

    class YoneticiFTPController {
        private $ftp_model;

        public function __construct() {
            $this->ftp_model = new FTPModel();
        }

        public function ftpEkle() {
            if (isset($_POST['ekle'])) {
                $kullanici_adi = $_POST['kullanici_adi'];
                $sifre = $_POST['sifre'];
                $dizin = $_POST['dizin'];
                $this->ftp_model->ftpEkle($kullanici_adi, $sifre, $dizin);
                header('Location: ../views/yonetici/ftp_yonetimi.php');
            }
        }

        public function ftpSil() {
            if (isset($_GET['sil'])) {
                $kullanici_adi = $_GET['sil'];
                $this->ftp_model->ftpSil($kullanici_adi);
                header('Location: ../views/yonetici/ftp_yonetimi.php');
            }
        }

        // Diğer FTP işlemleri
    }

    $yonetici_ftp_controller = new YoneticiFTPController();

    if (isset($_POST['ekle'])) {
        $yonetici_ftp_controller->ftpEkle();
    }

    if (isset($_GET['sil'])) {
        $yonetici_ftp_controller->ftpSil();
    }

    // Diğer FTP işlemleri
    ?>