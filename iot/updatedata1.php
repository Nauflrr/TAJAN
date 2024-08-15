<?php

$conn = mysqli_connect('localhost', 'root', '', 'tajanclo_Db_tajan_google') or die ('Gagal terhubung ke database');
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

    $updata_stmt = $conn->prepare("UPDATE updata SET `Kapasitas` = ?, `point` = ?,`servo` = ?,`botcil` = ?,`botsar` = ?,`berhascacah` = ?,`tanggal` = ?  WHERE `id` = 1");
    $updata_stmt->bind_param("sssssss", $Kapasitas,$point,$servo,$botcil,$botsar,$berhascacah,$tanggal);

    $users_stmt = $conn->prepare("UPDATE users SET `point` = ?,`botcil` = ?,`botsar` = ? WHERE `servo` = 1");
    $users_stmt->bind_param("sss",$point,$botcil,$botsar);

    $updata_stmt->execute();
    $users_stmt->execute();

    // Check if the update was successful
    if ($updata_stmt->affected_rows > 0) {
        echo "Update tabel updata successful";
    } else {
        echo "Update updata failed";
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