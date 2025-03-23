<?php
require_once '../models/kullanici_model.php';
require_once '../lib/guvenlik.php';
require_once '../lib/hata.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // PHPMailer yüklemesi

if ($_GET['action'] == 'giris') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $kullanici_adi_eposta = $_POST['kullanici_adi_eposta'];
    $sifre = $_POST['sifre'];

    try {
        $kullanici_model = new KullaniciModel();
        $kullanici = $kullanici_model->giris($kullanici_adi_eposta, $sifre);

        if ($kullanici) {
            $_SESSION['kullanici_id'] = $kullanici['id'];
            header('Location: ../views/musteri/profil.php'); // Profil sayfasına yönlendir
        } else {
            hata_goster("Kullanıcı adı veya şifre hatalı!");
        }
    } catch (PDOException $e) {
        hata_kaydet($e->getMessage());
        hata_goster("Bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
}

if ($_GET['action'] == 'sifre_sifirla') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $yeni_sifre = $_POST['yeni_sifre'];
    $sifirlama_anahtari = $_GET['anahtar'];

    try {
        $kullanici_model = new KullaniciModel();
        $sonuc = $kullanici_model->sifre_sifirla($sifirlama_anahtari, $yeni_sifre);

        if ($sonuc) {
            header('Location: ../views/giris.php'); // Giriş sayfasına yönlendir
        } else {
            hata_goster("Şifre sıfırlama başarısız. Lütfen tekrar deneyin.");
        }
    } catch (PDOException $e) {
        hata_kaydet($e->getMessage());
        hata_goster("Bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
}

if ($_GET['action'] == 'kayit') {
    // ... (kayıt işlemleri)

    try {
        $kullanici_model = new KullaniciModel();
        $kullanici_model->kayit($kullanici_adi, $eposta, $sifre, $ad, $soyad);

        $kullanici_id = $db->lastInsertId(); // Eklenen kullanıcının ID'sini al
        $dogrulama_anahtari = $kullanici_model->eposta_dogrulama_anahtari_olustur($kullanici_id);

        $dogrulama_baglantisi = "eposta-dogrula.php?anahtar=$dogrulama_anahtari";

        $mail = new PHPMailer(true);

        try {
            // Sunucu ayarları
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = 'smtp.example.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'eposta@example.com';
            $mail->Password   = 'sifre';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Alıcılar
            $mail->setFrom('eposta@example.com', 'Otomasyon Sistemi');
            $mail->addAddress($eposta);

            // İçerik
            $mail->isHTML(true);
            $mail->Subject = 'E-posta Adresinizi Doğrulayın';
            $mail->Body    = "E-posta adresinizi doğrulamak için <a href='$dogrulama_baglantisi'>bu bağlantıya</a> tıklayın.";

            $mail->send();
            hata_goster("Kayıt başarılı. E-posta adresinizi doğrulamak için e-postanızı kontrol edin.");
        } catch (Exception $e) {
            hata_goster("Kayıt başarılı, ancak e-posta gönderilemedi. Hata: {$mail->ErrorInfo}");
        }

        header('Location: ../views/giris.php'); // Giriş sayfasına yönlendir
    } catch (PDOException $e) {
        hata_kaydet($e->getMessage());
        hata_goster("Bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
}

if ($_GET['action'] == 'sifremi_unuttum') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $eposta = $_POST['eposta'];

    try {
        $kullanici_model = new KullaniciModel();
        $sifirlama_baglantisi = $kullanici_model->sifremi_unuttum($eposta);

        if ($sifirlama_baglantisi) {
            $mail = new PHPMailer(true);

            try {
                // Sunucu ayarları
                $mail->SMTPDebug = SMTP::DEBUG_OFF; // SMTP hata ayıklama (DEBUG_SERVER, DEBUG_CLIENT, DEBUG_OFF)
                $mail->isSMTP();
                $mail->Host     = 'smtp.example.com'; // SMTP sunucusu
                $mail->SMTPAuth = true;
                $mail->Username = 'eposta@example.com'; // SMTP kullanıcı adı
                $mail->Password = 'sifre'; // SMTP şifresi
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port     = 587;

                // Alıcılar
                $mail->setFrom('eposta@example.com', 'Otomasyon Sistemi');
                $mail->addAddress($eposta);

                // İçerik
                $mail->isHTML(true);
                $mail->Subject = 'Şifre Sıfırlama Bağlantısı';
                $mail->Body    = "Şifrenizi sıfırlamak için <a href='$sifirlama_baglantisi'>bu bağlantıya</a> tıklayın.";

                $mail->send();
                hata_goster("Şifre sıfırlama bağlantısı e-posta adresinize gönderildi.");
            } catch (Exception $e) {
                hata_goster("E-posta gönderilemedi. Hata: {$mail->ErrorInfo}");
            }
        } else {
            hata_goster("Bu e-posta adresine kayıtlı bir kullanıcı bulunamadı.");
        }
    } catch (PDOException $e) {
        hata_kaydet($e->getMessage());
        hata_goster("Bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
}
?>