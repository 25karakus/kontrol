<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/kullanici_model2.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $kullanici_model = new KullaniciModel();
    $kullanicilar = $kullanici_model->getKullanicilar();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Kullanıcı Yönetimi</title>
    </head>
    <body>
        <h1>Kullanıcı Yönetimi</h1>

        <a href="kullanici_ekle.php">Kullanıcı Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>E-posta</th>
                    <th>Yetki</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kullanicilar as $kullanici): ?>
                    <tr>
                        <td><?php echo $kullanici['id']; ?></td>
                        <td><?php echo $kullanici['ad']; ?></td>
                        <td><?php echo $kullanici['eposta']; ?></td>
                        <td><?php echo $kullanici['yetki']; ?></td>
                        <td>
                            <a href="kullanici_duzenle.php?id=<?php echo $kullanici['id']; ?>">Düzenle</a>
                            <a href="kullanici_sil.php?id=<?php echo $kullanici['id']; ?>">Sil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>