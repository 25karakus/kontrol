<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/ayar_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $ayar_model = new AyarModel();
    $eposta_ayarlari = $ayar_model->getEpostaAyarlari();
    $api_ayarlari = $ayar_model->getApiAyarlari();
    $guvenlik_ayarlari = $ayar_model->getGuvenlikAyarlari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Diğer Ayarlar</title>
    </head>
    <body>
        <h1>Diğer Ayarlar</h1>

        <h2>E-posta Ayarları</h2>
        <form action="../controllers/yonetici_ayar_controller.php" method="post">
            <label for="smtp_sunucu">SMTP Sunucu:</label>
            <input type="text" name="smtp_sunucu" value="<?php echo $eposta_ayarlari['smtp_sunucu']; ?>" required><br><br>
            <label for="smtp_kullanici">SMTP Kullanıcı:</label>
            <input type="text" name="smtp_kullanici" value="<?php echo $eposta_ayarlari['smtp_kullanici']; ?>" required><br><br>
            <label for="smtp_sifre">SMTP Şifre:</label>
            <input type="password" name="smtp_sifre" value="<?php echo $eposta_ayarlari['smtp_sifre']; ?>" required><br><br>
            <label for="eposta_sablonu">E-posta Şablonu:</label>
            <textarea name="eposta_sablonu" required><?php echo $eposta_ayarlari['eposta_sablonu']; ?></textarea><br><br>
            <label for="eposta_bildirimleri">E-posta Bildirimleri:</label>
            <select name="eposta_bildirimleri">
                <option value="acik" <?php if ($eposta_ayarlari['eposta_bildirimleri'] == 'acik') echo 'selected'; ?>>Açık</option>
                <option value="kapali" <?php if ($eposta_ayarlari['eposta_bildirimleri'] == 'kapali') echo 'selected'; ?>>Kapalı</option>
            </select><br><br>
            <input type="submit" name="guncelle_eposta" value="Güncelle">
        </form>

        <h2>API Ayarları</h2>
        <form action="../controllers/yonetici_ayar_controller.php" method="post">
            <label for="api_anahtari">API Anahtarı:</label>
            <input type="text" name="api_anahtari" value="<?php echo $api_ayarlari['api_anahtari']; ?>" required><br><br>
            <label for="api_izni">API İzni:</label>
            <input type="text" name="api_izni" value="<?php echo $api_ayarlari['api_izni']; ?>" required><br><br>
            <label for="api_entegrasyonu">API Entegrasyonu:</label>
            <input type="text" name="api_entegrasyonu" value="<?php echo $api_ayarlari['api_entegrasyonu']; ?>" required><br><br>
            <label for="api_gunlukleri">API Günlükleri:</label>
            <select name="api_gunlukleri">
                <option value="acik" <?php if ($api_ayarlari['api_gunlukleri'] == 'acik') echo 'selected'; ?>>Açık</option>
                <option value="kapali" <?php if ($api_ayarlari['api_gunlukleri'] == 'kapali') echo 'selected'; ?>>Kapalı</option>
            </select><br><br>
            <input type="submit" name="guncelle_api" value="Güncelle">
        </form>

        <h2>Güvenlik Ayarları</h2>
        <form action="../controllers/yonetici_ayar_controller.php" method="post">
            <label for="yonetici_izinleri">Yönetici İzinleri:</label>
            <input type="text" name="yonetici_izinleri" value="<?php echo $guvenlik_ayarlari['yonetici_izinleri']; ?>" required><br><br>
            <label for="parola_politikasi">Parola Politikası:</label>
            <input type="text" name="parola_politikasi" value="<?php echo $guvenlik_ayarlari['parola_politikasi']; ?>" required><br><br>
            <label for="iki_faktorlu_kimlik">İki Faktörlü Kimlik Doğrulama:</label>
            <select name="iki_faktorlu_kimlik">
                <option value="acik" <?php if ($guvenlik_ayarlari['iki_faktorlu_kimlik'] == 'acik') echo 'selected'; ?>>Açık</option>
                <option value="kapali" <?php if ($guvenlik_ayarlari['iki_faktorlu_kimlik'] == 'kapali') echo 'selected'; ?>>Kapalı</option>
            </select><br><br>
            <label for="guvenlik_duvari">Güvenlik Duvarı:</label>
            <select name="guvenlik_duvari">
                <option value="acik" <?php if ($guvenlik_ayarlari['guvenlik_duvari'] == 'acik') echo 'selected'; ?>>Açık</option>
                <option value="kapali" <?php if ($guvenlik_ayarlari['guvenlik_duvari'] == 'kapali') echo 'selected'; ?>>Kapalı</option>
            </select><br><br>
            <label for="ssl_sertifikasi">SSL Sertifikası:</label>
            <select name="ssl_sertifikasi">
                <option value="acik" <?php if ($guvenlik_ayarlari['ssl_sertifikasi'] == 'acik') echo 'selected'; ?>>Açık</option>
                <option value="kapali" <?php if ($guvenlik_ayarlari['ssl_sertifikasi'] == 'kapali') echo 'selected'; ?>>Kapalı</option>
            </select><br><br>
            <label for="veri_yedekleme">Veri Yedekleme:</label>
            <select name="veri_yedekleme">
                <option value="acik" <?php if ($guvenlik_ayarlari['veri_yedekleme'] == 'acik') echo 'selected'; ?>>Açık</option>
                <option value="kapali" <?php if ($guvenlik_ayarlari['veri_yedekleme'] == 'kapali') echo 'selected'; ?>>Kapalı</option>
            </select><br><br>
            <input type="submit" name="guncelle_guvenlik" value="Güncelle">
        </form>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>