<?php
    session_start();
    require_once '../controllers/yonetici_giris_controller.php';
    require_once '../models/rapor_model.php';

    $yonetici_giris_controller = new YoneticiGirisController();
    $yonetici_giris_controller->yetkilendirme();

    $rapor_model = new RaporModel();
    $sunucu_kullanimi = $rapor_model->getSunucuKullanimi();
    $trafik = $rapor_model->getTrafik();
    $veritabani_kullanimi = $rapor_model->getVeritabaniKullanimi();
    $eposta_trafik = $rapor_model->getEpostaTrafik();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Raporlar ve İstatistikler</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <h1>Raporlar ve İstatistikler</h1>

        <h2>Sunucu Kullanımı</h2>
        <canvas id="sunucuKullanimiGrafik" width="400" height="200"></canvas>

        <h2>Trafik</h2>
        <canvas id="trafikGrafik" width="400" height="200"></canvas>

        <h2>Veritabanı Kullanımı</h2>
        <canvas id="veritabaniKullanimiGrafik" width="400" height="200"></canvas>

        <h2>E-posta Trafiği</h2>
        <canvas id="epostaTrafikGrafik" width="400" height="200"></canvas>

        <script>
            // Sunucu Kullanımı Grafiği
            new Chart(document.getElementById('sunucuKullanimiGrafik'), {
                type: 'line',
                data: {
                    labels: <?php echo json_encode(array_keys($sunucu_kullanimi)); ?>,
                    datasets: [{
                        label: 'CPU Kullanımı (%)',
                        data: <?php echo json_encode(array_values($sunucu_kullanimi)); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Trafik Grafiği
            new Chart(document.getElementById('trafikGrafik'), {
                type: 'line',
                data: {
                    labels: <?php echo json_encode(array_keys($trafik)); ?>,
                    datasets: [{
                        label: 'Trafik (GB)',
                        data: <?php echo json_encode(array_values($trafik)); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Veritabanı Kullanımı Grafiği
            new Chart(document.getElementById('veritabaniKullanimiGrafik'), {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($veritabani_kullanimi)); ?>,
                    datasets: [{
                        label: 'Veritabanı Boyutu (MB)',
                        data: <?php echo json_encode(array_values($veritabani_kullanimi)); ?>,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // E-posta Trafiği Grafiği
            new Chart(document.getElementById('epostaTrafikGrafik'), {
                type: 'line',
                data: {
                    labels: <?php echo json_encode(array_keys($eposta_trafik)); ?>,
                    datasets: [{
                        label: 'E-posta Sayısı',
                        data: <?php echo json_encode(array_values($eposta_trafik)); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <a href="yonetici_paneli.php">Yönetici Paneli</a>
    </body>
    </html>