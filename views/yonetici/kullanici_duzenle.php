<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Düzenle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Kullanıcı Düzenle</h1>
        <form class="form-group" action="../../controllers/yonetici_controller.php?action=kullanici_guncelle" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token_olustur(); ?>">
            <input type="hidden" name="id" value="<?php echo $kullanici['id']; ?>">
            <label>Kullanıcı Adı:</label>
            <input type="text" class="form-control" name="kullanici_adi" value="<?php echo htmlspecialchars($kullanici['kullanici_adi']); ?>" required><br>
            <label>E-posta:</label>
            <input type="email" class="form-control" name="eposta" value="<?php echo htmlspecialchars($kullanici['eposta']); ?>" required><br>
            <label>Şifre (Değiştirmek istemiyorsanız boş bırakın):</label>
            <input type="password" class="form-control" name="sifre"><br>
            <label>Ad:</label>
            <input type="text" class="form-control" name="ad" value="<?php echo htmlspecialchars($kullanici['ad']); ?>"><br>
            <label>Soyad:</label>
            <input type="text" class="form-control" name="soyad" value="<?php echo htmlspecialchars($kullanici['soyad']); ?>"><br>
            <input type="submit" class="btn btn-primary" value="Güncelle">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../script.js"></script>
</body>
</html>