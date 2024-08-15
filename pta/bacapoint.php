<?php

include "konekweb.php";
    $servo_id = $_GET['servo_id'];
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE servo = '$servo_id'");
    $data = mysqli_fetch_array($sql);

    $point = $data['point'];
    echo $point;

//butuh read(kapasitas), read(servo), update(kapasitas, point, servo)
?>
