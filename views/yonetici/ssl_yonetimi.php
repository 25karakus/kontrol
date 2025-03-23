<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/ssl_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $ssl_model = new SSLModel();
    $ssl_sertifikalari = $ssl_model->getSSLSertifikalari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>SSL Yönetimi</title>
    </head>
    <body>
        <h1>SSL Yönetimi</h1>

        <a href="ssl_ekle.php">SSL Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>Alan Adı</th>
                    <th>Durum</th>
                    <th>Bitiş Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ssl_sertifikalari as $ssl_sertifikasi): ?>
                    <tr>
                        <td><?php echo $ssl_sertifikasi['alan_adi']; ?></td>
                        <td><?php echo $ssl_sertifikasi['durum']; ?></td>
                        <td><?php echo $ssl_sertifikasi['bitis_tarihi']; ?></td>
                        <td>
                            <a href="../controllers/yonetici_ssl_controller.php?sil=<?php echo $ssl_sertifikasi['alan_adi']; ?>">Sil</a>
                            <a href="ssl_duzenle.php?alan_adi=<?php echo $ssl_sertifikasi['alan_adi']; ?>">Düzenle</a>
                            <a href="../controllers/yonetici_ssl_controller.php?yenile=<?php echo $ssl_sertifikasi['alan_adi']; ?>">Yenile</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>