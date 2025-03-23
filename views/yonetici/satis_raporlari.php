<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/rapor_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $rapor_model = new RaporModel();
    $satis_raporlari = $rapor_model->getSatisRaporlari();
    ?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Satış Raporları</title>
    </head>
    <body>
        <h1>Satış Raporları</h1>
        <table>
            <tr>
                <th>Tarih</th>
                <th>Toplam Satış</th>
            </tr>
            <?php foreach ($satis_raporlari as $rapor) : ?>
                <tr>
                    <td><?php echo $rapor['tarih']; ?></td>
                    <td><?php echo $rapor['toplam_satis']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="../controllers/yonetici_rapor_controller.php?indir_satis_raporu=1">Satış Raporunu İndir</a>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>