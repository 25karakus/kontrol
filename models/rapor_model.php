<?php
    require_once '../inc/baglanti.php';

    class RaporModel {
        private $db;

        public function __construct() {
            $this->db = Baglanti::getDB();
        }

        public function getSatisRaporlari() {
            $sql = "SELECT DATE(siparis_tarihi) as tarih, SUM(fiyat) as toplam_satis FROM siparisler INNER JOIN urunler ON siparisler.urun_id = urunler.urun_id GROUP BY DATE(siparis_tarihi)";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getMusteriRaporlari() {
            $sql = "SELECT musteriler.ad as musteri_adi, COUNT(siparisler.siparis_id) as toplam_siparis_sayisi, SUM(urunler.fiyat) as toplam_harcama FROM musteriler INNER JOIN siparisler ON musteriler.id = siparisler.id INNER JOIN urunler ON siparisler.urun_id = urunler.urun_id GROUP BY musteriler.id ORDER BY toplam_harcama DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getStokRaporu() {
            $sql = "SELECT urunler.ad as urun_adi, stok.stok_sayisi FROM urunler INNER JOIN stok ON urunler.urun_id = stok.urun_id";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getZiyaretRaporu() {
            $sql = "SELECT sayfa_adi, ziyaret_sayisi FROM ziyaretler";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

public function getSunucuKullanimi() {
            // Sunucu kullanım verilerini alma işlemleri
            $sunucu_kullanimi = array(
                '00:00' => 30,
                '06:00' => 45,
                '12:00' => 60,
                '18:00' => 50,
                '24:00' => 35
            );
            return $sunucu_kullanimi;
        }

        public function getTrafik() {
            // Trafik verilerini alma işlemleri
            $trafik = array(
                'Ocak' => 10,
                'Şubat' => 12,
                'Mart' => 15,
                'Nisan' => 18,
                'Mayıs' => 20
            );
            return $trafik;
        }

        public function getVeritabaniKullanimi() {
            // Veritabanı kullanım verilerini alma işlemleri
            $veritabani_kullanimi = array(
                'Veritabanı 1' => 100,
                'Veritabanı 2' => 150,
                'Veritabanı 3' => 200,
                'Veritabanı 4' => 120,
                'Veritabanı 5' => 180
            );
            return $veritabani_kullanimi;
        }

        public function getEpostaTrafik() {
            // E-posta trafik verilerini alma işlemleri
            $eposta_trafik = array(
                '00:00' => 50,
                '06:00' => 75,
                '12:00' => 100,
                '18:00' => 80,
                '24:00' => 60
            );
            return $eposta_trafik;
        }

        // Diğer rapor işlevleri
    }
    ?>