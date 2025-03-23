<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/guvenlik_duvari_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $guvenlik_duvari_model = new GuvenlikDuvariModel();
    $guvenlik_duvari_kurallari = $guvenlik_duvari_model->getGuvenlikDuvariKurallari();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Güvenlik Duvarı Yapılandırması</title>
    </head>
    <body>
        <h1>Güvenlik Duvarı Yapılandırması</h1>

        <a href="guvenlik_duvari_ekle.php">Güvenlik Duvarı Kuralı Ekle</a>

        <table>
            <thead>
                <tr>
                    <th>Protokol</th>
                    <th>Kaynak IP</th>
                    <th>Hedef IP</th>
                    <th>Hedef Port</th>
                    <th>İşlem</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guvenlik_duvari_kurallari as $kural): ?>
                    <tr>
                        <td><?php echo $kural['protokol']; ?></td>
                        <td><?php echo $kural['kaynak_ip']; ?></td>
                        <td><?php echo $kural['hedef_ip']; ?></td>
                        <td><?php echo $kural['hedef_port']; ?></td>
                        <td><?php echo $kural['islem']; ?></td>
                        <td>
                            <a href="../controllers/yonetici_guvenlik_duvari_controller.php?sil=<?php echo $kural['id']; ?>">Sil</a>
                            <a href="guvenlik_duvari_duzenle.php?id=<?php echo $kural['id']; ?>">Düzenle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>