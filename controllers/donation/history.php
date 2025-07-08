<?php
require_once __DIR__ . '../../config/database.php';
require_once __DIR__ . '../../core/response.php';
require_once __DIR__ . '../../models/DonationModel.php';

$user_id = (int) ($_GET['user_id'] ?? 0);

if ($user_id <= 0) {
    jsonResponse(["message" => "User ID wajib dikirim"], 400);
}

$history = getDonationsByUser($user_id);
jsonResponse($history);
