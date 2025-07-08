<?php
require_once __DIR__ . '/../config/database.php';

function getAllQuests() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM quests ORDER BY created_at DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function submitQuest($user_id, $quest_id, $link_konten) {
    global $conn;
    $user_id = (int) $user_id;
    $quest_id = (int) $quest_id;
    $link_konten = mysqli_real_escape_string($conn, $link_konten);
    return mysqli_query($conn,
        "INSERT INTO quest_submissions (user_id, quest_id, link_konten)
         VALUES ($user_id, $quest_id, '$link_konten')"
    );
}
