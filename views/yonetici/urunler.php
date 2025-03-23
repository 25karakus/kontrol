<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/urun_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $urun_model = new UrunModel();
    $urunler = $urun_model->getUrunler();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Ürünler</title>
    </head>
    <body>
        <h1>Ürünler</h1>
        <a href="urun_ekle.php">Yeni Ürün Ekle</a>
        <table border="1">
            <tr>
                <th>Ürün ID</th>
                <th>Ürün Adı</th>
                <th>Ürün Fiyatı</th>
                <th>İşlemler</th>
            </tr>
            <?php foreach ($urunler as $urun) : ?>
                <tr>
                    <td><?php echo $urun['urun_id']; ?></td>
                    <td><?php echo $urun['ad']; ?></td>
                    <td><?php echo $urun['fiyat']; ?></td>
                    <td>
                        <a href="urun_duzenle.php?urun_id=<?php echo $urun['urun_id']; ?>">Düzenle</a> |
                        <a href="../controllers/yonetici_urun_controller.php?sil=<?php echo $urun['urun_id']; ?>">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>