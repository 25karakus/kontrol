<!DOCTYPE html>
<html>
<head>
    <title>Şifre Sıfırla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Şifre Sıfırla</h1>
        <form class="form-group" action="../controllers/kullanici_controller.php?action=sifre_sifirla&anahtar=<?php echo $_GET['anahtar']; ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token_olustur(); ?>">
            <label>Yeni Şifre:</label>
            <input type="password" class="form-control" name="yeni_sifre" required><br>
            <input type="submit" class="btn btn-primary" value="Şifreyi Sıfırla">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../script.js"></script>
</body>
</html>