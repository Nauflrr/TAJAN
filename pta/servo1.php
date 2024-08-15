<?php

include "konekweb.php";

if (!$conn) {
    die("Connection failed:". mysqli_connect_error());
} echo "Database Connection is OK <br>";
       
    $KODE = 'tult#1';
    $servo = 1;
    $upservo_stmt = $conn->prepare("UPDATE updata SET `servo` = ?  WHERE KODE = 'tult-1'");
    $upservo_stmt->bind_param("s",$servo);

    $users_stmt = $conn->prepare("UPDATE users SET `servo` = ? WHERE `userid` = 1");
    $users_stmt->bind_param("s",$servo);

    $upservo_stmt->execute();
    $users_stmt->execute();

    // Check if the update was successful
    if ($upservo_stmt->affected_rows > 0) {
        echo "Update tabel updata untuk servo successful <br>";
    } else {
        echo "Update updata failed <br>";
    }

    if ($users_stmt->affected_rows > 0) {
        echo "Update servo users successful";
    } else {
        echo "Update servo user failed";
    }

    // Close statement
    $upservo_stmt->close();
    $users_stmt->close();

    // Close connection
    $conn->close();
    
?>