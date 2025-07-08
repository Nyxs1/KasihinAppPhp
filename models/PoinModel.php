<?php
require_once __DIR__ . '/../config/database.php';

function getPoinHistoryByUser($user_id) {
    global $conn;
    $user_id = (int) $user_id;
    $result = mysqli_query($conn, "SELECT * FROM poin_history WHERE user_id=$user_id ORDER BY tanggal DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}
