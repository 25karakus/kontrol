<?php
    session_start();
    require_once '../models/eposta_model.php';

    class YoneticiEpostaController {
        private $eposta_model;

        public function __construct() {
            $this->eposta_model = new EpostaModel();
        }

        public function epostaEkle() {
            if (isset($_POST['ekle'])) {
                $ad = $_POST['ad'];
                $eposta = $_POST['eposta'];
                $sifre = $_POST['sifre'];
                $this->eposta_model->epostaEkle($ad, $eposta, $sifre);
                header('Location: ../views/yonetici/eposta_yonetimi.php');
            }
        }

        public function epostaSil() {
            if (isset($_GET['sil'])) {
                $eposta = $_GET['sil'];
                $this->eposta_model->epostaSil($eposta);
                header('Location: ../views/yonetici/eposta_yonetimi.php');
            }
        }

        // Diğer e-posta işlemleri
    }

    $yonetici_eposta_controller = new YoneticiEpostaController();

    if (isset($_POST['ekle'])) {
        $yonetici_eposta_controller->epostaEkle();
    }

    if (isset($_GET['sil'])) {
        $yonetici_eposta_controller->epostaSil();
    }

    // Diğer e-posta işlemleri
    ?>