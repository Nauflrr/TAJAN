<?php

include "konekweb.php";
    $servo_id = $_GET['servo_id'];
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE servo = '$servo_id'");
    $data = mysqli_fetch_array($sql);

    $botsar = $data['botsar'];
    echo $botsar;

//butuh read(kapasitas), read(servo), update(kapasitas, point, servo)
?>
