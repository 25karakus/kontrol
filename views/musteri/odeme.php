<!DOCTYPE html>
<html>
<head>
    <title>Ödeme</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1>Ödeme</h1>
    <form action="../controllers/musteri_odeme_controller.php" method="post">
        <label for="kart_numarasi">Kart Numarası:</label>
        <input type="text" name="kart_numarasi"><br><br>
        <label for="son_kullanma_tarihi">Son Kullanma Tarihi:</label>
        <input type="text" name="son_kullanma_tarihi"><br><br>
        <label for="cvv">CVV:</label>
        <input type="text" name="cvv"><br><br>
        <input type="submit" value="Ödeme Yap">
    </form>
</body>
</html>