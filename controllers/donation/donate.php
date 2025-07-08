<?php
require_once __DIR__ . '../../config/database.php';
require_once __DIR__ . '../../core/response.php';
require_once __DIR__ . '../../models/DonationModel.php';
require_once __DIR__ . '../../helpers/sanitizer.php';

$dari_user_id = (int) ($_POST['dari_user_id'] ?? 0);
$ke_campaign_id = (int) ($_POST['ke_campaign_id'] ?? 0);
$jumlah = (int) ($_POST['jumlah'] ?? 0);

if ($dari_user_id <= 0 || $ke_campaign_id <= 0 || $jumlah <= 0) {
    jsonResponse(["message" => "Semua field wajib diisi"], 400);
}

$success = donateToCampaign($dari_user_id, $ke_campaign_id, $jumlah);

if ($success) {
    jsonResponse(["message" => "Donasi berhasil"]);
} else {
    jsonResponse(["message" => "Gagal melakukan donasi"], 500);
}
