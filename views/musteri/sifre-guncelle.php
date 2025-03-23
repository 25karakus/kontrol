<!DOCTYPE html>
    <html>
    <head>
        <title>Şifre Güncelle</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Şifre Güncelle</h1>

        <form action="../controllers/musteri_controller.php?action=sifre_guncelle" method="post">
            <label for="eski_sifre">Eski Şifre:</label>
            <input type="password" name="eski_sifre"><br><br>

            <label for="yeni_sifre">Yeni Şifre:</label>
            <input type="password" name="yeni_sifre"><br><br>

            <label for="yeni_sifre_tekrar">Yeni Şifre Tekrar:</label>
            <input type="password" name="yeni_sifre_tekrar"><br><br>

            <input type="submit" value="Güncelle">
        </form>
    </body>
    </html>