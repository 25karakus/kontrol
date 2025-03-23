<?php
require_once '../inc/baglanti.php';

class SiparisModel {
    private $db;

    public function __construct() {
        $this->db = Baglanti::getDB();
    }

    public function getSiparisler() {
        $sql = "SELECT siparisler.*, musteriler.ad as musteri_adi, urunler.ad as urun_adi FROM siparisler INNER JOIN musteriler ON siparisler.id = musteriler.id INNER JOIN urunler ON siparisler.urun_id = urunler.urun_id";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSiparis($siparis_id) {
        $sql = "SELECT * FROM siparisler WHERE siparis_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$siparis_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guncelleSiparis($siparis_id, $odeme_durumu) {
        $sql = "UPDATE siparisler SET odeme_durumu = ? WHERE siparis_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$odeme_durumu, $siparis_id]);
    }

    public function silSiparis($siparis_id) {
        $sql = "DELETE FROM siparisler WHERE siparis_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$siparis_id]);
    }

    public function siparisVer($musteri_id, $urun_id, $alan_adi = null, $hosting_paketi = null) {
        $urun_turu = $alan_adi ? 'alan_adi' : 'hosting';
        $urun_id = $alan_adi ? $urun_id : $hosting_paketi;

        $sql = "INSERT INTO siparisler (id, siparis_tarihi, siparis_turu, urun_id, fiyat) VALUES (?, NOW(), ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$musteri_id, $urun_turu, $urun_id, $this->getUrunFiyati($urun_id)]);
    }

    public function getUrunFiyati($urun_id) {
        $sql = "SELECT fiyat FROM urunler WHERE urun_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$urun_id]);
        $urun = $stmt->fetch(PDO::FETCH_ASSOC);
        return $urun['fiyat'];
    }
}
?>