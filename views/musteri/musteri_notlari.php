<!DOCTYPE html>
    <html>
    <head>
        <title>Müşteri Notları</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Müşteri Notları</h1>

        <table>
            <thead>
                <tr>
                    <th>Not</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($musteri_notlari as $not): ?>
                    <tr>
                        <td><?php echo $not['not']; ?></td>
                        <td><?php echo $not['tarih']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Yeni Not Ekle</h2>
        <form action="../controllers/musteri_controller.php?action=musteri_notu_ekle" method="post">
            <textarea name="not"></textarea><br><br>
            <input type="submit" value="Ekle">
        </form>
    </body>
    </html>