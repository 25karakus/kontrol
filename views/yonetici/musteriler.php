<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/musteri_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $musteri_model = new MusteriModel();
    $musteriler = $musteri_model->getMusteriler();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Müşteriler</title>
    </head>
    <body>
        <h1>Müşteriler</h1>
        <table border="1">
            <tr>
                <th>Müşteri ID</th>
                <th>Müşteri Adı</th>
                <th>Müşteri E-posta</th>
                <th>İşlemler</th>
            </tr>
            <?php foreach ($musteriler as $musteri) : ?>
                <tr>
                    <td><?php echo $musteri['id']; ?></td>
                    <td><?php echo $musteri['ad']; ?></td>
                    <td><?php echo $musteri['eposta']; ?></td>
                    <td>
                        <a href="musteri_duzenle.php?id=<?php echo $musteri['id']; ?>">Düzenle</a> |
                        <a href="../controllers/yonetici_musteri_controller.php?sil=<?php echo $musteri['id']; ?>">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>