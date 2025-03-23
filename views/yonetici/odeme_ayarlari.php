<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/ayar_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $ayar_model = new AyarModel();
    $odeme_ayarlari = $ayar_model->getOdemeAyarlari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Ödeme Ayarları</title>
    </head>
    <body>
        <h1>Ödeme Ayarları</h1>
        <form action="../controllers/yonetici_ayar_controller.php" method="post">
            <label for="odeme_yontemi">Ödeme Yöntemi:</label>
            <select name="odeme_yontemi">
                <option value="kredikarti" <?php if ($odeme_ayarlari['odeme_yontemi'] == 'kredikarti') echo 'selected'; ?>>Kredi Kartı</option>
                <option value="havale" <?php if ($odeme_ayarlari['odeme_yontemi'] == 'havale') echo 'selected'; ?>>Havale</option>
                <option value="paypal" <?php if ($odeme_ayarlari['odeme_yontemi'] == 'paypal') echo 'selected'; ?>>PayPal</option>
            </select><br><br>
            <label for="odeme_saglayici">Ödeme Sağlayıcı:</label>
            <input type="text" name="odeme_saglayici" value="<?php echo $odeme_ayarlari['odeme_saglayici']; ?>" required><br><br>
            <input type="submit" name="guncelle_odeme" value="Güncelle">
        </form>
        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>