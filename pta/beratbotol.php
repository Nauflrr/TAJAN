<?php

include "konekweb.php";

    $sql = mysqli_query($conn, "SELECT * FROM updata WHERE KODE = 'tult-1'");
    $data = mysqli_fetch_array($sql);

    $berat = $data['berat'];
    echo $berat;

//butuh read(kapasitas), read(servo), update(kapasitas, point, servo)
?>
