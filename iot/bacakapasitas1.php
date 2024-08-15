<?php

// $hostname = "localhost";
// $username = "root";
// $password = "";
// $database = "pta";

$conn = mysqli_connect('localhost', 'root', '', 'tajanclo_Db_tajan_google') or die ('Gagal terhubung ke database');
// $conn = mysqli_connect($hostname,$username,$password,$database);

    $sql = mysqli_query($conn, "SELECT * FROM updata");
    $data = mysqli_fetch_array($sql);

    $Kapasitas = $data['Kapasitas'];
    echo $Kapasitas;

//butuh read(kapasitas), read(servo), update(kapasitas, point, servo)
?>
