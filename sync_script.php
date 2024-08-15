<?php
// Sertakan file koneksi
require ("db_config.php");

// sync.php

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Logging function
function logMessage($message) {
    $logFile = __DIR__ . '/logs/sync.log'; // Menggunakan jalur relatif ke direktori logs
    if (file_put_contents($logFile, date('Y-m-d H:i:s') . " - " . $message . "\n", FILE_APPEND) === false) {
        die("Tidak dapat menulis ke file log.");
    }
}

logMessage("Sinkronisasi dimulai.");

while (true) {
    // Memeriksa apakah koneksi masih hidup
    if (!$conn->ping()) {
        logMessage("Koneksi terputus, mencoba menghubungkan ulang...");
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            logMessage("Koneksi gagal: " . $conn->connect_error);
            break; // Keluar dari loop jika koneksi gagal
        } else {
            logMessage("Koneksi berhasil dipulihkan.");
        }
    }

    // Sinkronisasi dari updata ke tanks
    $sql_update_tanks = "
        UPDATE tanks t
        JOIN updata u ON t.id = u.id
        SET t.capacity = u.kapasitas
        WHERE t.capacity != u.kapasitas;
    ";
    if ($conn->query($sql_update_tanks) === TRUE) {
        logMessage("Tanks berhasil diperbarui.");
    } else {
        logMessage("Error updating tanks: " . $conn->error);
    }

    // Sinkronisasi dari tanks ke updata
    $sql_update_updata = "
        UPDATE updata u
        JOIN tanks t ON u.id = t.id
        SET u.kapasitas = t.capacity
        WHERE u.kapasitas != t.capacity;
    ";
    if ($conn->query($sql_update_updata) === TRUE) {
        logMessage("Updata berhasil diperbarui.");
    } else {
        logMessage("Error updating updata: " . $conn->error);
    }

    // Tunggu sebelum iterasi berikutnya
    sleep(10);  // menunggu 10 detik sebelum sinkronisasi berikutnya
}

// Menutup koneksi
$conn->close();
logMessage("Sinkronisasi selesai.");
?>
