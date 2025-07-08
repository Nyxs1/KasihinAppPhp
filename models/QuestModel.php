<?php
require_once __DIR__ . '/../config/database.php';

function getAllQuests() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM quests ORDER BY created_at DESC");
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function submitQuest($user_id, $quest_id, $link_konten) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO quest_submissions (user_id, quest_id, link_konten, submitted_at)
                            VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $user_id, $quest_id, $link_konten);
    return $stmt->execute();
}
