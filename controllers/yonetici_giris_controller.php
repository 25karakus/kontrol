<?php
session_start();
require_once '../models/yonetici_model.php';

class YoneticiGirisController {
    private $yonetici_model;

    public function __construct() {
        $this->yonetici_model = new YoneticiModel();
    }

    public function girisYap() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kullanici_adi = $_POST['kullanici_adi'];
            $sifre = $_POST['sifre'];

            $yonetici = $this->yonetici_model->yoneticiGiris($kullanici_adi, $sifre);

            if ($yonetici) {
                $_SESSION['yonetici_id'] = $yonetici['id'];
                header('Location: yonetici_paneli.php');
            } else {
                $hata_mesaji = "Kullanıcı adı veya şifre hatalı.";
                include '../views/yonetici/giris.php';
            }
        } else {
            include '../views/yonetici/giris.php';
        }
    }

    public function cikisYap() {
        session_destroy();
        header('Location: ../views/yonetici/giris.php');
    }

    public function yetkilendirme() {
        if (!isset($_SESSION['yonetici_id'])) {
            header('Location: ../views/yonetici/giris.php');
        }
    }
}

$yonetici_giris_controller = new YoneticiGirisController();

if (isset($_GET['cikis'])) {
    $yonetici_giris_controller->cikisYap();
} else {
    $yonetici_giris_controller->girisYap();
}
?>