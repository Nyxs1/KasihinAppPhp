<?php
require_once __DIR__ . '/../config/database.php';

function donateToCampaign($dari_user_id, $ke_campaign_id, $jumlah) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO donations (dari_user_id, ke_campaign_id, jumlah, tanggal)
                            VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iii", $dari_user_id, $ke_campaign_id, $jumlah);
    return $stmt->execute();
}

function getDonationsByUser($user_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT d.id, d.ke_campaign_id, c.nama_campaign, d.jumlah, d.tanggal
                            FROM donations d
                            JOIN campaigns c ON d.ke_campaign_id = c.id
                            WHERE d.dari_user_id = ?
                            ORDER BY d.tanggal DESC");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
