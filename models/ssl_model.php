<?php
    require_once '../inc/baglanti.php';

    class SSLModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getSSLSertifikalari() {
            $sql = "SELECT * FROM ssl_sertifikalari";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSSLSertifikasi($alan_adi) {
            $sql = "SELECT * FROM ssl_sertifikalari WHERE alan_adi = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$alan_adi]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function sslEkle($alan_adi, $durum, $bitis_tarihi) {
            $sql = "INSERT INTO ssl_sertifikalari (alan_adi, durum, bitis_tarihi) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$alan_adi, $durum, $bitis_tarihi]);
        }

        public function sslSil($alan_adi) {
            $sql = "DELETE FROM ssl_sertifikalari WHERE alan_adi = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$alan_adi]);
        }

        public function sslYenile($alan_adi, $bitis_tarihi) {
            $sql = "UPDATE ssl_sertifikalari SET bitis_tarihi = ? WHERE alan_adi = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$bitis_tarihi, $alan_adi]);
        }

        // Diğer SSL işlemleri
    }
    ?>