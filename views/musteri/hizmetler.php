<!DOCTYPE html>
    <html>
    <head>
        <title>Hizmetler</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Hizmetler</h1>

        <table>
            <thead>
                <tr>
                    <th>Hizmet Adı</th>
                    <th>Bitiş Tarihi</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hizmetler as $hizmet): ?>
                    <tr>
                        <td><?php echo $hizmet['hizmet_adi']; ?></td>
                        <td><?php echo $hizmet['bitis_tarihi']; ?></td>
                        <td><?php echo $hizmet['durum']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>