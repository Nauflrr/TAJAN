<?php

include "konekweb.php";

if (!$conn) {
    die("Connection failed:". mysqli_connect_error());
} echo "Database Connection is OK <br>";
       
    $Kapasitas = $_GET['Kapasitas']; 
    $point = $_GET['point'];
    $servo = $_GET['servo'];
    $botcil = $_GET['botcil'];
    $botsar = $_GET['botsar'];
    $berhascacah = $_GET['berhascacah'];
    $tanggal = date("Y-m-d H:i:s", strtotime('+6 hours'));
    $KODE = $_GET['KODE'];
    $servo_id = $_GET['servo_id'];
    
    $updata_stmt = $conn->prepare("UPDATE updata SET `Kapasitas` = ?, `point` = ?,`servo` = ?,`botcil` = ?,`botsar` = ?,`berhascacah` = ?,`tanggal` = ?  WHERE KODE = '$KODE'");
    $updata_stmt->bind_param("sssssss", $Kapasitas,$point,$servo,$botcil,$botsar,$berhascacah,$tanggal);

    $users_stmt = $conn->prepare("UPDATE users SET `point` = ?,`servo` = ?,`botcil` = ?,`botsar` = ? WHERE `servo` = '$servo_id'");
    $users_stmt->bind_param("ssss",$point,$servo,$botcil,$botsar);

    $updata_stmt->execute();
    $users_stmt->execute();

    // Check if the update was successful
    if ($updata_stmt->affected_rows > 0) {
        echo "Update tabel updata successful <br>";
    } else {
        echo "Update updata failed <br>";
    }

    if ($users_stmt->affected_rows > 0) {
        echo "Update tabel users successful";
    } else {
        echo "Update user failed";
    }

    // Close statement
    $updata_stmt->close();
    $users_stmt->close();

    // Close connection
    $conn->close();
    
?>