<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cosmetics"; // Sesuai nama database di screenshot Anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>