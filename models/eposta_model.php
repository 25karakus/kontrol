<?php
    require_once '../inc/baglanti.php';

    class EpostaModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getEpostaHesaplari() {
            $sql = "SELECT * FROM eposta_hesaplari";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getEpostaHesabi($eposta) {
            $sql = "SELECT * FROM eposta_hesaplari WHERE eposta = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$eposta]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function epostaEkle($ad, $eposta, $sifre) {
            $sql = "INSERT INTO eposta_hesaplari (ad, eposta, sifre) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $eposta, password_hash($sifre, PASSWORD_DEFAULT)]);
        }

        public function epostaSil($eposta) {
            $sql = "DELETE FROM eposta_hesaplari WHERE eposta = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$eposta]);
        }

        // Diğer e-posta işlemleri
    }
    ?>