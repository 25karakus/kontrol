<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/yedekleme_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $yedekleme_model = new YedeklemeModel();
    $yedeklemeler = $yedekleme_model->getYedeklemeler();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Yedekleme Yönetimi</title>
    </head>
    <body>
        <h1>Yedekleme Yönetimi</h1>

        <a href="../controllers/yonetici_yedekleme_controller.php?yedekle=veritabani">Veritabanı Yedekle</a>
        <a href="../controllers/yonetici_yedekleme_controller.php?yedekle=dosyalar">Dosyaları Yedekle</a>
        <a href="../controllers/yonetici_yedekleme_controller.php?yedekle=eposta">E-posta Yedekle</a>

        <table>
            <thead>
                <tr>
                    <th>Tür</th>
                    <th>Tarih</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($yedeklemeler as $yedekleme): ?>
                    <tr>
                        <td><?php echo $yedekleme['tur']; ?></td>
                        <td><?php echo $yedekleme['tarih']; ?></td>
                        <td>
                            <a href="../controllers/yonetici_yedekleme_controller.php?geri_yukle=<?php echo $yedekleme['dosya_adi']; ?>">Geri Yükle</a>
                            <a href="../controllers/yonetici_yedekleme_controller.php?sil=<?php echo $yedekleme['dosya_adi']; ?>">Sil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>