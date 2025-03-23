<?php
    session_start();
    require_once '../models/veritabani_model.php';

    class YoneticiVeritabaniController {
        private $veritabani_model;

        public function __construct() {
            $this->veritabani_model = new VeritabaniModel();
        }

        public function veritabaniEkle() {
            if (isset($_POST['ekle'])) {
                $ad = $_POST['ad'];
                $this->veritabani_model->veritabaniEkle($ad);
                header('Location: ../views/yonetici/veritabani_yonetimi.php');
            }
        }

        public function veritabaniSil() {
            if (isset($_GET['sil'])) {
                $id = $_GET['sil'];
                $this->veritabani_model->veritabaniSil($id);
                header('Location: ../views/yonetici/veritabani_yonetimi.php');
            }
        }

        public function veritabaniYedekle() {
            if (isset($_GET['yedekle'])) {
                $id = $_GET['yedekle'];
                // Veritabanı yedekleme işlemleri
                // ...
                header('Location: ../views/yonetici/veritabani_yonetimi.php');
            }
        }

        // Diğer veritabanı işlemleri
    }

    $yonetici_veritabani_controller = new YoneticiVeritabaniController();

    if (isset($_POST['ekle'])) {
        $yonetici_veritabani_controller->veritabaniEkle();
    }

    if (isset($_GET['sil'])) {
        $yonetici_veritabani_controller->veritabaniSil();
    }

    if (isset($_GET['yedekle'])) {
        $yonetici_veritabani_controller->veritabaniYedekle();
    }

    // Diğer veritabanı işlemleri
    ?>