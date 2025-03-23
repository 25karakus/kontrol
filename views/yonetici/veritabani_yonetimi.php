<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/veritabani_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $veritabani_model = new VeritabaniModel();
    $veritabanlari = $veritabani_model->getVeritabanlari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Veritabanı Yönetimi</title>
    </head>
    <body>
        <h1>Veritabanı Yönetimi</h1>

        <a href="veritabani_ekle.php">Veritabanı Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($veritabanlari as $veritabani): ?>
                    <tr>
                        <td><?php echo $veritabani['id']; ?></td>
                        <td><?php echo $veritabani['ad']; ?></td>
                        <td>
                            <a href="../controllers/yonetici_veritabani_controller.php?sil=<?php echo $veritabani['id']; ?>">Sil</a>
                            <a href="../controllers/yonetici_veritabani_controller.php?yedekle=<?php echo $veritabani['id']; ?>">Yedekle</a>
                            <a href="veritabani_geri_yukle.php?id=<?php echo $veritabani['id']; ?>">Geri Yükle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>