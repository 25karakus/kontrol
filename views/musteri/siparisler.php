<?php
// models/urun_model.php dosyasını dahil et
require_once '../models/urun_model.php';

// UrunModel sınıfından bir nesne oluştur
$urun_model = new UrunModel();

// Veritabanından ürünleri getir
$urunler = $urun_model->getUrunler();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ürün Seçimi</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1>Ürün Seçimi</h1>
    <ul>
        <?php foreach ($urunler as $urun): ?>
            <li>
                <a href="siparis_detaylari.php?urun_id=<?php echo $urun['urun_id']; ?>">
                    <?php echo $urun['ad']; ?> - <?php echo $urun['fiyat']; ?> TL
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>