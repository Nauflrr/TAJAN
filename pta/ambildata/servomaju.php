<?php

include "konekweb.php";

if (!$conn) {
    die("Connection failed:". mysqli_connect_error());
} echo "Database Connection is OK <br>";
       
    $dataservo = 3;
    
    $upservo_stmt = $conn->prepare("UPDATE ambdatabase SET `dataservo` = ?  WHERE `id` = 1");
    $upservo_stmt->bind_param("s",$dataservo);


    $upservo_stmt->execute();

    // Check if the update was successful
    if ($upservo_stmt->affected_rows > 0) {
        echo "Update tabel ambdatabase untuk servo successful <br>";
    } else {
        echo "Update updata failed <br>";
    }

    // Close statement
    $upservo_stmt->close();

    // Close connection
    $conn->close();
    
?>