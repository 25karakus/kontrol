<!DOCTYPE html>
<html>
<head>
    <title>Fatura Ekle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Fatura Ekle</h1>
        <form class="form-group" action="../../controllers/yonetici_controller.php?action=fatura_ekle" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token_olustur(); ?>">
            <label>Fatura Numarası:</label>
            <input type="text" class="form-control" name="fatura_no" required><br>
            <label>Tarih:</label>
            <input type="date" class="form-control" name="tarih" required><br>
            <label>Tutar:</label>
            <input type="number" class="form-control" name="tutar" required><br>
            <label>Durum:</label>
            <select class="form-control" name="durum">
                <option value="Ödendi">Ödendi</option>
                <option value="Ödenmedi">Ödenmedi</option>
            </select><br>
            <input type="submit" class="btn btn-primary" value="Ekle">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../script.js"></script>
</body>
</html>