<?php
// Koneksi ke database
require 'db_config.php';
$g_id = $_SESSION['userid'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa kode yang dikirim melalui AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    
    // Query untuk memeriksa apakah kode sedang digunakan dan servo tersedia
    $sql = "SELECT servo FROM users WHERE oauth_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kode);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Inisialisasi variabel untuk pengecekan servo
    $is_servo_available = true;
    $used_servos = array();
    
    while ($row = $result->fetch_assoc()) {
        $servo = $row['servo'];
        if ($servo == 0) {
            $is_servo_available = false;
        } else {
            $used_servos[] = $servo;
        }
    }
    
    // Cek unikasi servo untuk oauth_id yang diberikan
    if ($is_servo_available && count(array_unique($used_servos)) == count($used_servos)) {
        echo "available";
    } else {
        echo "used";
    }
    
    $stmt->close();
}

$conn->close();
?>