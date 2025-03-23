<?php
    require_once '../inc/baglanti.php';

    class FTPModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getFTPHesaplari() {
            $sql = "SELECT * FROM ftp_hesaplari";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getFTPHesabi($kullanici_adi) {
            $sql = "SELECT * FROM ftp_hesaplari WHERE kullanici_adi = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$kullanici_adi]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function ftpEkle($kullanici_adi, $sifre, $dizin) {
            $sql = "INSERT INTO ftp_hesaplari (kullanici_adi, sifre, dizin) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$kullanici_adi, password_hash($sifre, PASSWORD_DEFAULT), $dizin]);
        }

        public function ftpSil($kullanici_adi) {
            $sql = "DELETE FROM ftp_hesaplari WHERE kullanici_adi = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$kullanici_adi]);
        }

        // Diğer FTP işlemleri
    }
    ?>