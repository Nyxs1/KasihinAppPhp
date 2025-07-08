<?php
require_once __DIR__ . '/../config/database.php';

function findUserByEmailAndPassword($email, $password) {
    global $conn;
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    return mysqli_fetch_assoc($query);
}

function createUser($nama, $email, $password, $role = 'person') {
    global $conn;
    $nama = mysqli_real_escape_string($conn, $nama);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $role = mysqli_real_escape_string($conn, $role);
    return mysqli_query($conn, "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password', '$role')");
}

function getUserById($id) {
    global $conn;
    $id = (int) $id;
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    return mysqli_fetch_assoc($query);
}
