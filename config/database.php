<?php
// File: koneksi.php
$host = 'localhost';    // Host database
$user = 'root';         // Username database
$pass = '';             // Password database
$db   = 'projek_pqe'; // Nama database

$con = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>