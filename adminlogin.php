<?php
session_start();

// Sertakan file koneksi
require_once("db_config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah "username" dan "password" ada dalam array $_POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Gunakan prepared statement untuk mencegah SQL injection
        $stmt = $conn->prepare("SELECT * FROM usermin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Username ditemukan, periksa password
            $user_data = $result->fetch_assoc();
            if ($password == $user_data['password']) {
                // Login berhasil
                $_SESSION['username'] = $username;
                header("location: h-admin.php"); // Arahkan ke halaman selamat datang admin
                
                exit();
            } else {
                // Password salah
                header("location:loginadmin.html?error=1"); // Redirect ke halaman loginadmin.html dengan query string error=1
                exit();
            }
        } else {
            // Username tidak ditemukan
            header("location: loginadmin.html?error=1"); // Redirect ke halaman loginadmin.html dengan query string error=1
            exit();
        }

    } else {
        echo "Silakan masukkan username dan password.";
    }
}

?>
