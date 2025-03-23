<!DOCTYPE html>
<html>
<head>
    <title>Loglar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Loglar</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kullanıcı ID</th>
                    <th>Olay</th>
                    <th>IP Adresi</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loglar as $log): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($log['id']); ?></td>
                        <td><?php echo htmlspecialchars($log['kullanici_id']); ?></td>
                        <td><?php echo htmlspecialchars($log['olay']); ?></td>
                        <td><?php echo htmlspecialchars($log['ip_adresi']); ?></td>
                        <td><?php echo htmlspecialchars($log['tarih']); ?></td>
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