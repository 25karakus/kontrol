<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/musteri_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $musteri_model = new MusteriModel();
    $musteri = $musteri_model->getMusteri($_GET['id']);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Müşteri Düzenle</title>
    </head>
    <body>
        <h1>Müşteri Düzenle</h1>
        <form action="../controllers/yonetici_musteri_controller.php" method="post">
            <input type="hidden" name="id" value="<?php echo $musteri['id']; ?>">
            <label for="ad">Müşteri Adı:</label>
            <input type="text" name="ad" value="<?php echo $musteri['ad']; ?>" required><br><br>
            <label for="eposta">Müşteri E-posta:</label>
            <input type="email" name="eposta" value="<?php echo $musteri['eposta']; ?>" required><br><br>
            <input type="submit" name="guncelle" value="Güncelle">
        </form>
        <a href="musteriler.php">Müşteriler</a>
    </body>
    </html>