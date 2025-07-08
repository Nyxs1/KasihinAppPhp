<?php
require_once __DIR__ . '../../config/database.php';
require_once __DIR__ . '../../core/response.php';
require_once __DIR__ . '../../models/CampaignModel.php';
require_once __DIR__ . '../../helpers/sanitizer.php';

$nama = sanitize($_POST['nama_campaign'] ?? '');
$deskripsi = sanitize($_POST['deskripsi'] ?? '');
$tipe = sanitize($_POST['tipe'] ?? '');
$target = (int) ($_POST['target'] ?? 0);
$gambar = sanitize($_POST['gambar'] ?? ''); // bisa berupa nama file
$user_id = (int) ($_POST['user_id'] ?? 0);

if (empty($nama) || empty($deskripsi) || empty($tipe) || $target <= 0 || $user_id <= 0) {
    jsonResponse(["message" => "Semua field wajib diisi"], 400);
}

$created = createCampaign($nama, $deskripsi, $tipe, $target, $gambar, $user_id);

if ($created) {
    jsonResponse(["message" => "Campaign berhasil dibuat"]);
} else {
    jsonResponse(["message" => "Gagal membuat campaign"], 500);
}
