<?php
    require_once '../inc/baglanti.php';

    class KullaniciModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getKullanicilar() {
            $sql = "SELECT * FROM kullanicilar";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getKullanici($id) {
            $sql = "SELECT * FROM kullanicilar WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function kullaniciEkle($ad, $eposta, $sifre, $yetki) {
            $sql = "INSERT INTO kullanicilar (ad, eposta, sifre, yetki) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $eposta, password_hash($sifre, PASSWORD_DEFAULT), $yetki]);
        }

        public function kullaniciDuzenle($id, $ad, $eposta, $yetki) {
            $sql = "UPDATE kullanicilar SET ad = ?, eposta = ?, yetki = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad, $eposta, $yetki, $id]);
        }

        public function kullaniciSil($id) {
            $sql = "DELETE FROM kullanicilar WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
        }

        // Diğer kullanıcı işlevleri
    }
    ?>