<?php

    session_start();
    date_default_timezone_set('Asia/Jakarta');

    //mengecek apakah ada yang sudah login atau tidak
    if(isset($_SESSION['logged_in'])){
        header('location: hpengguna.php'); 
    } //jika sudah login maka ke hpengguna.php langsung

    //koneksi ke database
    include 'db_config.php';

    //panggil library
    require_once 'vendor/autoload.php';

    //tampung client id, client secret, redirent uri
    $client_id = '1045835020687-r3lqubhk7nrcvltsuk21ogl4ki4fmrj6.apps.googleusercontent.com';
    $client_secret = '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';
    $redirect_uri = 'https://tajan.cloud/loginpengguna.php';
    
    //inisiasi google client
    $client = new Google_Client();

    //konfigurasi googe client
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);

    $client->addScope('email');
    $client->addScope('profile');

    if(isset($_GET['code'])){

        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        // echo "<pre>";
        // print_r(value: $token);
        // echo "</pre>";

        if(!isset($token['error'])){
            
            $client->setAccessToken(token: $token['access_token']);
        
            //inisiasi googe service oauth2
            $service = new Google_Service_Oauth2($client);
            $profile = $service->userinfo->get();

            // echo "<pre>";
            // print_r($profile);
            // echo "</pre>";

            //tampung data respon dari akun google
            $g_name = $profile['name'];
            $g_email = $profile['email'];
            $g_id = $profile['id'];

            $currtime = date('Y-m-d H:i:s');

            //jika id sudah ada di table user, maka lakukan update data saja
            //jika id belum ada di table user, maka lakukan isert data

            $query_check = 'select * from users where oauth_id = "'.$g_id.'" ';
            $run_query_check = mysqli_query($conn, $query_check);
            $d = mysqli_fetch_object($run_query_check);

            if($d){

                $query_update = 'update users set fullname = "'.$g_name.'", email = "'.$g_email.'", 
                    last_login = "'.$currtime.'" where oauth_id = "'.$g_id.'" ';
                $run_query_update = mysqli_query($conn, $query_update);


            }else{

                $query_insert = 'insert into users (fullname, email, oauth_id, last_login)
                value ("' .$g_name.  '",  "'.$g_email.'", "'.$g_id.'", "'.$currtime.'") ';
                $run_query_insert = mysqli_query($conn, $query_insert);
                
            }

            echo "Login Berhasil";

            //daftarin session
            $_SESSION['logged_in'] = true;
            $_SESSION['access_token'] = $token['access_token'];
            $_SESSION['uname'] = $g_name;
            $_SESSION['userid'] = $g_id;

            header('location: hpengguna.php');

        }else{

            echo "Login Gagal";

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Loginpengguna - TAJAN</title>
    <meta
      property="og:title"
      content="Loginpengguna - TAJAN"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />


    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

        null
      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Taviraj:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
    <style>
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
    </style>
  </head>
  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./loginpengguna.css" rel="stylesheet" />

      <div class="loginpengguna-container">
        <div class="loginpengguna-pricing-card BotolBotol">
          <a href="index.html" class="loginpengguna-navlink button">&lt;-</a>
          <span class="loginpengguna-logo">TA JAN</span>
          <div class="ContKosong"></div>
          <div class="loginpengguna-kotak-daftar-google">
            <span class="loginpengguna-daftar-sekarang">
              Belum punya akun? Daftar sekarang!
            </span>
            <a
              href="<?= $client->createAuthUrl(); ?>"
              class="loginpengguna-tombol-login-google buttonSubmit buttonFilledSecondary"
            >
              Login dengan akun Google
            </a>
          </div>
        </div>
        <div class="loginpengguna-footer">
          <footer class="loginpengguna-footer1 footerContainer">
            <div class="loginpengguna-container2">
              <a href="hpengguna.html" class="loginpengguna-logo1">TA JAN</a>
            </div>
            <div class="loginpengguna-separator"></div>
            <div class="loginpengguna-container3">
              <span class="bodySmall loginpengguna-text">
                ©2024 TA JAN, mESIN PENCACAH PLASTIK OTOMATIS UNTUK BANK SAMPAH.
              </span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
