<?php
    session_start();
    require_once '../models/sunucu_model.php';

    class YoneticiSunucuController {
        private $sunucu_model;

        public function __construct() {
            $this->sunucu_model = new SunucuModel();
        }

        public function sunucuEkle() {
            if (isset($_POST['ekle'])) {
                $ad = $_POST['ad'];
                $ip_adresi = $_POST['ip_adresi'];
                $this->sunucu_model->sunucuEkle($ad, $ip_adresi);
                header('Location: ../views/yonetici/sunucu_yonetimi.php');
            }
        }

        public function sunucuDuzenle() {
            if (isset($_POST['duzenle'])) {
                $id = $_POST['id'];
                $ad = $_POST['ad'];
                $ip_adresi = $_POST['ip_adresi'];
                $this->sunucu_model->sunucuDuzenle($id, $ad, $ip_adresi);
                header('Location: ../views/yonetici/sunucu_yonetimi.php');
            }
        }

        public function sunucuSil() {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->sunucu_model->sunucuSil($id);
                header('Location: ../views/yonetici/sunucu_yonetimi.php');
            }
        }

        public function sunucuBaslat() {
            if (isset($_GET['baslat'])) {
                $id = $_GET['baslat'];
                $this->sunucu_model->sunucuDurumGuncelle($id, 'Açık');
                header('Location: ../views/yonetici/sunucu_yonetimi.php');
            }
        }

        public function sunucuDurdur() {
            if (isset($_GET['durdur'])) {
                $id = $_GET['durdur'];
                $this->sunucu_model->sunucuDurumGuncelle($id, 'Kapalı');
                header('Location: ../views/yonetici/sunucu_yonetimi.php');
            }
        }

        public function sunucuYenidenBaslat() {
            if (isset($_GET['yeniden_baslat'])) {
                $id = $_GET['yeniden_baslat'];
                $this->sunucu_model->sunucuDurumGuncelle($id, 'Yeniden Başlatılıyor');
                // Sunucuyu yeniden başlatma işlemleri (örneğin, SSH ile sunucuya bağlanıp yeniden başlatma komutu gönderme)
                // ...
                $this->sunucu_model->sunucuDurumGuncelle($id, 'Açık');
                header('Location: ../views/yonetici/sunucu_yonetimi.php');
            }
        }

        // Diğer sunucu işlemleri buraya eklenebilir
    }

    $yonetici_sunucu_controller = new YoneticiSunucuController();

    if (isset($_POST['ekle'])) {
        $yonetici_sunucu_controller->sunucuEkle();
    }

    if (isset($_POST['duzenle'])) {
        $yonetici_sunucu_controller->sunucuDuzenle();
    }

    if (isset($_GET['id'])) {
        $yonetici_sunucu_controller->sunucuSil();
    }

    if (isset($_GET['baslat'])) {
        $yonetici_sunucu_controller->sunucuBaslat();
    }

    if (isset($_GET['durdur'])) {
        $yonetici_sunucu_controller->sunucuDurdur();
    }

    if (isset($_GET['yeniden_baslat'])) {
        $yonetici_sunucu_controller->sunucuYenidenBaslat();
    }

    // Diğer sunucu işlemleri buraya eklenebilir
    ?>