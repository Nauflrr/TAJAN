<?php

include "konekweb.php";
    $KODE = $_GET['KODE'];
    $sql = mysqli_query($conn, "SELECT * FROM updata WHERE KODE = '$KODE'");
    $data = mysqli_fetch_array($sql);

    $servo = $data['servo'];
    echo $servo;

?>
