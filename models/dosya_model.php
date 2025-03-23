<?php
    class DosyaModel {
        // Dosya işlemleri için gerekli fonksiyonlar
        public function getDosyalar() {
            // Dosyaları listeleme işlemleri
            $dosyalar = array();
            $dizin = '../uploads/'; // Dosyaların bulunduğu dizin
            $dosya_listesi = scandir($dizin);

            foreach ($dosya_listesi as $dosya) {
                if ($dosya != '.' && $dosya != '..') {
                    $dosya_yolu = $dizin . $dosya;
                    $dosya_bilgileri = array(
                        'ad' => $dosya,
                        'tur' => is_dir($dosya_yolu) ? 'Klasör' : 'Dosya',
                        'boyut' => is_dir($dosya_yolu) ? '-' : filesize($dosya_yolu)
                    );
                    $dosyalar[] = $dosya_bilgileri;
                }
            }
            return $dosyalar;
        }

        public function dosyaSil($ad) {
            // Dosya silme işlemleri
            $dosya_yolu = '../uploads/' . $ad;
            if (is_dir($dosya_yolu)) {
                // Klasör ise tüm içeriğini sil
                $this->klasorSil($dosya_yolu);
            } else {
                // Dosya ise doğrudan sil
                unlink($dosya_yolu);
            }
        }

        public function klasorSil($dizin) {
            // Klasör ve içeriğini silme işlemleri
            $dosya_listesi = scandir($dizin);
            foreach ($dosya_listesi as $dosya) {
                if ($dosya != '.' && $dosya != '..') {
                    $dosya_yolu = $dizin . '/' . $dosya;
                    if (is_dir($dosya_yolu)) {
                        $this->klasorSil($dosya_yolu);
                    } else {
                        unlink($dosya_yolu);
                    }
                }
            }
            rmdir($dizin);
        }

        public function dosyaIndir($ad) {
            // Dosya indirme işlemleri
            $dosya_yolu = '../uploads/' . $ad;
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $ad . '"');
            readfile($dosya_yolu);
        }

        // Diğer dosya işlemleri
    }
    ?>