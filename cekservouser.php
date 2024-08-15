<?php
include'db_config.php';

// Ambil parameter kode dari URL
$kode = isset($_GET['kode']) ? $_GET['kode'] : '';

// Pisahkan kode menjadi array location_id
$kodeArray = explode(',', $kode);

$conn = new mysqli($servername, $username, $password, $dbname);

// Check koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk memeriksa nilai servo berdasarkan location_id
$sql = "SELECT location_id, servo FROM updata WHERE location_id IN (" . implode(',', $kodeArray) . ")";
$result = $conn->query($sql);

if ($result) {
    $servoData = array();
    while ($row = $result->fetch_assoc()) {
        $servoData[] = $row;
    }
    // Mengembalikan data servo dalam format JSON
    echo json_encode($servoData);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>