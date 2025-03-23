<?php
require_once '../inc/baglanti.php';

class YoneticiModel {
    private $db;

    public function __construct() {
        $this->db = Baglanti::getDB();
    }

    public function yoneticiGiris($kullanici_adi, $sifre) {
        $sql = "SELECT * FROM yoneticiler WHERE kullanici_adi = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$kullanici_adi]);
        $yonetici = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($yonetici && password_verify($sifre, $yonetici['sifre'])) {
            return $yonetici;
        } else {
            return false;
        }
    }

    public function yoneticiBilgileri($id) {
        $sql = "SELECT * FROM yoneticiler WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

    public function kullanicilari_getir() {
        global $db;
        $stmt = $db->prepare("SELECT * FROM kullanicilar");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function kullanici_getir($id){
		global $db;
		$stmt = $db->prepare("SELECT * FROM kullanicilar WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

    public function kullanici_ekle($kullanici_adi, $eposta, $sifre, $ad, $soyad) {
        global $db;
        $sifre_hash = password_hash($sifre, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO kullanicilar (kullanici_adi, eposta, sifre, ad, soyad) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$kullanici_adi, $eposta, $sifre_hash, $ad, $soyad]);
    }

	public function kullanici_sil($id) {
		global $db;
		$stmt = $db->prepare("DELETE FROM kullanicilar WHERE id = ?");
		$stmt->execute([$id]);
	}

	public function hizmet_ekle($hizmet_adi, $fiyat, $aciklama) {
		global $db;
		$stmt = $db->prepare("INSERT INTO hizmetler (hizmet_adi, fiyat, aciklama) VALUES (?, ?, ?)");
		$stmt->execute([$hizmet_adi, $fiyat, $aciklama]);
	}

	public function hizmet_guncelle($id, $hizmet_adi, $fiyat, $aciklama) {
		global $db;
		$stmt = $db->prepare("UPDATE hizmetler SET hizmet_adi = ?, fiyat = ?, aciklama = ? WHERE id = ?");
		$stmt->execute([$hizmet_adi, $fiyat, $aciklama, $id]);
	}

	public function hizmet_getir($id){
		global $db;
		$stmt = $db->prepare("SELECT * FROM hizmetler WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function hizmet_sil($id) {
		global $db;
		$stmt = $db->prepare("DELETE FROM hizmetler WHERE id = ?");
		$stmt->execute([$id]);
	}

	public function hizmetleri_getir() {
		global $db;
		$stmt = $db->prepare("SELECT * FROM hizmetler");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function faturalari_getir() {
		global $db;
		$stmt = $db->prepare("SELECT * FROM faturalar");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function fatura_ekle($fatura_no, $tarih, $tutar, $durum) {
		global $db;
		$stmt = $db->prepare("INSERT INTO faturalar (fatura_no, tarih, tutar, durum) VALUES (?, ?, ?, ?)");
		$stmt->execute([$fatura_no, $tarih, $tutar, $durum]);
	}

	public function fatura_guncelle($id, $fatura_no, $tarih, $tutar, $durum) {
		global $db;
		$stmt = $db->prepare("UPDATE faturalar SET fatura_no = ?, tarih = ?, tutar = ?, durum = ? WHERE id = ?");
		$stmt->execute([$fatura_no, $tarih, $tutar, $durum, $id]);
	}

	public function fatura_getir($id){
		global $db;
		$stmt = $db->prepare("SELECT * FROM faturalar WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function fatura_sil($id) {
		global $db;
		$stmt = $db->prepare("DELETE FROM faturalar WHERE id = ?");
		$stmt->execute([$id]);
	}

	public function kullanicilari_getir() {
		global $db;
		$stmt = $db->prepare("SELECT id, kullanici_adi, eposta, kayit_tarihi, son_giris_tarihi FROM kullanicilar");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function hizmet_raporlari_getir() {
		global $db;
		$stmt = $db->prepare("SELECT h.id, h.hizmet_adi, COUNT(f.id) AS kullanim_sikligi, SUM(f.tutar) AS toplam_gelir FROM hizmetler h LEFT JOIN faturalar f ON h.id = f.hizmet_id GROUP BY h.id");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function faturalari_getir() {
		global $db;
		$stmt = $db->prepare("SELECT * FROM faturalar");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function veritabani_yedekle($dosya_adi) {
		global $db;
		$komut = "mysqldump -h " . DB_HOST . " -u " . DB_USER . " -p" . DB_PASS . " " . DB_NAME . " > " . $dosya_adi;
		exec($komut);
	}

	public function veritabani_geri_yukle($dosya_adi) {
		global $db;
		$komut = "mysql -h " . DB_HOST . " -u " . DB_USER . " -p" . DB_PASS . " " . DB_NAME . " < " . $dosya_adi;
		exec($komut);
	}

	public function log_kaydet($kullanici_id, $olay, $ip_adresi) {
		global $db;
		$stmt = $db->prepare("INSERT INTO loglar (kullanici_id, olay, ip_adresi, tarih) VALUES (?, ?, ?, NOW())");
		$stmt->execute([$kullanici_id, $olay, $ip_adresi]);
	}

	public function loglari_getir() {
		global $db;
		$stmt = $db->prepare("SELECT * FROM loglar");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

    public function kullanici_guncelle($id, $kullanici_adi, $eposta, $sifre, $ad, $soyad) {
        global $db;
        if (!empty($sifre)) {
            $sifre_hash = password_hash($sifre, PASSWORD_DEFAULT);
            $stmt = $db->prepare("UPDATE kullanicilar SET kullanici_adi = ?, eposta = ?, sifre = ?, ad = ?, soyad = ? WHERE id = ?");
            $stmt->execute([$kullanici_adi, $eposta, $sifre_hash, $ad, $soyad, $id]);
        } else {
            $stmt = $db->prepare("UPDATE kullanicilar SET kullanici_adi = ?, eposta = ?, ad = ?, soyad = ? WHERE id = ?");
            $stmt->execute([$kullanici_adi, $eposta, $ad, $soyad, $id]);
        }
    }
}
?>