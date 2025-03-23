<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/sunucu_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $sunucu_model = new SunucuModel();
    $sunucular = $sunucu_model->getSunucular();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Sunucu Yönetimi</title>
    </head>
    <body>
        <h1>Sunucu Yönetimi</h1>

        <a href="sunucu_ekle.php">Sunucu Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>IP Adresi</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sunucular as $sunucu): ?>
                    <tr>
                        <td><?php echo $sunucu['id']; ?></td>
                        <td><?php echo $sunucu['ad']; ?></td>
                        <td><?php echo $sunucu['ip_adresi']; ?></td>
                        <td><?php echo $sunucu['durum']; ?></td>
                        <td>
                            <a href="sunucu_duzenle.php?id=<?php echo $sunucu['id']; ?>">Düzenle</a>
                            <a href="sunucu_sil.php?id=<?php echo $sunucu['id']; ?>">Sil</a>
                            <a href="../controllers/yonetici_sunucu_controller.php?baslat=<?php echo $sunucu['id']; ?>">Başlat</a>
                            <a href="../controllers/yonetici_sunucu_controller.php?durdur=<?php echo $sunucu['id']; ?>">Durdur</a>
                            <a href="../controllers/yonetici_sunucu_controller.php?yeniden_baslat=<?php echo $sunucu['id']; ?>">Yeniden Başlat</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>