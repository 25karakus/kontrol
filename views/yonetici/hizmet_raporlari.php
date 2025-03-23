<!DOCTYPE html>
<html>
<head>
    <title>Hizmet Raporları</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Hizmet Raporları</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hizmet Adı</th>
                    <th>Kullanım Sıklığı</th>
                    <th>Toplam Gelir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hizmetler as $hizmet): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($hizmet['id']); ?></td>
                        <td><?php echo htmlspecialchars($hizmet['hizmet_adi']); ?></td>
                        <td><?php echo htmlspecialchars($hizmet['kullanim_sikligi']); ?></td>
                        <td><?php echo htmlspecialchars($hizmet['toplam_gelir']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../script.js"></script>
</body>
</html>