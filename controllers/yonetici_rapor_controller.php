<?php
    session_start();
    require_once '../models/rapor_model.php';

    class YoneticiRaporController {
        private $rapor_model;

        public function __construct() {
            $this->rapor_model = new RaporModel();
        }

        public function indirSatisRaporu() {
            $satis_raporu = $this->rapor_model->getSatisRaporu();

            // Raporu Excel formatında oluşturma
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="satis_raporu.xls"');

            echo "Tarih\tToplam Satış\n";
            foreach ($satis_raporu as $rapor) {
                echo $rapor['tarih'] . "\t" . $rapor['toplam_satis'] . "\n";
            }
        }

        // Diğer rapor indirme işlevleri
    }

    $yonetici_rapor_controller = new YoneticiRaporController();

    if (isset($_GET['indir_satis_raporu'])) {
        $yonetici_rapor_controller->indirSatisRaporu();
    }

    // Diğer rapor indirme işlemleri
    ?>