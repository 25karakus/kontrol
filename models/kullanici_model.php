<?php
require_once '../inc/baglanti.php';

class KullaniciModel {
    public function kayit($kullanici_adi, $eposta, $sifre, $ad, $soyad) {
        global $db;
        $sifre_hash = password_hash($sifre, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO kullanicilar (kullanici_adi, eposta, sifre, ad, soyad) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$kullanici_adi, $eposta, $sifre_hash, $ad, $soyad]);
    }

    public function giris($kullanici_adi_eposta, $sifre) {
        global $db;
        $stmt = $db->prepare("SELECT * FROM kullanicilar WHERE kullanici_adi = ? OR eposta = ?");
        $stmt->execute([$kullanici_adi_eposta, $kullanici_adi_eposta]);
        $kullanici = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($kullanici && password_verify($sifre, $kullanici['sifre'])) {
            return $kullanici;
        } else {
            return false;
        }
    }

public function eposta_dogrulama_anahtari_olustur($kullanici_id) {
    global $db;
    $dogrulama_anahtari = bin2hex(random_bytes(32));

    $stmt = $db->prepare("INSERT INTO eposta_dogrulama (kullanici_id, dogrulama_anahtari) VALUES (?, ?)");
    $stmt->execute([$kullanici_id, $dogrulama_anahtari]);

    return $dogrulama_anahtari;
}

public function eposta_dogrula($dogrulama_anahtari) {
    global $db;
    $stmt = $db->prepare("SELECT kullanici_id FROM eposta_dogrulama WHERE dogrulama_anahtari = ? AND dogrulama_tarihi > NOW()");
    $stmt->execute([$dogrulama_anahtari]);
    $sonuc = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($sonuc) {
        $stmt = $db->prepare("UPDATE kullanicilar SET eposta_dogrulandi = 1 WHERE id = ?");
        $stmt->execute([$sonuc['kullanici_id']]);

        $stmt = $db->prepare("DELETE FROM eposta_dogrulama WHERE dogrulama_anahtari = ?");
        $stmt->execute([$dogrulama_anahtari]);

        return true;
    } else {
        return false;
    }
}

public function sifre_sifirla($sifirlama_anahtari, $yeni_sifre) {
    global $db;
    $stmt = $db->prepare("SELECT kullanici_id FROM sifre_sifirlama WHERE sifirlama_anahtari = ? AND sifirlama_tarihi > NOW()");
    $stmt->execute([$sifirlama_anahtari]);
    $sonuc = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($sonuc) {
        $yeni_sifre_hash = password_hash($yeni_sifre, PASSWORD_DEFAULT);
        $stmt = $db->prepare("UPDATE kullanicilar SET sifre = ? WHERE id = ?");
        $stmt->execute([$yeni_sifre_hash, $sonuc['kullanici_id']]);

        $stmt = $db->prepare("DELETE FROM sifre_sifirlama WHERE sifirlama_anahtari = ?");
        $stmt->execute([$sifirlama_anahtari]);

        return true;
    } else {
        return false;
    }
}

    public function sifremi_unuttum($eposta) {
        global $db;
        $stmt = $db->prepare("SELECT * FROM kullanicilar WHERE eposta = ?");
        $stmt->execute([$eposta]);
        $kullanici = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($kullanici) {
            $sifirlama_anahtari = bin2hex(random_bytes(32));
            $sifirlama_tarihi = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $stmt = $db->prepare("INSERT INTO sifre_sifirlama (kullanici_id, sifirlama_anahtari, sifirlama_tarihi) VALUES (?, ?, ?)");
            $stmt->execute([$kullanici['id'], $sifirlama_anahtari, $sifirlama_tarihi]);

            return "sifre-sifirla.php?anahtar=$sifirlama_anahtari";
        } else {
            return false;
        }
    }
}
?>