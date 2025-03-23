<?php
// models/urun_model.php dosyasını dahil et
require_once '../models/urun_model.php';

// UrunModel sınıfından bir nesne oluştur
$urun_model = new UrunModel();

// Seçilen ürünün ID'sini al
$urun_id = $_GET['urun_id'];

// Seçilen ürünün bilgilerini getir
$urun = $urun_model->getUrun($urun_id);

// Hosting paketlerini getir (eğer ürün hosting ise)
if ($urun['urun_turu'] == 'hosting') {
    $hosting_paketleri = $urun_model->getHostingPaketleri();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sipariş Detayları</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1>Sipariş Detayları</h1>
    <form action="siparis_ozet.php" method="post">
        <input type="hidden" name="urun_id" value="<?php echo $urun['urun_id']; ?>">
        <?php if ($urun['urun_turu'] == 'alan_adi'): ?>
            <label for="alan_adi">Alan Adı:</label>
            <input type="text" name="alan_adi"><br><br>
        <?php elseif ($urun['urun_turu'] == 'hosting'): ?>
            <label for="hosting_paketi">Hosting Paketi:</label>
            <select name="hosting_paketi">
                <?php foreach ($hosting_paketleri as $paket): ?>
                    <option value="<?php echo $paket['urun_id']; ?>"><?php echo $paket['ad']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
        <?php endif; ?>
        <input type="submit" value="Devam Et">
    </form>
</body>
</html>