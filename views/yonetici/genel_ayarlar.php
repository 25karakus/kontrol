<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/ayar_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $ayar_model = new AyarModel();
    $genel_ayarlar = $ayar_model->getGenelAyarlar();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Genel Ayarlar</title>
    </head>
    <body>
        <h1>Genel Ayarlar</h1>
        <form action="../controllers/yonetici_ayar_controller.php" method="post">
            <label for="site_adi">Site Adı:</label>
            <input type="text" name="site_adi" value="<?php echo $genel_ayarlar['site_adi']; ?>" required><br><br>
            <label for="site_aciklamasi">Site Açıklaması:</label>
            <textarea name="site_aciklamasi" required><?php echo $genel_ayarlar['site_aciklamasi']; ?></textarea><br><br>
            <input type="submit" name="guncelle" value="Güncelle">
        </form>
        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>