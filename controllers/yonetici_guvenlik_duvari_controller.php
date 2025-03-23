<?php
    session_start();
    require_once '../models/guvenlik_duvari_model.php';

    class YoneticiGuvenlikDuvariController {
        private $guvenlik_duvari_model;

        public function __construct() {
            $this->guvenlik_duvari_model = new GuvenlikDuvariModel();
        }

        public function guvenlikDuvariKuraliEkle() {
            if (isset($_POST['ekle'])) {
                $protokol = $_POST['protokol'];
                $kaynak_ip = $_POST['kaynak_ip'];
                $hedef_ip = $_POST['hedef_ip'];
                $hedef_port = $_POST['hedef_port'];
                $islem = $_POST['islem'];
                $this->guvenlik_duvari_model->guvenlikDuvariKuraliEkle($protokol, $kaynak_ip, $hedef_ip, $hedef_port, $islem);
                header('Location: ../views/yonetici/guvenlik_duvari.php');
            }
        }

        public function guvenlikDuvariKuraliSil() {
            if (isset($_GET['sil'])) {
                $id = $_GET['sil'];
                $this->guvenlik_duvari_model->guvenlikDuvariKuraliSil($id);
                header('Location: ../views/yonetici/guvenlik_duvari.php');
            }
        }

        // Diğer güvenlik duvarı işlemleri
    }

    $yonetici_guvenlik_duvari_controller = new YoneticiGuvenlikDuvariController();

    if (isset($_POST['ekle'])) {
        $yonetici_guvenlik_duvari_controller->guvenlikDuvariKuraliEkle();
    }

    if (isset($_GET['sil'])) {
        $yonetici_guvenlik_duvari_controller->guvenlikDuvariKuraliSil();
    }

    // Diğer güvenlik duvarı işlemleri
    ?>