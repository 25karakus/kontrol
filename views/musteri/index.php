<?php
// Oturum başlatma
session_start();

// Veritabanı bağlantısı
$db = new PDO('mysql:host=localhost;dbname=proje_veritabani', 'kullanici_adi', 'sifre');

// Yönlendirme
$sayfa = isset($_GET['sayfa']) ? $_GET['sayfa'] : 'anasayfa';

// Sayfa içeriğini dahil etme
switch ($sayfa) {
    case 'anasayfa':
        include 'musteri/sayfalar/anasayfa.php';
        break;
    case 'siparisler':
        include 'musteri/sayfalar/siparisler.php';
        break;
    case 'profil':
        include 'musteri/sayfalar/profil.php';
        break;
    // Diğer müşteri sayfaları...
    default:
        include 'musteri/sayfalar/404.php';
        break;
}

// Veritabanı bağlantısını kapatma
$db = null;
?>