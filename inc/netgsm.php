<?php
class Netgsm {
    private $kullanici_adi;
    private $sifre;
    private $baslik;

    public function __construct() {
        $this->kullanici_adi = 'Sizin_Netgsm_Kullanici_Adi';
        $this->sifre = 'Sizin_Netgsm_Sifre';
        $this->baslik = 'Sizin_Netgsm_Baslik';
    }

    public function smsGonder($telefon, $mesaj) {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <mainbody>
        <header>
        <usercode>' . $this->kullanici_adi . '</usercode>
        <password>' . $this->sifre . '</password>
        <startdate></startdate>
        <stopdate></stopdate>
        <msgheader>' . $this->baslik . '</msgheader>
        </header>
        <body>
        <msg><![CDATA[' . $mesaj . ']]></msg>
        <no>' . $telefon . '</no>
        </body>
        </mainbody>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.netgsm.com.tr/sms/send/xml");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "xml=" . $xml);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return array('durum' => 'hata', 'hata_mesaji' => curl_error($ch));
        }

        curl_close($ch);

        $xml_sonuc = simplexml_load_string($result);

        if ($xml_sonuc->status[0] == 0) {
            return array('durum' => 'basarili');
        } else {
            return array('durum' => 'hata', 'hata_mesaji' => (string) $xml_sonuc->status[0]);
        }
    }
}
?>