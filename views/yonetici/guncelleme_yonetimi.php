<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/guncelleme_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $guncelleme_model = new GuncellemeModel();
    $guncellemeler = $guncelleme_model->getGuncellemeler();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Güncelleme Yönetimi</title>
    </head>
    <body>
        <h1>Güncelleme Yönetimi</h1>

        <table>
            <thead>
                <tr>
                    <th>Yazılım</th>
                    <th>Mevcut Sürüm</th>
                    <th>Yeni Sürüm</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guncellemeler as $guncelleme): ?>
                    <tr>
                        <td><?php echo $guncelleme['yazilim']; ?></td>
                        <td><?php echo $guncelleme['mevcut_surum']; ?></td>
                        <td><?php echo $guncelleme['yeni_surum']; ?></td>
                        <td><?php echo $guncelleme['durum']; ?></td>
                        <td>
                            <?php if ($guncelleme['durum'] == 'Güncelleme Mevcut'): ?>
                                <a href="../controllers/yonetici_guncelleme_controller.php?guncelle=<?php echo $guncelleme['yazilim']; ?>">Güncelle</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>