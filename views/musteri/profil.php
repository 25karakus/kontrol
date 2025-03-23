<!DOCTYPE html>
    <html>
    <head>
        <title>Müşteri Profili</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Müşteri Profili</h1>

        <form action="../controllers/musteri_controller.php?action=profil_guncelle" method="post">
            <label for="ad_soyad">Ad Soyad:</label>
            <input type="text" name="ad_soyad" value="<?php echo $musteri['ad_soyad']; ?>"><br><br>

            <label for="eposta">E-posta:</label>
            <input type="email" name="eposta" value="<?php echo $musteri['eposta']; ?>"><br><br>

            <label for="adres">Adres:</label>
            <textarea name="adres"><?php echo $musteri['adres']; ?></textarea><br><br>

            <input type="submit" value="Güncelle">
        </form>
    </body>
    </html>