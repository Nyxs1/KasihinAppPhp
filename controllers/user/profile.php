<?php
require_once __DIR__ . '../../config/database.php';
require_once __DIR__ . '../../core/response.php';
require_once __DIR__ . '../../models/UserModel.php';

$user_id = (int) ($_GET['user_id'] ?? 0);

if ($user_id <= 0) {
    jsonResponse(["message" => "User ID tidak valid"], 400);
}

$user = getUserById($user_id);
if ($user) {
    unset($user['password']); // jangan kirim password
    jsonResponse($user);
} else {
    jsonResponse(["message" => "User tidak ditemukan"], 404);
}
