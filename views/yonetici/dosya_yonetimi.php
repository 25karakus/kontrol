<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/dosya_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $dosya_model = new DosyaModel();
    $dosyalar = $dosya_model->getDosyalar();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Dosya Yönetimi</title>
    </head>
    <body>
        <h1>Dosya Yönetimi</h1>

        <a href="dosya_ekle.php">Dosya Ekle</a>
        <a href="klasor_ekle.php">Klasör Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>Adı</th>
                    <th>Tür</th>
                    <th>Boyut</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosyalar as $dosya): ?>
                    <tr>
                        <td><?php echo $dosya['ad']; ?></td>
                        <td><?php echo $dosya['tur']; ?></td>
                        <td><?php echo $dosya['boyut']; ?></td>
                        <td>
                            <a href="../controllers/yonetici_dosya_controller.php?sil=<?php echo $dosya['ad']; ?>">Sil</a>
                            <a href="dosya_duzenle.php?ad=<?php echo $dosya['ad']; ?>">Düzenle</a>
                            <a href="../controllers/yonetici_dosya_controller.php?indir=<?php echo $dosya['ad']; ?>">İndir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>