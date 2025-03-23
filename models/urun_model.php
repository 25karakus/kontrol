<?php
    require_once '../inc/baglanti.php';

    class UrunModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getUrunler() {
            $sql = "SELECT * FROM urunler";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function ekleUrun($ad, $fiyat) {
            $sql = "INSERT INTO urunler (ad, fiyat) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $fiyat]);
        }

        public function getUrun($urun_id) {
            $sql = "SELECT * FROM urunler WHERE urun_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$urun_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function guncelleUrun($urun_id, $ad, $fiyat) {
            $sql = "UPDATE urunler SET ad = ?, fiyat = ? WHERE urun_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $fiyat, $urun_id]);
        }

        public function silUrun($urun_id) {
            $sql = "DELETE FROM urunler WHERE urun_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$urun_id]);
        }
    }
    ?>