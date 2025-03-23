<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/siparis_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $siparis_model = new SiparisModel();
    $siparis = $siparis_model->getSiparis($_GET['siparis_id']);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Sipariş Düzenle</title>
    </head>
    <body>
        <h1>Sipariş Düzenle</h1>
        <form action="../controllers/yonetici_siparis_controller.php" method="post">
            <input type="hidden" name="siparis_id" value="<?php echo $siparis['siparis_id']; ?>">
            <label for="odeme_durumu">Ödeme Durumu:</label>
            <select name="odeme_durumu">
                <option value="bekliyor" <?php if ($siparis['odeme_durumu'] == 'bekliyor') echo 'selected'; ?>>Bekliyor</option>
                <option value="odendi" <?php if ($siparis['odeme_durumu'] == 'odendi') echo 'selected'; ?>>Ödendi</option>
                <option value="iptal" <?php if ($siparis['odeme_durumu'] == 'iptal') echo 'selected'; ?>>İptal</option>
            </select><br><br>
            <input type="submit" name="guncelle" value="Güncelle">
        </form>
        <a href="siparisler.php">Siparişler</a>
    </body>
    </html>