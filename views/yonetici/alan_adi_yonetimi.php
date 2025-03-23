<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/alan_adi_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $alan_adi_model = new AlanAdiModel();
    $alan_adlari = $alan_adi_model->getAlanAdlari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Alan Adı Yönetimi</title>
    </head>
    <body>
        <h1>Alan Adı Yönetimi</h1>

        <a href="alan_adi_ekle.php">Alan Adı Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alan_adlari as $alan_adi): ?>
                    <tr>
                        <td><?php echo $alan_adi['id']; ?></td>
                        <td><?php echo $alan_adi['ad']; ?></td>
                        <td><?php echo $alan_adi['durum']; ?></td>
                        <td>
                            <a href="alan_adi_duzenle.php?id=<?php echo $alan_adi['id']; ?>">Düzenle</a>
                            <a href="alan_adi_sil.php?id=<?php echo $alan_adi['id']; ?>">Sil</a>
                            <a href="alan_adi_dns.php?id=<?php echo $alan_adi['id']; ?>">DNS Ayarları</a>
                            <a href="alan_adi_yonlendirme.php?id=<?php echo $alan_adi['id']; ?>">Yönlendirme</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>