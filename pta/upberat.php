<?php

include "konekweb.php";

if (!$conn) {
    die("Connection failed:". mysqli_connect_error());
} echo "Database Connection is OK <br>";
       
    $berat = $_GET['berat'];
    //$id = 1;
    $KODE = $_GET['KODE'];
    $upberat_stmt = $conn->prepare("UPDATE updata SET `berat` = ? WHERE KODE = '$KODE'");
    $upberat_stmt->bind_param("s",$berat);

    $upberat_stmt->execute();


    // $id = 1; // Replace this with the actual id value you want to update
    // $stmt->execute();

    // Check if the update was successful
    if ($upberat_stmt->affected_rows > 0) {
        echo "Update tabel updata untuk berat successful <br>";
    } else {
        echo "Update servo di updata tabel failed";
    }

    // Close statement
    $upberat_stmt->close();

    // Close connection
    $conn->close();
    
?>