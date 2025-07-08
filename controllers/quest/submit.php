<?php
require_once '../../config/database.php';
require_once '../../core/response.php';
require_once '../../models/QuestModel.php';
require_once '../../helpers/sanitizer.php';

$user_id = (int) ($_POST['user_id'] ?? 0);
$quest_id = (int) ($_POST['quest_id'] ?? 0);
$link_konten = sanitize($_POST['link_konten'] ?? '');

if ($user_id <= 0 || $quest_id <= 0 || empty($link_konten)) {
    jsonResponse(["message" => "Semua field wajib diisi"], 400);
}

$success = submitQuest($user_id, $quest_id, $link_konten);

if ($success) {
    jsonResponse(["message" => "Quest berhasil dikirim"]);
} else {
    jsonResponse(["message" => "Gagal submit quest"], 500);
}
