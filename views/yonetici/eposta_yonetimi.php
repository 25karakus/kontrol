<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/eposta_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $eposta_model = new EpostaModel();
    $eposta_hesaplari = $eposta_model->getEpostaHesaplari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>E-posta Yönetimi</title>
    </head>
    <body>
        <h1>E-posta Yönetimi</h1>

        <a href="eposta_ekle.php">E-posta Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>Adı</th>
                    <th>E-posta</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eposta_hesaplari as $eposta_hesabi): ?>
                    <tr>
                        <td><?php echo $eposta_hesabi['ad']; ?></td>
                        <td><?php echo $eposta_hesabi['eposta']; ?></td>
                        <td>
                            <a href="../controllers/yonetici_eposta_controller.php?sil=<?php echo $eposta_hesabi['eposta']; ?>">Sil</a>
                            <a href="eposta_duzenle.php?eposta=<?php echo $eposta_hesabi['eposta']; ?>">Düzenle</a>
                            <a href="eposta_yonlendirme.php?eposta=<?php echo $eposta_hesabi['eposta']; ?>">Yönlendirme</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>