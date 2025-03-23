<?php
    require_once '../inc/baglanti.php';

    class SaldiriTespitModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function saldiriLogla($saldiri_bilgileri) {
            $sql = "INSERT INTO saldiri_loglari (tarih, ip_adresi, saldiri_turu, saldiri_detaylari) VALUES (NOW(), ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$saldiri_bilgileri['ip_adresi'], $saldiri_bilgileri['saldiri_turu'], json_encode($saldiri_bilgileri['saldiri_detaylari'])]);
        }

        // Diğer saldırı tespit işlemleri
    }
    ?>