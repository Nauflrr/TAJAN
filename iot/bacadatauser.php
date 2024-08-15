<?php                       //session start untuk memulai
    include 'db_config.php';

    // bahwa user dalam sesi diverfirikasi dari oauth id google.
    //$g_name = $_SESSION['uname'];
    $g_id = $_SESSION['userid'];

            //==== poin pengguna
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `oauth_id` = '$g_id'");
    $data = mysqli_fetch_array($sql);
    $point = $data['point'];
    //echo $point;

                //====botol kecil
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `oauth_id` = '$g_id'");
    $data = mysqli_fetch_array($sql);
    $botcil = $data['botcil'];
    //echo $botcil;

                //====botol besar
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `oauth_id` = '$g_id'");
    $data = mysqli_fetch_array($sql);
    $botsar = $data['botsar'];
    //echo $botsar;

                //====lastlogin
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `oauth_id` = '$g_id'");
    $data = mysqli_fetch_array($sql);
    $last_login = $data['last_login'];
    //echo $last_login;
    
                    //====servo
                    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `oauth_id` = '$g_id'");
                    $data = mysqli_fetch_array($sql);
                    $servo = $data['servo'];
                    //echo $servo;    

//butuh read(kapasitas), read(servo), update(kapasitas, point, servo)
?>