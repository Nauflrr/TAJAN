<?php

include "konekweb.php";
    $KODE = $_GET['KODE'];
    $sql = mysqli_query($conn, "SELECT * FROM updata WHERE KODE = '$KODE'");
    $data = mysqli_fetch_array($sql);

    $Kapasitas = $data['Kapasitas'];
    echo $Kapasitas;

//butuh read(kapasitas), read(servo), update(kapasitas, point, servo)
?>
