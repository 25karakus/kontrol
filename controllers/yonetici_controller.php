<?php
require_once '../../models/yonetici_model.php';
require_once '../../lib/guvenlik.php';
require_once '../../lib/hata.php';

if ($_GET['action'] == 'giris') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    try {
        $yonetici_model = new YoneticiModel();
        $yonetici = $yonetici_model->giris($kullanici_adi, $sifre);

        if ($yonetici) {
            $_SESSION['yonetici_id'] = $yonetici['id'];
            header('Location: ../views/yonetici/panel.php'); // Yönetici paneline yönlendir
        } else {
            hata_goster("Kullanıcı adı veya şifre hatalı!");
        }
    } catch (PDOException $e) {
        hata_kaydet($e->getMessage());
        hata_goster("Bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
} elseif ($_GET['action'] == 'kullanicilar') {
    $yonetici_model = new YoneticiModel();
    $kullanicilar = $yonetici_model->kullanicilari_getir();
    include '../../views/yonetici/kullanicilar.php';
} elseif ($_GET['action'] == 'kullanici_ekle') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $kullanici_adi = $_POST['kullanici_adi'];
    $eposta = $_POST['eposta'];
    $sifre = $_POST['sifre'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];

    $yonetici_model = new YoneticiModel();
    $yonetici_model->kullanici_ekle($kullanici_adi, $eposta, $sifre, $ad, $soyad);

    header('Location: kullanicilar.php'); // Kullanıcı listesine geri dön
} elseif ($_GET['action'] == 'kullanici_duzenle') {
    $id = $_GET['id'];
    $yonetici_model = new YoneticiModel();
    $kullanici = $yonetici_model->kullanici_getir($id); // Kullanıcı bilgilerini getiren fonksiyon
    include '../../views/yonetici/kullanici_duzenle.php';
} elseif ($_GET['action'] == 'kullanici_guncelle') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $id = $_POST['id'];
    $kullanici_adi = $_POST['kullanici_adi'];
    $eposta = $_POST['eposta'];
    $sifre = $_POST['sifre'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];

    $yonetici_model = new YoneticiModel();
    $yonetici_model->kullanici_guncelle($id, $kullanici_adi, $eposta, $sifre, $ad, $soyad);

    header('Location: kullanicilar.php'); // Kullanıcı listesine geri dön
} elseif ($_GET['action'] == 'kullanici_sil') {
    $id = $_GET['id'];
    $yonetici_model = new YoneticiModel();
    $yonetici_model->kullanici_sil($id);

    header('Location: kullanicilar.php'); // Kullanıcı listesine geri dön
} elseif ($_GET['action'] == 'hizmetler') {
    $yonetici_model = new YoneticiModel();
    $hizmetler = $yonetici_model->hizmetleri_getir();
    include '../../views/yonetici/hizmetler.php';
} elseif ($_GET['action'] == 'hizmet_ekle') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $hizmet_adi = $_POST['hizmet_adi'];
    $fiyat = $_POST['fiyat'];
    $aciklama = $_POST['aciklama'];

    $yonetici_model = new YoneticiModel();
    $yonetici_model->hizmet_ekle($hizmet_adi, $fiyat, $aciklama);

    header('Location: hizmetler.php'); // Hizmet listesine geri dön
} elseif ($_GET['action'] == 'hizmet_guncelle') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $id = $_POST['id'];
    $hizmet_adi = $_POST['hizmet_adi'];
    $fiyat = $_POST['fiyat'];
    $aciklama = $_POST['aciklama'];

    $yonetici_model = new YoneticiModel();
    $yonetici_model->hizmet_guncelle($id, $hizmet_adi, $fiyat, $aciklama);

    header('Location: hizmetler.php'); // Hizmet listesine geri dön
} elseif ($_GET['action'] == 'hizmet_duzenle') {
    $id = $_GET['id'];
    $yonetici_model = new YoneticiModel();
    $hizmet = $yonetici_model->hizmet_getir($id);
    include '../../views/yonetici/hizmet_duzenle.php';
} elseif ($_GET['action'] == 'hizmet_sil') {
    $id = $_GET['id'];
    $yonetici_model = new YoneticiModel();
    $yonetici_model->hizmet_sil($id);

    header('Location: hizmetler.php'); // Hizmet listesine geri dön
} elseif ($_GET['action'] == 'faturalar') {
    $yonetici_model = new YoneticiModel();
    $faturalar = $yonetici_model->faturalari_getir();
    include '../../views/yonetici/faturalar.php';
} elseif ($_GET['action'] == 'fatura_ekle') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $fatura_no = $_POST['fatura_no'];
    $tarih = $_POST['tarih'];
    $tutar = $_POST['tutar'];
    $durum = $_POST['durum'];

    $yonetici_model = new YoneticiModel();
    $yonetici_model->fatura_ekle($fatura_no, $tarih, $tutar, $durum);

    header('Location: faturalar.php'); // Fatura listesine geri dön
} elseif ($_GET['action'] == 'fatura_guncelle') {
    if (!csrf_token_dogrula($_POST['csrf_token'])) {
        die("CSRF hatası!");
    }

    $id = $_POST['id'];
    $fatura_no = $_POST['fatura_no'];
    $tarih = $_POST['tarih'];
    $tutar = $_POST['tutar'];
    $durum = $_POST['durum'];

    $yonetici_model = new YoneticiModel();
    $yonetici_model->fatura_guncelle($id, $fatura_no, $tarih, $tutar, $durum);

    header('Location: faturalar.php'); // Fatura listesine geri dön
} elseif ($_GET['action'] == 'fatura_duzenle') {
    $id = $_GET['id'];
    $yonetici_model = new YoneticiModel();
    $fatura = $yonetici_model->fatura_getir($id);
    include '../../views/yonetici/fatura_duzenle.php';
} elseif ($_GET['action'] == 'fatura_sil') {
    $id = $_GET['id'];
    $yonetici_model = new YoneticiModel();
    $yonetici_model->fatura_sil($id);

    header('Location: faturalar.php'); // Fatura listesine geri dön
} elseif ($_GET['action'] == 'kullanici_raporlari') {
    $yonetici_model = new YoneticiModel();
    $kullanicilar = $yonetici_model->kullanicilari_getir();
    include '../../views/yonetici/kullanici_raporlari.php';
} elseif ($_GET['action'] == 'hizmet_raporlari') {
    $yonetici_model = new YoneticiModel();
    $hizmetler = $yonetici_model->hizmet_raporlari_getir();
    include '../../views/yonetici/hizmet_raporlari.php';
} elseif ($_GET['action'] == 'fatura_raporlari') {
    $yonetici_model = new YoneticiModel();
    $faturalar = $yonetici_model->faturalari_getir();
    include '../../views/yonetici/fatura_raporlari.php';
} elseif ($_GET['action'] == 'veritabani_yedekle') {
    $dosya_adi = 'yedek_' . date('Y-m-d_H-i-s') . '.sql';
    $yonetici_model = new YoneticiModel();
    $yonetici_model->veritabani_yedekle($dosya_adi);
    header('Location: yonetici_paneli.php'); // Yönetici paneline geri dön
} elseif ($_GET['action'] == 'veritabani_geri_yukle') {
    $dosya_adi = $_FILES['yedek_dosyasi']['tmp_name'];
    $yonetici_model = new YoneticiModel();
    $yonetici_model->veritabani_geri_yukle($dosya_adi);
    header('Location: yonetici_paneli.php'); // Yönetici paneline geri dön
} elseif ($_GET['action'] == 'loglar') {
    $yonetici_model = new YoneticiModel();
    $loglar = $yonetici_model->loglari_getir();
    include '../../views/yonetici/loglar.php';
}
?>