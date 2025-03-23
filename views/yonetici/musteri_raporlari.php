<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/rapor_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $rapor_model = new RaporModel();
    $musteri_raporlari = $rapor_model->getMusteriRaporlari();
    ?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Müşteri Raporları</title>
    </head>
    <body>
        <h1>Müşteri Raporları</h1>
        <table>
            <tr>
                <th>Müşteri Adı</th>
                <th>Toplam Sipariş Sayısı</th>
                <th>Toplam Harcama</th>
            </tr>
            <?php foreach ($musteri_raporlari as $rapor) : ?>
                <tr>
                    <td><?php echo $rapor['musteri_adi']; ?></td>
                    <td><?php echo $rapor['toplam_siparis_sayisi']; ?></td>
                    <td><?php echo $rapor['toplam_harcama']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="../controllers/yonetici_rapor_controller.php?indir_musteri_raporu=1">Müşteri Raporunu İndir</a>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>