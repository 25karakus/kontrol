<?php
    session_start();
    require_once '../models/yedekleme_model.php';

    class YoneticiYedeklemeController {
        private $yedekleme_model;

        public function __construct() {
            $this->yedekleme_model = new YedeklemeModel();
        }

        public function yedekle() {
            if (isset($_GET['yedekle'])) {
                $tur = $_GET['yedekle'];
                $dosya_adi = $tur . '_' . date('Y-m-d_H-i-s') . '.zip';
                // Yedekleme işlemleri
                // ...
                $this->yedekleme_model->yedekle($tur, $dosya_adi);
                header('Location: ../views/yonetici/yedekleme_yonetimi.php');
            }
        }

        public function geriYukle() {
            if (isset($_GET['geri_yukle'])) {
                $dosya_adi = $_GET['geri_yukle'];
                // Geri yükleme işlemleri
                // ...
                header('Location: ../views/yonetici/yedekleme_yonetimi.php');
            }
        }

        public function yedeklemeSil() {
            if (isset($_GET['sil'])) {
                $dosya_adi = $_GET['sil'];
                $this->yedekleme_model->yedeklemeSil($dosya_adi);
                header('Location: ../views/yonetici/yedekleme_yonetimi.php');
            }
        }

        // Diğer yedekleme işlemleri
    }

    $yonetici_yedekleme_controller = new YoneticiYedeklemeController();

    if (isset($_GET['yedekle'])) {
        $yonetici_yedekleme_controller->yedekle();
    }

    if (isset($_GET['geri_yukle'])) {
        $yonetici_yedekleme_controller->geriYukle();
    }

    if (isset($_GET['sil'])) {
        $yonetici_yedekleme_controller->yedeklemeSil();
    }

    // Diğer yedekleme işlemleri
    ?>