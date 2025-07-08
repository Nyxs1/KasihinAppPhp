<?php
// Versi dummy karena tidak pakai JWT saat ini

require_once __DIR__ . '/response.php';

function validateToken() {
    // Kalau kamu belum pakai token, anggap user selalu valid
    return [
        "id" => 0,
        "role" => "guest"
    ];
}
