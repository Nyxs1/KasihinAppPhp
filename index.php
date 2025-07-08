<?php
header("Location: controllers/auth/login.php");

echo json_encode([
    "message" => "Welcome to KasihinApp API",
    "endpoints" => [
        "Login" => "controllers/auth/login.php",
        "Register" => "controllers/auth/register.php",
        "Campaigns" => "controllers/campaign/get_all.php",
        "Quests" => "controllers/quest/list.php",
        "Donations" => "controllers/donation/history.php",
    ]
]);
exit;
