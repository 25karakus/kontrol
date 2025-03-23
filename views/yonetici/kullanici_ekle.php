<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Ekle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Kullanıcı Ekle</h1>
        <form class="form-group" action="../../controllers/yonetici_controller.php?action=kullanici_ekle" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token_olustur(); ?>">
            <label>Kullanıcı Adı:</label>
            <input type="text" class="form-control" name="kullanici_adi" required><br>
            <label>E-posta:</label>
            <input type="email" class="form-control" name="eposta" required><br>
            <label>Şifre:</label>
            <input type="password" class="form-control" name="sifre" required><br>
            <label>Ad:</label>
            <input type="text" class="form-control" name="ad"><br>
            <label>Soyad:</label>
            <input type="text" class="form-control" name="soyad"><br>
            <input type="submit" class="btn btn-primary" value="Ekle">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../script.js"></script>
</body>
</html>