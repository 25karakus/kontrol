<?php
require_once '../inc/baglanti.php';

class OdemeModel {
    private $db;

    public function __construct() {
        $this->db = Baglanti::getDB();
    }

    public function siparisOnayla($siparis_id) {
        $sql = "UPDATE siparisler SET odeme_durumu = 'odendi' WHERE siparis_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$siparis_id]);
    }
}
?>