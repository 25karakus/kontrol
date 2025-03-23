<!DOCTYPE html>
    <html>
    <head>
        <title>Alan Adları</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Alan Adları</h1>

        <table>
            <thead>
                <tr>
                    <th>Alan Adı</th>
                    <th>Bitiş Tarihi</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alan_adlari as $alan_adi): ?>
                    <tr>
                        <td><?php echo $alan_adi['alan_adi']; ?></td>
                        <td><?php echo $alan_adi['bitis_tarihi']; ?></td>
                        <td><?php echo $alan_adi['durum']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>