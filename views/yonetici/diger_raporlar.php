<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/rapor_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $rapor_model = new RaporModel();
    $stok_raporu = $rapor_model->getStokRaporu();
    $ziyaret_raporu = $rapor_model->getZiyaretRaporu();
    ?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Diğer Raporlar</title>
    </head>
    <body>
        <h1>Diğer Raporlar</h1>

        <h2>Stok Raporu</h2>
        <table>
            <tr>
                <th>Ürün Adı</th>
                <th>Stok Sayısı</th>
            </tr>
            <?php foreach ($stok_raporu as $rapor) : ?>
                <tr>
                    <td><?php echo $rapor['urun_adi']; ?></td>
                    <td><?php echo $rapor['stok_sayisi']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="../controllers/yonetici_rapor_controller.php?indir_stok_raporu=1">Stok Raporunu İndir</a>

        <h2>Ziyaret Raporu</h2>
        <table>
            <tr>
                <th>Sayfa Adı</th>
                <th>Ziyaret Sayısı</th>
            </tr>
            <?php foreach ($ziyaret_raporu as $rapor) : ?>
                <tr>
                    <td><?php echo $rapor['sayfa_adi']; ?></td>
                    <td><?php echo $rapor['ziyaret_sayisi']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="../controllers/yonetici_rapor_controller.php?indir_ziyaret_raporu=1">Ziyaret Raporunu İndir</a>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>