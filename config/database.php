<?php
$host = "localhost";
$user = "root";
$pass = "R1341";
$dbname = "kasihin_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
