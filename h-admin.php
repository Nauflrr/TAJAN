<?php
session_start();

// Periksa apakah pengguna sudah login
if(!isset($_SESSION['username'])){
    header("location: loginadmin.html"); // Arahkan ke halaman login jika belum login
}

include 'db_config.php';
//include 'loginadmin.php';

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HAdmin - TAJAN</title>
    <meta property="og:title" content="HAdmin - TAJAN" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
  </head>
  <body>
    <link rel="stylesheet" href="style.css" />
    <div>
      <link href="h-admin.css" rel="stylesheet" />

      <div class="h-admin-container">
        <div class="h-admin-header">
          <header
            data-thq="thq-navbar"
            class="h-admin-navbar-interactive navbarContainer"
          >
            <span class="h-admin-logo">TA JAN</span>
            <div data-thq="thq-navbar-nav" class="h-admin-desktop-menu">
              <nav class="h-admin-menu-navbar"></nav>
              <div class="h-admin-buttons">
                <div class="h-admin-container1">
                  <a href="index.html" class="h-admin-home Header buttonSubmit">
                    Home
                  </a>
                </div>
              </div>
            </div>
            <a href="index.html" class="h-admin-logout buttonSubmit Header">
              Logout
            </a>
            <div data-thq="thq-burger-menu" class="h-admin-burger-menu">
              <svg viewBox="0 0 1024 1024" class="h-admin-icon socialIcons">
                <path
                  d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
                ></path>
              </svg>
            </div>
            <div
              data-thq="thq-mobile-menu"
              class="h-admin-mobile-menu1 mobileMenu"
            >
              <div class="h-admin-nav">
                <div class="h-admin-top">
                  <span class="h-admin-logo1">TA JAN</span>
                  <div data-thq="thq-close-menu" class="h-admin-close-menu">
                    <svg
                      viewBox="0 0 1024 1024"
                      class="h-admin-icon2 socialIcons"
                    >
                      <path
                        d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <nav class="h-admin-links">
                  <a
                    href="index.html"
                    class="h-admin-nav1 bodySmall TombolMobile"
                  >
                    Home
                  </a>
                  <a
                    href="hkonfirmasimesin.html"
                    class="h-admin-nav2 bodySmall TombolMobile"
                  >
                    Masukkan Botol
                  </a>
                </nav>
                <div class="h-admin-buttons1">
                  <a
                    href="logout.php"
                    autofocus="true"
                    class="h-admin-keluar-pengguna Header button"
                  >
                    <span>
                      <span>Keluar</span>
                      <br />
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </header>
        </div>
        <div class="h-admin-halaman-kapasitas H_PoinContainer">
          <div class="h-admin-container-welcome">
            <span class="h-admin-strip-teks">
              <span class="h-admin-text03">---</span>
              <br class="h-admin-text04 overline" />
            </span>
            <h2 class="h-admin-teks-selamat-datang heading2">
              Selamat Datang, <?php echo $username; ?>
            </h2>

            <h3>Lokasi Tangki:</h3>
            <select class="h-admin-pilih-lokasi" id="location" onchange="fetchTankData()"></select>
            <span class="h-admin-strip-teks1">--</span>
          </div>
          <div class="h-admin-container-bagan">
            <div class="h-admin-bagan-kapasitas Poin">
              <div class="h-admin-container-judul-kapasitas">
                <span class="h-admin-judul-kapasitas heading3">
                  Kapasitas Tangki :
                </span>
              </div>
              <div class="h-admin-container-kapasitas">
                <span class="h-admin-tandakontainer-kosong">
                  <span>|</span>
                  <br />
                  <span>|</span>
                  <br />
                </span>
              </div>
              <span class="h-admin-jumlah-kapasitas">
                <span>Kapasitas :<span id="capacity"> </span></span>
              </span>
              <span class="h-admin-kondisi-kapasitas">Kondisi : <span id="status"> </span></span>
              <a id="resetButton" onclick="resetTank()" class="h-admin-reset-kapasitas bodySmall">
                Reset Kapasitas
              </a>
            </div>
            <div class="h-admin-bagan-riwayat RiwayatPengumpulan">
              <div class="h-admin-container-judul-riwayat">
                <span class="h-admin-judul-riwayat heading3">
                  <span>Riwayat Status :</span>
                  <br />
                </span>
              </div>
              <section class="h-admin-container-riwayat">
                <div class="h-admin-container2">
                  <span class="h-admin-free-plan-features">
  <ul>
<?php
// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil 5 riwayat terakhir
$sql = "SELECT Nama, Lokasi, Botol, Status, Date FROM Riwayat ORDER BY Date DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<table border='1' style='margin-bottom: 10px;'>";
        echo "<tr><td>Nama :</td><td>" . $row["Nama"] . "</td></tr>";
        echo "<tr><td>Lokasi :</td><td>" . $row["Lokasi"] . "</td></tr>";
        echo "<tr><td>Botol :</td><td>" . $row["Botol"] . "</td></tr>";
        echo "<tr><td>Status :</td><td>" . $row["Status"] . "</td></tr>";
        echo "<tr><td>Date :</td><td>" . $row["Date"] . "</td></tr>";
        echo "</table>";
    }
} else {
    echo "0 hasil";
}

?>
  </ul>
                  </span>
                </div>
              </section>
            </div>
          </div>
        </div>
        <div class="h-admin-footer">
          <footer class="h-admin-footer1 footerContainer">
            <div class="h-admin-container5">
              <a href="#home" class="h-admin-logo2">TA JAN</a>
            </div>
            <div class="h-admin-separator"></div>
            <div class="h-admin-container6">
              <span class="bodySmall h-admin-text13">
                ©2024 TA JAN, MESIN PENCACAH PLASTIK OTOMATIS UNTUK BANK SAMPAH.
              </span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
      function fetchTankData() {
        console.log(document.getElementById('location'));
        document.getElementById('Kapasitas').innerHTML = '50%';
        document.getElementById('status').innerHTML = 'Half Full';
      }
    ></script>
    <script 
    src="scriptlokasi.js">
    </script>
  </body>
</html>
