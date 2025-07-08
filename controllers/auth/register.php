<?php
require_once '../../config/database.php';
require_once '../../core/response.php';
require_once '../../models/UserModel.php';
require_once '../../helpers/sanitizer.php';

$nama = sanitize($_POST['nama'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$password = sanitize($_POST['password'] ?? '');
$role = sanitize($_POST['role'] ?? 'person'); // default: person
$poin = 1000;

// Validasi
if (empty($nama) || empty($email) || empty($password)) {
    jsonResponse(["message" => "Nama, email, dan password wajib diisi"], 400);
}

// Cek email sudah digunakan
if (findUserByEmail($email)) {
    jsonResponse(["message" => "Email sudah digunakan"], 409);
}

// Simpan ke database
$created = createUser($nama, $email, $password, $role, $poin);

if ($created) {
    jsonResponse(["message" => "Registrasi berhasil"]);
} else {
    jsonResponse(["message" => "Gagal mendaftarkan user"], 500);
}
