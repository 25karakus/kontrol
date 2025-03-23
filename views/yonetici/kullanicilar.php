<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Yönetimi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h1>Kullanıcı Yönetimi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kullanıcı Adı</th>
                    <th>E-posta</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Kayıt Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kullanicilar as $kullanici): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($kullanici['id']); ?></td>
                        <td><?php echo htmlspecialchars($kullanici['kullanici_adi']); ?></td>
                        <td><?php echo htmlspecialchars($kullanici['eposta']); ?></td>
                        <td><?php echo htmlspecialchars($kullanici['ad']); ?></td>
                        <td><?php echo htmlspecialchars($kullanici['soyad']); ?></td>
                        <td><?php echo htmlspecialchars($kullanici['kayit_tarihi']); ?></td>
                        <td>
                            <a href="kullanici_duzenle.php?id=<?php echo $kullanici['id']; ?>">Düzenle</a>
                            <a href="kullanici_sil.php?id=<?php echo $kullanici['id']; ?>" onclick="return confirm('Kullanıcıyı silmek istediğinize emin misiniz?');">Sil</a>
                        </td>
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