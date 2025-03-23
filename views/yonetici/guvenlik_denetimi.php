<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../controllers/yonetici_guvenlik_denetimi_controller.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $yonetici_guvenlik_denetimi_controller = new YoneticiGuvenlikDenetimiController();
    $guvenlik_denetimi_sonuclari = $yonetici_guvenlik_denetimi_controller->guvenlikDenetimiYap();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Güvenlik Denetimi</title>
    </head>
    <body>
        <h1>Güvenlik Denetimi</h1>

        <table>
            <thead>
                <tr>
                    <th>Test Adı</th>
                    <th>Sonuç</th>
                    <th>Açıklama</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guvenlik_denetimi_sonuclari as $sonuc): ?>
                    <tr>
                        <td><?php echo $sonuc['test_adi']; ?></td>
                        <td><?php echo $sonuc['sonuc']; ?></td>
                        <td><?php echo $sonuc['aciklama']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>