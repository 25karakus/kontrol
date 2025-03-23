<?php
    session_start();
    require_once '../controllers/musteri_controller.php';

    $musteri_controller = new MusteriController();
    $musteri_controller->yetkilendirme();

    // Müşteri bilgilerini ve hizmetlerini al
    $musteri_bilgileri = $musteri_controller->musteriBilgileri();
    $musteri_hizmetleri = $musteri_controller->musteriHizmetleri();
    ?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Müşteri Paneli</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Müşteri Paneli</h1>

        <a href="musteri_paneli.php?action=profil">Profil</a>
        <a href="musteri_paneli.php?action=sifre">Şifre Güncelle</a>
        <a href="musteri_paneli.php?action=hizmetler">Hizmetler</a>
        <a href="musteri_paneli.php?action=faturalar">Faturalar</a>
        <a href="musteri_paneli.php?action=talepler">Destek Talepleri</a>
        <a href="musteri_paneli.php?action=alan_adlari">Alan Adları</a>
        <a href="musteri_paneli.php?action=musteri_notlari">Müşteri Notları</a>
        <a href="musteri_paneli.php?action=iletisim_gecmisi">İletişim Geçmişi</a>
        <a href="musteri_paneli.php?action=musteri_segmentleri">Müşteri Segmentleri</a>

        <?php
        // Mevcut sayfa içeriği
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                // ...
            }
        } else {
            include 'profil.php';
        }
        ?>
    </body>
    </html>