<?php
require_once '../models/siparis_model.php';
require_once '../models/urun_model.php';

class MusteriSiparisController {
    private $siparis_model;
    private $urun_model;

    public function __construct() {
        $this->siparis_model = new SiparisModel();
        $this->urun_model = new UrunModel();
    }

    public function siparisVer() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $urun_id = $_POST['urun_id'];
            $alan_adi = isset($_POST['alan_adi']) ? $_POST['alan_adi'] : null;
            $hosting_paketi = isset($_POST['hosting_paketi']) ? $_POST['hosting_paketi'] : null;

            // Sipariş bilgilerini oturumda sakla
            $_SESSION['siparis'] = array(
                'urun_id' => $urun_id,
                'alan_adi' => $alan_adi,
                'hosting_paketi' => $hosting_paketi
            );

            // Ödeme sayfasına yönlendir
            header('Location: odeme.php');
        }
    }

    public function siparisOzeti() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sipariş bilgilerini oturumdan al
            $siparis = $_SESSION['siparis'];

            // Sipariş bilgilerini veritabanına kaydet
            $this->siparis_model->siparisVer(
                $_SESSION['id'], // Müşteri ID'si
                $siparis['urun_id'],
                $siparis['alan_adi'],
                $siparis['hosting_paketi']
            );

            // Sipariş bilgilerini oturumdan sil
            unset($_SESSION['siparis']);

            // Ödeme sayfasına yönlendir
            header('Location: odeme.php');
        }
    }
}
?>