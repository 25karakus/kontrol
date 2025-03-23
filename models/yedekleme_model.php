<?php
    require_once '../inc/baglanti.php';

    class YedeklemeModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getYedeklemeler() {
            $sql = "SELECT * FROM yedeklemeler";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function yedekle($tur, $dosya_adi) {
            $sql = "INSERT INTO yedeklemeler (tur, dosya_adi, tarih) VALUES (?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$tur, $dosya_adi]);
        }

        public function yedeklemeSil($dosya_adi) {
            $sql = "DELETE FROM yedeklemeler WHERE dosya_adi = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$dosya_adi]);
        }

        // Diğer yedekleme işlemleri
    }
    ?>