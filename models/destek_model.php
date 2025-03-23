<?php
    require_once '../inc/baglanti.php';

    class DestekModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function destekTalebiEkle($konu, $mesaj) {
            $sql = "INSERT INTO destek_talepleri (konu, mesaj, tarih) VALUES (?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$konu, $mesaj]);
        }

        // Diğer destek işlemleri
    }
    ?>