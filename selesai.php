<?php
session_start(); // Mulai session
if (!isset($_SESSION['logged_in'])) {
    header('location: loginpengguna.php');
    exit;
}

require_once 'iot/bacadatauser.php';

// Tentukan path ke file yang ingin Anda baca
$folder_path = "iot/bacadatauser.php";

// Periksa apakah file ada sebelum membaca isinya
if (file_exists($folder_path) && !is_dir($folder_path)) {
    // Baca isi file dan tampilkan
    $file_content = file_get_contents($folder_path);
}

// Koneksi ke database
include 'db_config.php';

// Periksa apakah parameter kode ada dalam URL
$response = array('isKodeValid' => false); // Default response

if (isset($_GET["kode"])) {
    $kode = $_GET["kode"];
    
    // Ubah nilai servo menjadi 0 pada tabel lokasi
    $sql_update_lokasi = "UPDATE lokasi SET servo = 0 WHERE kode = '$kode'";
    if ($conn->query($sql_update_lokasi) === TRUE) {
        $response['isKodeValid'] = true;
    }
    
    // Ubah nilai servo menjadi 0 pada tabel updata
    $sql_update_updata = "UPDATE updata SET servo = 0 WHERE kode = '$kode'";
    if ($conn->query($sql_update_updata) === TRUE) {
        $response['isKodeValid'] = true;
    }
    
    // Update nilai servo menjadi 0 pada tabel users berdasarkan user_id
    $sql_update_users = "UPDATE users SET servo = 0 WHERE oauth_id = '$g_id'";
    if ($conn->query($sql_update_users) === TRUE) {
        $response['isKodeValid'] = true;
    }
} else {
    $response['isKodeValid'] = false;
}

// Kembalikan respon JSON
header("location:https://tajan.cloud/hpengguna.php");
//echo json_encode($response);

// Tutup koneksi
$conn->close();
?>
