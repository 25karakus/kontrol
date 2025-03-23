<?php
    session_start();
    require_once '../models/musteri_model.php';

    class YoneticiMusteriController {
        private $musteri_model;

        public function __construct() {
            $this->musteri_model = new MusteriModel();
        }

        public function guncelleMusteri() {
            if (isset($_POST['guncelle'])) {
                $id = $_POST['id'];
                $ad = $_POST['ad'];
                $eposta = $_POST['eposta'];
                $this->musteri_model->guncelleMusteri($id, $ad, $eposta);
                header('Location: ../views/yonetici/musteriler.php');
            }
        }

        public function silMusteri() {
            if (isset($_GET['sil'])) {
                $id = $_GET['sil'];
                $this->musteri_model->silMusteri($id);
                header('Location: ../views/yonetici/musteriler.php');
            }
        }
    }

    $yonetici_musteri_controller = new YoneticiMusteriController();

    if (isset($_POST['guncelle'])) {
        $yonetici_musteri_controller->guncelleMusteri();
    }

    if (isset($_GET['sil'])) {
        $yonetici_musteri_controller->silMusteri();
    }
    ?>