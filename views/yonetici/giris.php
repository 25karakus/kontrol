<!DOCTYPE html>
<html>
<head>
    <title>Yönetici Girişi</title>
</head>
<body>
    <h1>Yönetici Girişi</h1>
    <?php if (isset($hata_mesaji)) : ?>
        <p style="color: red;"><?php echo $hata_mesaji; ?></p>
    <?php endif; ?>
    <form action="yonetici_giris_controller.php" method="post">
        <label for="kullanici_adi">Kullanıcı Adı:</label>
        <input type="text" name="kullanici_adi" required><br><br>
        <label for="sifre">Şifre:</label>
        <input type="password" name="sifre" required><br><br>
        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>