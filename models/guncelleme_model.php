<?php
    require_once '../inc/baglanti.php';

    class GuncellemeModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getGuncellemeler() {
            $sql = "SELECT * FROM guncellemeler";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function guncelle($yazilim, $yeni_surum) {
            $sql = "UPDATE guncellemeler SET mevcut_surum = ?, durum = 'Güncel' WHERE yazilim = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$yeni_surum, $yazilim]);
        }

        // Diğer güncelleme işlemleri
    }
    ?>