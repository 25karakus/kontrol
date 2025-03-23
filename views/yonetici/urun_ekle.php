<!DOCTYPE html>
    <html>
    <head>
        <title>Ürün Ekle</title>
    </head>
    <body>
        <h1>Ürün Ekle</h1>
        <form action="../controllers/yonetici_urun_controller.php" method="post">
            <label for="ad">Ürün Adı:</label>
            <input type="text" name="ad" required><br><br>
            <label for="fiyat">Ürün Fiyatı:</label>
            <input type="number" name="fiyat" required><br><br>
            <input type="submit" name="ekle" value="Ekle">
        </form>
        <a href="urunler.php">Ürünler</a>
    </body>
    </html>