<?php
require_once __DIR__ . '/../config/database.php';

function findUserByEmail($email) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function findUserByEmailAndPassword($email, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function createUser($nama, $email, $password, $role, $poin) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users (nama, email, password, role, poin, createdAt) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssi", $nama, $email, $password, $role, $poin);
    return $stmt->execute();
}

function getUserById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
