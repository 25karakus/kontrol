<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/siparis_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $siparis_model = new SiparisModel();
    $siparisler = $siparis_model->getSiparisler();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Siparişler</title>
    </head>
    <body>
        <h1>Siparişler</h1>
        <table border="1">
            <tr>
                <th>Sipariş ID</th>
                <th>Müşteri Adı</th>
                <th>Ürün Adı</th>
                <th>Sipariş Tarihi</th>
                <th>Ödeme Durumu</th>
                <th>İşlemler</th>
            </tr>
            <?php foreach ($siparisler as $siparis) : ?>
                <tr>
                    <td><?php echo $siparis['siparis_id']; ?></td>
                    <td><?php echo $siparis['musteri_adi']; ?></td>
                    <td><?php echo $siparis['urun_adi']; ?></td>
                    <td><?php echo $siparis['siparis_tarihi']; ?></td>
                    <td><?php echo $siparis['odeme_durumu']; ?></td>
                    <td>
                        <a href="siparis_duzenle.php?siparis_id=<?php echo $siparis['siparis_id']; ?>">Düzenle</a> |
                        <a href="siparis_detaylari.php?siparis_id=<?php echo $siparis['siparis_id']; ?>">Detaylar</a> |
                        <a href="controllers/yonetici_siparis_controller.php?sil=<?php echo $siparis['siparis_id']; ?>">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>