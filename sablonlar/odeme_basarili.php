<!DOCTYPE html>
<html>
<head>
    <title>Sipariş Ödeme Başarılı</title>
</head>
<body>
    <h1>Sipariş Ödeme Başarılı</h1>
    <p>Sayın <?php echo $_SESSION['kullanici_adi']; ?>,</p>
    <p>Siparişiniz başarıyla ödendi. Sipariş numaranız: <?php echo $_SESSION['siparis_id']; ?></p>
    <p>Ödeme tutarı: <?php echo $_SESSION['siparis_tutari']; ?> TL</p>
</body>
</html>