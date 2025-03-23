<?php
    require_once '../inc/baglanti.php';

    class SunucuModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getSunucular() {
            $sql = "SELECT * FROM sunucular";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSunucu($id) {
            $sql = "SELECT * FROM sunucular WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function sunucuEkle($ad, $ip_adresi) {
            $sql = "INSERT INTO sunucular (ad, ip_adresi, durum) VALUES (?, ?, 'Kapalı')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $ip_adresi]);
        }

        public function sunucuDuzenle($id, $ad, $ip_adresi) {
            $sql = "UPDATE sunucular SET ad = ?, ip_adresi = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $ip_adresi, $id]);
        }

        public function sunucuSil($id) {
            $sql = "DELETE FROM sunucular WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        }

        public function sunucuDurumGuncelle($id, $durum) {
            $sql = "UPDATE sunucular SET durum = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$durum, $id]);
        }

        // Diğer sunucu işlevleri
    }
    ?>