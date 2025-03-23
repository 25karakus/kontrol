<!DOCTYPE html>
<html>
<head>
    <title>Fatura Raporları</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Fatura Raporları</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fatura Numarası</th>
                    <th>Tarih</th>
                    <th>Tutar</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faturalar as $fatura): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fatura['id']); ?></td>
                        <td><?php echo htmlspecialchars($fatura['fatura_no']); ?></td>
                        <td><?php echo htmlspecialchars($fatura['tarih']); ?></td>
                        <td><?php echo htmlspecialchars($fatura['tutar']); ?></td>
                        <td><?php echo htmlspecialchars($fatura['durum']); ?></td>
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