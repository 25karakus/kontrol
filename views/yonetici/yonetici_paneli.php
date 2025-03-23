<?php
session_start();
require_once 'controllers/yonetici_giris_controller.php';
require_once '../models/yonetici_model.php';
require_once '../models/siparis_model.php';
require_once '../models/urun_model.php';
require_once '../models/musteri_model.php';

$yonetici_giris_controller = new YoneticiGirisController();
$yonetici_giris_controller->yetkilendirme();

$yonetici_model = new YoneticiModel();
$yonetici = $yonetici_model->yoneticiBilgileri($_SESSION['yonetici_id']);

$siparis_model = new SiparisModel();
$urun_model = new UrunModel();
$musteri_model = new MusteriModel();

$siparis_sayisi = count($siparis_model->getSiparisler());
$urun_sayisi = count($urun_model->getUrunler());
$musteri_sayisi = count($musteri_model->getMusteriler());

// Veritabanı Yedekleme İşlemleri
if (isset($_POST['yedekle'])) {
    $yedek_dosya_adi = 'yedek_' . date('YmdHis') . '.sql';
    $yedek_klasoru = '../yedekler/';

    // Yedek klasörü yoksa oluştur
    if (!is_dir($yedek_klasoru)) {
        mkdir($yedek_klasoru, 0777, true);
    }

    $komut = "mysqldump -h " . DB_HOST . " -u " . DB_USER . " -p" . DB_PASS . " " . DB_NAME . " > " . $yedek_klasoru . $yedek_dosya_adi;
    exec($komut);

    $yedek_mesaji = "Veritabanı yedeği başarıyla oluşturuldu: " . $yedek_klasoru . $yedek_dosya_adi;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yönetici Paneli</title>
</head>
<body>
    <h1>Yönetici Paneli</h1>
    <p>Hoş geldiniz, <?php echo $yonetici['kullanici_adi']; ?></p>
    <p>Toplam Sipariş Sayısı: <?php echo $siparis_sayisi; ?></p>
    <p>Toplam Ürün Sayısı: <?php echo $urun_sayisi; ?></p>
    <p>Toplam Müşteri Sayısı: <?php echo $musteri_sayisi; ?></p>
    <a href="siparisler.php">Siparişler</a> |
    <a href="urunler.php">Ürünler</a> |
    <a href="musteriler.php">Müşteriler</a> |
    <a href="yonetici_giris_controller.php?cikis=1">Çıkış Yap</a>

    <h2>Veritabanı Yedekleme</h2>
    <form method="post">
        <input type="submit" name="yedekle" value="Yedekle">
    </form>

    <?php if (isset($yedek_mesaji)) : ?>
        <p><?php echo $yedek_mesaji; ?></p>
    <?php endif; ?>
</body>
</html>