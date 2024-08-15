<?php
    include "konekweb.php";
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
    echo "Database Connection is OK <br>";
    
    $Botol = $_GET['Botol'];
    $Status = $_GET['Status'];
    $Date = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $KODE = $_GET['KODE'];
    $servo_id = $_GET['servo_id'];
    
    $sql_check_kode = "SELECT * FROM lokasi WHERE kode = '$KODE'";
    $sql_check_nama = "SELECT * FROM users WHERE servo = '$servo_id'";
    
    $result_check_kode = $conn->query($sql_check_kode);
    $result_check_nama = $conn->query($sql_check_nama);
    
    $result_check_kode->num_rows > 0;
    $row_lokasi = $result_check_kode->fetch_assoc();
    $Lokasi = $row_lokasi["nama_lokasi"];

    $result_check_nama->num_rows > 0;
    $row_nama = $result_check_nama->fetch_assoc();
    $Nama = $row_nama["fullname"];

    if($Botol == "Tak_Sesuai"){
        $Botol = "Tak Sesuai";
    }

    // Persiapkan pernyataan INSERT
    $upriwayat_stmt = $conn->prepare("INSERT INTO Riwayat (`Nama`, `Lokasi`, `Botol`, `Status`,`Date`) VALUES (?, ?, ?, ?, ?)");
    $upriwayat_stmt->bind_param("sssss", $Nama, $Lokasi, $Botol, $Status, $Date);
    
    $upriwayat_stmt->execute();
    
    // Periksa apakah insert berhasil
    if ($upriwayat_stmt->affected_rows > 0) {
        echo "Insert ke tabel upriwayat untuk servo berhasil <br>";
    } else {
        echo "Insert ke tabel upriwayat untuk servo gagal";
    }
    
    // Tutup pernyataan
    $upriwayat_stmt->close();
    
    // Tutup koneksi
    $conn->close();
    
    ?>
    