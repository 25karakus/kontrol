<?php
    require_once '../inc/baglanti.php';

    class VeritabaniModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getVeritabanlari() {
            $sql = "SELECT * FROM veritabanlari";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getVeritabani($id) {
            $sql = "SELECT * FROM veritabanlari WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function veritabaniEkle($ad) {
            $sql = "INSERT INTO veritabanlari (ad) VALUES (?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad]);
        }

        public function veritabaniSil($id) {
            $sql = "DELETE FROM veritabanlari WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        }

        // Diğer veritabanı işlevleri
    }
    ?>