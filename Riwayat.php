<?php
// Koneksi ke database
require 'db_config.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil 5 riwayat terakhir
$sql = "SELECT Nama, Lokasi, Botol, Status, Date FROM Riwayat ORDER BY Date DESC LIMIT 5";
$result = $conn->query($sql);

$rows = array();
if ($result->num_rows > 0) {
    // Mengumpulkan data
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
} else {
    echo "0 hasil";
}

// Tutup koneksi
$conn->close();

// Mengirim data ke halaman lain
session_start();
$_SESSION['riwayat'] = $rows;

header("Location: h-admin.php");
exit();
?>