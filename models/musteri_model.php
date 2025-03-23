<?php
    require_once '../inc/baglanti.php';

    class MusteriModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function musteri_getir($musteri_id) {
            $sql = "SELECT * FROM musteriler WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function hizmetleri_getir($musteri_id) {
            $sql = "SELECT * FROM hizmetler WHERE musteri_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function faturalari_getir($musteri_id) {
            $sql = "SELECT * FROM faturalar WHERE musteri_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function talepleri_getir($musteri_id) {
            $sql = "SELECT * FROM destek_talepleri WHERE musteri_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function alan_adlari_getir($musteri_id) {
            $sql = "SELECT * FROM alan_adlari WHERE musteri_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function profil_guncelle($musteri_id, $ad_soyad, $eposta, $adres) {
            $sql = "UPDATE musteriler SET ad_soyad = ?, eposta = ?, adres = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$ad_soyad, $eposta, $adres, $musteri_id]);
        }

        public function sifre_guncelle($musteri_id, $yeni_sifre) {
            $sql = "UPDATE musteriler SET sifre = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$yeni_sifre, $musteri_id]);
        }

        public function talep_olustur($musteri_id, $konu, $mesaj) {
            $sql = "INSERT INTO destek_talepleri (musteri_id, konu, mesaj, tarih) VALUES (?, ?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id, $konu, $mesaj]);
        }

        public function musteri_notlari_getir($musteri_id) {
            $sql = "SELECT * FROM musteri_notlari WHERE musteri_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function musteri_notu_ekle($musteri_id, $not) {
            $sql = "INSERT INTO musteri_notlari (musteri_id, not, tarih) VALUES (?, ?, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id, $not]);
        }

        public function iletisim_gecmisi_getir($musteri_id) {
            $sql = "SELECT * FROM iletisim_gecmisi WHERE musteri_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function musteri_segmentleri_getir() {
            $sql = "SELECT * FROM musteri_segmentleri";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function musteri_segmentleri_iliskisi_getir($musteri_id) {
            $sql = "SELECT segment_id FROM musteri_segment_iliskisi WHERE musteri_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id]);
            return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        }

        public function musteri_segmenti_ekle($musteri_id, $segment_id) {
            $sql = "INSERT INTO musteri_segment_iliskisi (musteri_id, segment_id) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id, $segment_id]);
        }

        public function musteri_segmenti_sil($musteri_id, $segment_id) {
            $sql = "DELETE FROM musteri_segment_iliskisi WHERE musteri_id = ? AND segment_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$musteri_id, $segment_id]);
        }

        // Diğer veritabanı işlemleri
    }
?>