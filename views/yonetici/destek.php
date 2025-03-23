<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Destek ve Yardım</title>
    </head>
    <body>
        <h1>Destek ve Yardım</h1>

        <h2>Sık Sorulan Sorular (SSS)</h2>
        <ul>
            <li>
                <h3>Hosting hesabımı nasıl oluşturabilirim?</h3>
                <p>Hosting hesabınızı oluşturmak için "Hosting Hesapları" bölümüne gidin ve "Yeni Hesap Oluştur" butonuna tıklayın.</p>
            </li>
            <li>
                <h3>Alan adımı nasıl bağlayabilirim?</h3>
                <p>Alan adınızı bağlamak için "Alan Adları" bölümüne gidin ve "Alan Adı Ekle" butonuna tıklayın. Ardından, alan adınızın DNS ayarlarını hosting sunucunuzun IP adresine yönlendirin.</p>
            </li>
            <li>
                <h3>E-posta hesabımı nasıl oluşturabilirim?</h3>
                <p>E-posta hesabınızı oluşturmak için "E-posta Hesapları" bölümüne gidin ve "Yeni Hesap Oluştur" butonuna tıklayın.</p>
            </li>
            </ul>

        <h2>Yardım Dokümanları</h2>
        <ul>
            <li><a href="yardim_dokumanlari/hosting_hesaplari.pdf">Hosting Hesapları Yönetimi</a></li>
            <li><a href="yardim_dokumanlari/alan_adlari.pdf">Alan Adları Yönetimi</a></li>
            <li><a href="yardim_dokumanlari/eposta_hesaplari.pdf">E-posta Hesapları Yönetimi</a></li>
            </ul>

        <h2>Destek Talebi Gönder</h2>
        <form action="../controllers/yonetici_destek_controller.php" method="post">
            <label for="konu">Konu:</label><br>
            <input type="text" id="konu" name="konu" required><br><br>
            <label for="mesaj">Mesaj:</label><br>
            <textarea id="mesaj" name="mesaj" rows="4" cols="50" required></textarea><br><br>
            <input type="submit" name="gonder" value="Gönder">
        </form>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>