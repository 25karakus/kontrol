<?php
    session_start();
    require_once '../models/dosya_model.php';

    class YoneticiDosyaController {
        private $dosya_model;

        public function __construct() {
            $this->dosya_model = new DosyaModel();
        }

        public function dosyaSil() {
            if (isset($_GET['sil'])) {
                $ad = $_GET['sil'];
                $this->dosya_model->dosyaSil($ad);
                header('Location: ../views/yonetici/dosya_yonetimi.php');
            }
        }

        public function dosyaIndir() {
            if (isset($_GET['indir'])) {
                $ad = $_GET['indir'];
                $this->dosya_model->dosyaIndir($ad);
            }
        }

        // Diğer dosya işlemleri
    }

    $yonetici_dosya_controller = new YoneticiDosyaController();

    if (isset($_GET['sil'])) {
        $yonetici_dosya_controller->dosyaSil();
    }

    if (isset($_GET['indir'])) {
        $yonetici_dosya_controller->dosyaIndir();
    }

    // Diğer dosya işlemleri
    ?>