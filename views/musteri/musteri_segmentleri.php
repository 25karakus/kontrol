<!DOCTYPE html>
    <html>
    <head>
        <title>Müşteri Segmentleri</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <h1>Müşteri Segmentleri</h1>

        <table>
            <thead>
                <tr>
                    <th>Segment Adı</th>
                    <th>Açıklama</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($musteri_segmentleri as $segment): ?>
                    <tr>
                        <td><?php echo $segment['ad']; ?></td>
                        <td><?php echo $segment['aciklama']; ?></td>
                        <td>
                            <?php if (in_array($segment['id'], $musteri_segment_iliskisi)): ?>
                                <a href="../controllers/musteri_controller.php?action=musteri_segmenti_sil&segment_id=<?php echo $segment['id']; ?>">Sil</a>
                            <?php else: ?>
                                <form action="../controllers/musteri_controller.php?action=musteri_segmenti_ekle" method="post">
                                    <input type="hidden" name="segment_id" value="<?php echo $segment['id']; ?>">
                                    <input type="submit" value="Ekle">
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>