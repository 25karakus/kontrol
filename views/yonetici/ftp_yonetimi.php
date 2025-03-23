<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/ftp_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $ftp_model = new FTPModel();
    $ftp_hesaplari = $ftp_model->getFTPHesaplari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>FTP Yönetimi</title>
    </head>
    <body>
        <h1>FTP Yönetimi</h1>

        <a href="ftp_ekle.php">FTP Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>Kullanıcı Adı</th>
                    <th>Dizin</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ftp_hesaplari as $ftp_hesabi): ?>
                    <tr>
                        <td><?php echo $ftp_hesabi['kullanici_adi']; ?></td>
                        <td><?php echo $ftp_hesabi['dizin']; ?></td>
                        <td>
                            <a href="../controllers/yonetici_ftp_controller.php?sil=<?php echo $ftp_hesabi['kullanici_adi']; ?>">Sil</a>
                            <a href="ftp_duzenle.php?kullanici_adi=<?php echo $ftp_hesabi['kullanici_adi']; ?>">Düzenle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>