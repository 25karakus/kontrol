<?php
    session_start();
    require_once '../models/destek_model.php';

    class YoneticiDestekController {
        private $destek_model;

        public function __construct() {
            $this->destek_model = new DestekModel();
        }

        public function destekTalebiGonder() {
            if (isset($_POST['gonder'])) {
                $konu = $_POST['konu'];
                $mesaj = $_POST['mesaj'];
                $this->destek_model->destekTalebiEkle($konu, $mesaj);
                header('Location: ../views/yonetici/destek.php');
            }
        }

        // Diğer destek işlemleri
    }

    $yonetici_destek_controller = new YoneticiDestekController();

    if (isset($_POST['gonder'])) {
        $yonetici_destek_controller->destekTalebiGonder();
    }

    // Diğer destek işlemleri
    ?>