<!DOCTYPE html>
    <html>
    <head>
        <title>Faturalar</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Faturalar</h1>

        <table>
            <thead>
                <tr>
                    <th>Fatura No</th>
                    <th>Tarih</th>
                    <th>Tutar</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faturalar as $fatura): ?>
                    <tr>
                        <td><?php echo $fatura['fatura_no']; ?></td>
                        <td><?php echo $fatura['tarih']; ?></td>
                        <td><?php echo $fatura['tutar']; ?></td>
                        <td><?php echo $fatura['durum']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>