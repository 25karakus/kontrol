<!DOCTYPE html>
    <html>
    <head>
        <title>Destek Talepleri</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Destek Talepleri</h1>

        <table>
            <thead>
                <tr>
                    <th>Talep No</th>
                    <th>Konu</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($talepler as $talep): ?>
                    <tr>
                        <td><?php echo $talep['talep_no']; ?></td>
                        <td><?php echo $talep['konu']; ?></td>
                        <td><?php echo $talep['tarih']; ?></td>
                        <td><?php echo $talep['durum']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Yeni Talep Oluştur</h2>
        <form action="../controllers/musteri_controller.php?action=talep_olustur" method="post">
            <label for="konu">Konu:</label>
            <input type="text" name="konu"><br><br>

            <label for="mesaj">Mesaj:</label>
            <textarea name="mesaj"></textarea><br><br>

            <input type="submit" value="Gönder">
        </form>
    </body>
    </html>