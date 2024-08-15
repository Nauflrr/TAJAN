<?php

include "konekweb.php";

if (!$conn) {
    die("Connection failed:". mysqli_connect_error());
} echo "Database Connection is OK <br>";
       
    $Kapasitas = 0;
    $resetkapasitas_stmt = $conn->prepare("UPDATE updata SET `Kapasitas` = ?  WHERE KODE = 'tult-1'");
    $resetkapasitas_stmt->bind_param("s",$Kapasitas);

    $resetkapasitas_stmt->execute();

    // Check if the update was successful
    if ($resetkapasitas_stmt->affected_rows > 0) {
        echo "Reset Kapasitas successful <br>";
    } else {
        echo "Update updata failed <br>";
    }

    // Close statement
    $resetkapasitas_stmt->close();

    // Close connection
    $conn->close();
    
?>