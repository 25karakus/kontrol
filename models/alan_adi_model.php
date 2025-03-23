<?php
    require_once '../inc/baglanti.php';

    class AlanAdiModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getAlanAdlari() {
            $sql = "SELECT * FROM alan_adlari";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAlanAdi($id) {
            $sql = "SELECT * FROM alan_adlari WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function alanAdiEkle($ad) {
            $sql = "INSERT INTO alan_adlari (ad, durum) VALUES (?, 'Aktif')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad]);
        }

        public function alanAdiDuzenle($id, $ad) {
            $sql = "UPDATE alan_adlari SET ad = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $id]);
        }

        public function alanAdiSil($id) {
            $sql = "DELETE FROM alan_adlari WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        }

        // Diğer alan adı işlevleri
    }
    ?>