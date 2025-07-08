<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../core/response.php';
require_once __DIR__ . '/../../models/UserModel.php';
require_once __DIR__ . '/../../helpers/sanitizer.php';


$email = sanitize($_POST['email'] ?? '');
$password = sanitize($_POST['password'] ?? '');

// Validasi input
if (empty($email) || empty($password)) {
    jsonResponse(["message" => "Email dan password wajib diisi"], 400);
}

$user = findUserByEmailAndPassword($email, $password);

if ($user) {
    unset($user['password']); // demi keamanan
    jsonResponse($user);
} else {
    jsonResponse(["message" => "Email atau password salah"], 401);
}
