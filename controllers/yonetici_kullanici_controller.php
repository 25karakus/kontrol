<?php
    session_start();
    require_once '../models/kullanici_model.php';

    class YoneticiKullaniciController {
        private $kullanici_model;

        public function __construct() {
            $this->kullanici_model = new KullaniciModel();
        }

        public function kullaniciEkle() {
            if (isset($_POST['ekle'])) {
                $ad = $_POST['ad'];
                $eposta = $_POST['eposta'];
                $sifre = $_POST['sifre'];
                $yetki = $_POST['yetki'];
                $this->kullanici_model->kullaniciEkle($ad, $eposta, $sifre, $yetki);
                header('Location: ../views/yonetici/kullanici_yonetimi.php');
            }
        }

        public function kullaniciDuzenle() {
            if (isset($_POST['duzenle'])) {
                $id = $_POST['id'];
                $ad = $_POST['ad'];
                $eposta = $_POST['eposta'];
                $yetki = $_POST['yetki'];
                $this->kullanici_model->kullaniciDuzenle($id, $ad, $eposta, $yetki);
                header('Location: ../views/yonetici/kullanici_yonetimi.php');
            }
        }

        public function kullaniciSil() {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->kullanici_model->kullaniciSil($id);
                header('Location: ../views/yonetici/kullanici_yonetimi.php');
            }
        }

        // Diğer kullanıcı işlemleri
    }

    $yonetici_kullanici_controller = new YoneticiKullaniciController();

    if (isset($_POST['ekle'])) {
        $yonetici_kullanici_controller->kullaniciEkle();
    }

    if (isset($_POST['duzenle'])) {
        $yonetici_kullanici_controller->kullaniciDuzenle();
    }

    if (isset($_GET['id'])) {
        $yonetici_kullanici_controller->kullaniciSil();
    }

    // Diğer kullanıcı işlemleri
    ?>