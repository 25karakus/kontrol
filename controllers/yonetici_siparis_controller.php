<?php
    session_start();
    require_once '../models/siparis_model.php';

    class YoneticiSiparisController {
        private $siparis_model;

        public function __construct() {
            $this->siparis_model = new SiparisModel();
        }

        public function guncelleSiparis() {
            if (isset($_POST['guncelle'])) {
                $siparis_id = $_POST['siparis_id'];
                $odeme_durumu = $_POST['odeme_durumu'];
                $this->siparis_model->guncelleSiparis($siparis_id, $odeme_durumu);
                header('Location: ../views/yonetici/siparisler.php');
            }
        }

        public function silSiparis() {
            if (isset($_GET['sil'])) {
                $siparis_id = $_GET['sil'];
                $this->siparis_model->silSiparis($siparis_id);
                header('Location: ../views/yonetici/siparisler.php');
            }
        }
    }

    $yonetici_siparis_controller = new YoneticiSiparisController();

    if (isset($_POST['guncelle'])) {
        $yonetici_siparis_controller->guncelleSiparis();
    }

    if (isset($_GET['sil'])) {
        $yonetici_siparis_controller->silSiparis();
    }
    ?>