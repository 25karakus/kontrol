<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $urun_turu = $_POST['urun_turu'];
    $urun_id = $_POST['urun_id'];
    $musteri_id = $_SESSION['kullanici_id'];
    // Sipariş veritabanına kaydet
    $siparis_model->siparisVer($musteri_id, $urun_turu, $urun_id);
    // Ödeme sayfasına yönlendir
    header('Location: odeme.php');
}
?>