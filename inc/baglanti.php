<?php
$db_host = 'localhost';
$db_adi = 'version2';
$db_kullanici = 'root';
$db_sifre = '';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_adi;charset=utf8", $db_kullanici, $db_sifre);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    hata_kaydet($e->getMessage());
    die("Veritabanı bağlantısı başarısız!");
}
?>