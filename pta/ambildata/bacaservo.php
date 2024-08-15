<?php

include "konekweb.php";

    $sql = mysqli_query($conn, "SELECT * FROM ambdatabase");
    $data = mysqli_fetch_array($sql);

    $servo = $data['dataservo'];
    echo $servo;

?>
