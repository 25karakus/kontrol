<?php
    session_start();
    require_once '../models/musteri_model.php';

    class MusteriController {
        private $musteri_model;

        public function __construct() {
            $this->musteri_model = new MusteriModel();
        }

        public function yetkilendirme() {
            if (!isset($_SESSION['musteri_id'])) {
                header('Location: ../views/musteri/musteri_giris.php');
            }
        }

        public function musteriBilgileri() {
            // Müşteri bilgilerini veritabanından al
            return $this->musteri_model->musteriBilgileri($_SESSION['musteri_id']);
        }

        public function musteriHizmetleri() {
            // Müşterinin hizmetlerini veritabanından al
            return $this->musteri_model->musteriHizmetleri($_SESSION['musteri_id']);
        }

        public function musteriPaneli() {
            $musteri_id = $_SESSION['musteri_id'];

            // Müşteri bilgilerini getir
            $musteri = $this->musteri_model->musteri_getir($musteri_id);

            // Hizmetleri getir
            $hizmetler = $this->musteri_model->hizmetleri_getir($musteri_id);

            // Faturaları getir
            $faturalar = $this->musteri_model->faturalari_getir($musteri_id);

            // Talepleri getir
            $talepler = $this->musteri_model->talepleri_getir($musteri_id);

            // Alan adlarını getir
            $alan_adlari = $this->musteri_model->alan_adlari_getir($musteri_id);

            // Görünüm dosyalarını dahil et
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'profil':
                        include '../views/musteri/profil.php';
                        break;
                    case 'sifre':
                        include '../views/musteri/sifre-guncelle.php';
                        break;
                    case 'hizmetler':
                        include '../views/musteri/hizmetler.php';
                        break;
                    case 'faturalar':
                        include '../views/musteri/faturalar.php';
                        break;
                    case 'talepler':
                        include '../views/musteri/destek-talepleri.php';
                        break;
                    case 'alan-adlari':
                        include '../views/musteri/alan-adlari.php';
                        break;
                    case 'profil_guncelle':
                        $this->profilGuncelle();
                        break;
                    case 'sifre_guncelle':
                        $this->sifreGuncelle();
                        break;
                    case 'talep_olustur':
                        $this->talepOlustur();
                        break;
                    case 'musteri_notlari':
                        $this->musteriNotlari();
                        break;
                    case 'musteri_notu_ekle':
                        $this->musteriNotuEkle();
                        break;
                    case 'iletisim_gecmisi':
                        $this->iletisimGecmisi();
                        break;
                    case 'musteri_segmentleri':
                        $this->musteriSegmentleri();
                        break;
                    case 'musteri_segmenti_ekle':
                        $this->musteriSegmentiEkle();
                        break;
                    case 'musteri_segmenti_sil':
                        $this->musteriSegmentiSil();
                        break;
                    default:
                        include '../views/musteri/profil.php';
                        break;
                }
            } else {
                include '../views/musteri/profil.php';
            }
        }

        public function profilGuncelle() {
            if (isset($_POST['ad_soyad']) && isset($_POST['eposta']) && isset($_POST['adres'])) {
                $ad_soyad = $_POST['ad_soyad'];
                $eposta = $_POST['eposta'];
                $adres = $_POST['adres'];

                $this->musteri_model->profil_guncelle($_SESSION['musteri_id'], $ad_soyad, $eposta, $adres);
                header('Location: musteri_paneli.php?action=profil');
            }
        }

        public function sifreGuncelle() {
            if (isset($_POST['eski_sifre']) && isset($_POST['yeni_sifre']) && isset($_POST['yeni_sifre_tekrar'])) {
                $eski_sifre = $_POST['eski_sifre'];
                $yeni_sifre = $_POST['yeni_sifre'];
                $yeni_sifre_tekrar = $_POST['yeni_sifre_tekrar'];

                // Eski şifreyi kontrol et
                $musteri = $this->musteri_model->musteri_getir($_SESSION['musteri_id']);
                if ($musteri['sifre'] == $eski_sifre) {
                    if ($yeni_sifre == $yeni_sifre_tekrar) {
                        $this->musteri_model->sifre_guncelle($_SESSION['musteri_id'], $yeni_sifre);
                        header('Location: musteri_paneli.php?action=sifre');
                    } else {
                        echo "Yeni şifreler eşleşmiyor.";
                    }
                } else {
                    echo "Eski şifre hatalı.";
                }
            }
        }

        public function talepOlustur() {
            if (isset($_POST['konu']) && isset($_POST['mesaj'])) {
                $konu = $_POST['konu'];
                $mesaj = $_POST['mesaj'];

                $this->musteri_model->talep_olustur($_SESSION['musteri_id'], $konu, $mesaj);
                header('Location: musteri_paneli.php?action=talepler');
            }
        }

        public function musteriNotlari() {
            $musteri_id = $_SESSION['musteri_id'];
            $musteri_notlari = $this->musteri_model->musteri_notlari_getir($musteri_id);
            include '../views/musteri/musteri_notlari.php';
        }

        public function musteriNotuEkle() {
            if (isset($_POST['not'])) {
                $musteri_id = $_SESSION['musteri_id'];
                $not = $_POST['not'];
                $this->musteri_model->musteri_notu_ekle($musteri_id, $not);
                header('Location: musteri_paneli.php?action=musteri_notlari');
            }
        }

        public function iletisimGecmisi() {
            $musteri_id = $_SESSION['musteri_id'];
            $iletisim_gecmisi = $this->musteri_model->iletisim_gecmisi_getir($musteri_id);
            include '../views/musteri/iletisim_gecmisi.php';
        }

        public function musteriSegmentleri() {
            $musteri_id = $_SESSION['musteri_id'];
            $musteri_segmentleri = $this->musteri_model->musteri_segmentleri_getir();
            $musteri_segment_iliskisi = $this->musteri_model->musteri_segmentleri_iliskisi_getir($musteri_id);
            include '../views/musteri/musteri_segmentleri.php';
        }

        public function musteriSegmentiEkle() {
            if (isset($_POST['segment_id'])) {
                $musteri_id = $_SESSION['musteri_id'];
                $segment_id = $_POST['segment_id'];
                $this->musteri_model->musteri_segmenti_ekle($musteri_id, $segment_id);
                header('Location: musteri_paneli.php?action=musteri_segmentleri');
            }
        }

		public function musteriSegmentiSil() {
        if (isset($_GET['segment_id'])) {
            $musteri_id = $_SESSION['musteri_id'];
            $segment_id = $_GET['segment_id'];
            $this->musteri_model->musteri_segmenti_sil($musteri_id, $segment_id);
            header('Location: musteri_paneli.php?action=musteri_segmentleri');
        }
    }
}

$musteri_controller = new MusteriController();

// Yetkilendirme kontrolü
$musteri_controller->yetkilendirme();

// Müşteri paneli işlemleri
$musteri_controller->musteriPaneli();
?>
