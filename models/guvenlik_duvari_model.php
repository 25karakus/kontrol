<?php
    require_once '../inc/baglanti.php';

    class GuvenlikDuvariModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getGuvenlikDuvariKurallari() {
            $sql = "SELECT * FROM guvenlik_duvari_kurallari";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function guvenlikDuvariKuraliEkle($protokol, $kaynak_ip, $hedef_ip, $hedef_port, $islem) {
            $sql = "INSERT INTO guvenlik_duvari_kurallari (protokol, kaynak_ip, hedef_ip, hedef_port, islem) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$protokol, $kaynak_ip, $hedef_ip, $hedef_port, $islem]);
        }

        public function guvenlikDuvariKuraliSil($id) {
            $sql = "DELETE FROM guvenlik_duvari_kurallari WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        }

        // Diğer güvenlik duvarı işlemleri
    }
    ?>