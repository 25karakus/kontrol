<!DOCTYPE html>
<html>
<head>
    <title>E-posta Doğrulama</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>E-posta Doğrulama</h1>
        <?php
        require_once '../models/kullanici_model.php';

        $dogrulama_anahtari = $_GET['anahtar'];

        $kullanici_model = new KullaniciModel();
        $sonuc = $kullanici_model->eposta_dogrula($dogrulama_anahtari);

        if ($sonuc) {
            echo "<p>E-posta adresiniz başarıyla doğrulandı. Giriş yapabilirsiniz.</p>";
        } else {
            echo "<p>E-posta doğrulama başarısız. Lütfen tekrar deneyin.</p>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../script.js"></script>
</body>
</html>