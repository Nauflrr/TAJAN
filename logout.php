<?php
    session_start();

    //panggil library
    require_once 'vendor/autoload.php';

    $access_token = $_SESSION['access_token'];

    // inisisai google client
    $client = new Google_Client();

    $client->revokeToken($access_token);

    session_destroy();
    header('location: index.html');