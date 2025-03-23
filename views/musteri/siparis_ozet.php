<?php
// models/urun_model.php dosyasını dahil et
require_once '../models/urun_model.php';

// UrunModel sınıfından bir nesne oluştur
$urun_model = new UrunModel();

// Sipariş detaylarını al
$urun_id = $_POST['urun_id'];
$alan_adi = isset($_POST['alan_adi']) ? $_POST['alan_adi'] : null;
$hosting_paketi = isset($_POST['hosting_paketi']) ? $_POST['hosting_paketi'] : null;

// Seçilen ürünün bilgilerini getir
$urun = $urun_model->getUrun($urun_id);

// Hosting paketi bilgilerini getir (eğer ürün hosting ise)
if ($urun['urun_turu'] == 'hosting') {
    $paket = $urun_model->getUrun($hosting_paketi);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sipariş Özeti</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1>Sipariş Özeti</h1>
    <p>Ürün: <?php echo $urun['ad']; ?></p>
    <?php if ($urun['urun_turu'] == 'alan_adi'): ?>
        <p>Alan Adı: <?php echo $alan_adi; ?></p>
    <?php elseif ($urun['urun_turu'] == 'hosting'): ?>
        <p>Hosting Paketi: <?php echo $paket['ad']; ?></p>
    <?php endif; ?>
    <p>Fiyat: <?php echo $urun['fiyat']; ?> TL</p>
    <form action="odeme.php" method="post">
        <input type="hidden" name="urun_id" value="<?php echo $urun['urun_id']; ?>">
        <?php if ($urun['urun_turu'] == 'alan_adi'): ?>
            <input type="hidden" name="alan_adi" value="<?php echo $alan_adi; ?>">
        <?php elseif ($urun['urun_turu'] == 'hosting'): ?>
            <input type="hidden" name="hosting_paketi" value="<?php echo $hosting_paketi; ?>">
        <?php endif; ?>
        <input type="submit" value="Ödeme Yap">
    </form>
</body>
</html>