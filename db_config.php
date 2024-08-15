<?php
$servername = "localhost";
$username = "tajancl1_dbtajan";
$password = "tajan0000"; // Ganti dengan password MySQL Anda
$dbname = "tajancl1_dbtajan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname); 
// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
