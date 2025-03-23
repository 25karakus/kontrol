<?php
    session_start();
    require_once '../models/alan_adi_model.php';

    class YoneticiAlanAdiController {
        private $alan_adi_model;

        public function __construct() {
            $this->alan_adi_model = new AlanAdiModel();
        }

        public function alanAdiEkle() {
            if (isset($_POST['ekle'])) {
                $ad = $_POST['ad'];
                $this->alan_adi_model->alanAdiEkle($ad);
                header('Location: ../views/yonetici/alan_adi_yonetimi.php');
            }
        }

        public function alanAdiDuzenle() {
            if (isset($_POST['duzenle'])) {
                $id = $_POST['id'];
                $ad = $_POST['ad'];
                $this->alan_adi_model->alanAdiDuzenle($id, $ad);
                header('Location: ../views/yonetici/alan_adi_yonetimi.php');
            }
        }

        public function alanAdiSil() {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->alan_adi_model->alanAdiSil($id);
                header('Location: ../views/yonetici/alan_adi_yonetimi.php');
            }
        }

        // Diğer alan adı işlemleri
    }

    $yonetici_alan_adi_controller = new YoneticiAlanAdiController();

    if (isset($_POST['ekle'])) {
        $yonetici_alan_adi_controller->alanAdiEkle();
    }

    if (isset($_POST['duzenle'])) {
        $yonetici_alan_adi_controller->alanAdiDuzenle();
    }

    if (isset($_GET['id'])) {
        $yonetici_alan_adi_controller->alanAdiSil();
    }

    // Diğer alan adı işlemleri
    ?>