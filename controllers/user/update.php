<?php
require_once __DIR__ . '../../config/database.php';
require_once __DIR__ . '../../core/response.php';
require_once __DIR__ . '../../models/UserModel.php';
require_once __DIR__ . '../../helpers/sanitizer.php';

$id = (int) ($_POST['user_id'] ?? 0);
$nama = sanitize($_POST['nama'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$password = sanitize($_POST['password'] ?? '');

if ($id <= 0 || empty($nama) || empty($email) || empty($password)) {
    jsonResponse(["message" => "Semua field wajib diisi"], 400);
}

$updated = updateUserProfile($id, $nama, $email, $password);

if ($updated) {
    jsonResponse(["message" => "Profil berhasil diperbarui"]);
} else {
    jsonResponse(["message" => "Gagal memperbarui profil"], 500);
}
