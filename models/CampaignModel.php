<?php
require_once __DIR__ . '/../config/database.php';

function getAllCampaigns() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM campaigns ORDER BY created_at DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function createCampaign($nama, $deskripsi, $tipe, $target, $gambar, $user_id) {
    global $conn;
    $nama = mysqli_real_escape_string($conn, $nama);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $tipe = mysqli_real_escape_string($conn, $tipe);
    $gambar = mysqli_real_escape_string($conn, $gambar);
    $target = (int) $target;
    $user_id = (int) $user_id;
    return mysqli_query($conn,
        "INSERT INTO campaigns (nama_campaign, deskripsi, tipe, target, gambar, user_id)
         VALUES ('$nama', '$deskripsi', '$tipe', $target, '$gambar', $user_id)"
    );
}
