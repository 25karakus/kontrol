<?php
    session_start();
    require_once '../models/urun_model.php';

    class YoneticiUrunController {
        private $urun_model;

        public function __construct() {
            $this->urun_model = new UrunModel();
        }

        public function ekleUrun() {
            if (isset($_POST['ekle'])) {
                $ad = $_POST['ad'];
                $fiyat = $_POST['fiyat'];
                $this->urun_model->ekleUrun($ad, $fiyat);
                header('Location: ../views/yonetici/urunler.php');
            }
        }

        public function guncelleUrun() {
            if (isset($_POST['guncelle'])) {
                $urun_id = $_POST['urun_id'];
                $ad = $_POST['ad'];
                $fiyat = $_POST['fiyat'];
                $this->urun_model->guncelleUrun($urun_id, $ad, $fiyat);
                header('Location: ../views/yonetici/urunler.php');
            }
        }

        public function silUrun() {
            if (isset($_GET['sil'])) {
                $urun_id = $_GET['sil'];
                $this->urun_model->silUrun($urun_id);
                header('Location: ../views/yonetici/urunler.php');
            }
        }
    }

    $yonetici_urun_controller = new YoneticiUrunController();

    if (isset($_POST['ekle'])) {
        $yonetici_urun_controller->ekleUrun();
    }

    if (isset($_POST['guncelle'])) {
        $yonetici_urun_controller->guncelleUrun();
    }

    if (isset($_GET['sil'])) {
        $yonetici_urun_controller->silUrun();
    }
    ?>