<?php
$servername = "127.0.0.1";  // Ganti localhost dengan 127.0.0.1
$username = "root";          // Username default XAMPP
$password = "";              // Password kosong untuk root di XAMPP
$dbname = "dashboard";            // Nama database yang digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
