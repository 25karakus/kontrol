<!DOCTYPE html>
    <html>
    <head>
        <title>İletişim Geçmişi</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>İletişim Geçmişi</h1>

        <table>
            <thead>
                <tr>
                    <th>Tarih</th>
                    <th>Tür</th>
                    <th>Detaylar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($iletisim_gecmisi as $iletisim): ?>
                    <tr>
                        <td><?php echo $iletisim['tarih']; ?></td>
                        <td><?php echo $iletisim['tur']; ?></td>
                        <td><?php echo $iletisim['detaylar']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>