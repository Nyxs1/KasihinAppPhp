<?php
require_once __DIR__ . '/../config/database.php';

function getAllCampaigns() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM campaigns ORDER BY created_at DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function createCampaign($nama, $deskripsi, $tipe, $target, $gambar, $user_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO campaigns (nama_campaign, deskripsi, tipe, target, gambar, user_id, created_at)
                            VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssisi", $nama, $deskripsi, $tipe, $target, $gambar, $user_id);
    return $stmt->execute();
}
