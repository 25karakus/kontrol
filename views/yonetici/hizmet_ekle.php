<!DOCTYPE html>
<html>
<head>
    <title>Hizmet Ekle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Hizmet Ekle</h1>
        <form class="form-group" action="../../controllers/yonetici_controller.php?action=hizmet_ekle" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token_olustur(); ?>">
            <label>Hizmet Adı:</label>
            <input type="text" class="form-control" name="hizmet_adi" required><br>
            <label>Fiyat:</label>
            <input type="number" class="form-control" name="fiyat" required><br>
            <label>Açıklama:</label>
            <textarea class="form-control" name="aciklama"></textarea><br>
            <input type="submit" class="btn btn-primary" value="Ekle">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../script.js"></script>
</body>
</html>