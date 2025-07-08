<?php
require_once __DIR__ . '/../config/database.php';

function donateToCampaign($dari_user_id, $ke_campaign_id, $jumlah) {
    global $conn;
    $dari_user_id = (int) $dari_user_id;
    $ke_campaign_id = (int) $ke_campaign_id;
    $jumlah = (int) $jumlah;
    return mysqli_query($conn,
        "INSERT INTO donations (dari_user_id, ke_campaign_id, jumlah)
         VALUES ($dari_user_id, $ke_campaign_id, $jumlah)"
    );
}

function getDonationsByUser($user_id) {
    global $conn;
    $user_id = (int) $user_id;
    $result = mysqli_query($conn, "SELECT * FROM donations WHERE dari_user_id=$user_id ORDER BY tanggal DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}
