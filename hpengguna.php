<?php
    session_start();                        //session start untuk memulai
    if(!isset($_SESSION['logged_in'])){
    header('location: loginpengguna.php');
    }
    
    require_once 'iot/bacadatauser.php';
    // Tentukan path ke file yang ingin Anda baca
    $folder_path = "iot/bacadatauser.php";
    // Periksa apakah file ada sebelum membaca isinya
    if (file_exists($folder_path) && !is_dir($folder_path)) {
    // Baca isi file dan tampilkan
    $file_content = file_get_contents($folder_path);
    }


// Ambil variabel dari request GET atau POST
if (isset($_GET["kode"])) {
    $kode = $_GET["kode"];
    
    // Periksa apakah kode ada dalam database pada tabel lokasi
    $sql_check_kode = "SELECT * FROM lokasi WHERE kode = '$kode'";
    $result_check_kode = $conn->query($sql_check_kode);
    
    if ($result_check_kode->num_rows > 0) {
        // Jika kode ada, ambil data lokasi
        $row = $result_check_kode->fetch_assoc();
        $nama_lokasi = $row["nama_lokasi"];
        $id = $row["id"];
        
        // Periksa apakah nilai servo yang akan diupdate sudah ada atau tidak
        $sql_check_servo = "SELECT servo FROM users WHERE servo = '$id' AND oauth_id <> '$g_id'";
        $result_check_servo = $conn->query($sql_check_servo);
        
        if ($result_check_servo->num_rows > 0) {
            // Servo sudah digunakan oleh pengguna lain, kirimkan respons JSON
            $response = array(
                'success' => false,
                'message' => 'Permintaan di Tolak: silahkan kembali ke halaman sebelumnya'
            );
        } else {
            // Update nilai servo menjadi 1 pada tabel lokasi
            $sql_update_lokasi = "UPDATE lokasi SET servo = '$id' WHERE kode = '$kode'";
            if ($conn->query($sql_update_lokasi) === TRUE) {
                // Update berhasil pada tabel lokasi
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error updating lokasi: ' . $conn->error
                );
            }
            
            // Update nilai servo menjadi sesuai lokasi id pada tabel users
            $sql_update_users = "UPDATE users SET servo = '$id' WHERE oauth_id = '$g_id'";
            if ($conn->query($sql_update_users) === TRUE) {
                // Update berhasil pada tabel users
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error updating users: ' . $conn->error
                );
            }
            
            // Update nilai servo menjadi sesuai lokasi id pada tabel updata
            $sql_update_updata = "UPDATE updata SET servo = '$id' WHERE KODE = '$kode'";
            if ($conn->query($sql_update_updata) === TRUE) {
                // Update berhasil pada tabel updata
                $response = array(
                    'success' => true,
                    'message' => 'Permintaan berhasil diterima.'
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error updating updata: ' . $conn->error
                );
            }
        }
    } else {
        // Kode tidak ditemukan atau permintaan ditolak
        $response = array(
            'success' => false,
            'message' => 'Kode Salah.'
        );
    }
} else {
    // Kode tidak ditemukan atau permintaan ditolak
    $response = array(
        'success' => false,
        'message' => 'Kode tidak ditemukan.'
    );
}

// Mengirimkan respons JSON ke klien
//header('Content-Type: application/json');
//echo json_encode($response);
//exit; // Pastikan keluar setelah mengirim respons JSON
//exit; // Pastikan keluar setelah mengirim respons JSON






// Mulai timer 15 detik untuk logout
echo '<script>';
echo 'setTimeout(function() {';
echo '  window.location.href = "logout.php";'; // Ubah ke halaman logout Anda
echo '}, 3600000);'; //timer 3600000 ms = 1 jam, 15000 milidetik = 15 detik
echo '</script>';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hpengguna - TAJAN</title>
    <meta property="og:title" content="Hpengguna - TAJAN" />
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
      
     /* CSS untuk tampilan popup */
        .popup {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            background-color: green; /* Warna untuk notifikasi berhasil */
            display: none; /* Mulai tersembunyi */
            z-index: 9999;
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
      <link href="./hpengguna.css" rel="stylesheet" />

      <div class="hpengguna-container">
        <div class="hpengguna-header">
          <header
            data-thq="thq-navbar"
            class="hpengguna-navbar-interactive navbarContainer"
          >
            <span class="hpengguna-logo">TA JAN</span>
            <div data-thq="thq-navbar-nav" class="hpengguna-desktop-menu">
              <nav class="hpengguna-menu-navbar"></nav>
              <div class="hpengguna-buttons">
                <div class="hpengguna-container1">
                  <a
                    href="index.html"
                    class="hpengguna-home buttonSubmit Header"
                  >
                    Home
                  </a>
                </div>
              </div>
            </div>
            <a href="index.html" class="hpengguna-logout buttonSubmit Header">
              Home
            </a>
            <a href="javascript:redirectSequentially();" class="hpengguna-logout buttonSubmit Header">
              Logout
            </a>

          </header>
        </div>
        <div class="hpengguna-halaman-poin H_PoinContainer">
          <div class="hpengguna-container-welcome">
            <span class="hpengguna-text03">
              <span class="hpengguna-text04">---</span>
              <br class="hpengguna-text05 overline" />
            </span>
            <h2 class="hpengguna-teks-selamat-datang heading2">
              Selamat Datang, <?= $_SESSION['uname'] ?>
            </h2>
            <a href="hkonfirmasimesin.php" class="hpengguna-nav11 bodySmall">
              masukkan Botol Sekarang
            </a>
            <span class="hpengguna-deskripsi">Lokasi : <?= !empty($row['nama_lokasi']) ? $row['nama_lokasi'] : '-'; ?> </span>
          </div>
          <div class="hpengguna-container-bagan">
            <div class="hpengguna-bagan-total-poin Poin">
              <div class="hpengguna-container-judul-poin">
                <span class="hpengguna-judul-total-poin heading3">
                  TOTAL Poin
                </span>
                <span class="hpengguna-deskripsi1 bodySmall">
                  total poin yang telah anda kumpulkan:
                </span>
              </div>
              <div class="hpengguna-container-poin">
                <span class="hpengguna-total-poin">
                  <span class="hpengguna-text06"><?php echo $point;?></span>
                  <br />
                </span>
                <span class="hpengguna-teks-poin">Poin</span>
              </div>
              <a href="selesai.php?kode=<?php echo urlencode($kode); ?>" class="hpengguna-nav11 bodySmall">
              Selesai Mencacah
            </a>
            </div>
            <div class="hpengguna-bagan-botol BotolBotol">
              <div class="hpengguna-container-judul-botol">
                <span class="hpengguna-judul-botol-600 heading3">
                  Jumlah Botol terkumpul&nbsp;
                </span>
                <span class="bodySmall hpengguna-deskripsi2">
                  Ukuran 600ml :
                </span>
              </div>
              <div class="hpengguna-container-jml-botol-600">
                <span class="hpengguna-angka-botol-600"><?php echo $botsar;?></span>
                <span class="hpengguna-teks-botol">Botol</span>
              </div>
              <div class="hpengguna-container-judul-330">
                <span class="bodySmall hpengguna-deskripsi3">
                  Ukuran 330ml :
                </span>
              </div>
              <div class="hpengguna-container-jml-botol-330">
                <span class="hpengguna-angka-botol-6001"><?php echo $botcil;?></span>
                <span class="hpengguna-teks-botol1">Botol</span>
              </div>
            </div>
            <div class="hpengguna-bagan-330 RiwayatPengumpulan">
              <div class="hpengguna-container-judul-3301">
                <span class="hpengguna-judul-330 heading3">
                  <span>Riwayat pengumpulan</span>
                  <br />
                </span>
              </div>
              <span class="hpengguna-judul-riwayat-pengumpulan-botol bodySmall">
                Riwayat Pengumpulan :
              </span>
              <section class="hpengguna-container2">
              <div class="hpengguna-container4">
                  <span class="hpengguna-free-plan-features1">
<?php
// Memeriksa apakah pengguna sudah login dan nama pengguna disimpan dalam sesi
if (!isset($_SESSION['uname'])) {
    die("Anda harus login terlebih dahulu.");
}

// Mendapatkan nama pengguna dari sesi
$nama_pengguna = $_SESSION['uname'];

// Menghubungkan ke database
// Asumsikan Anda sudah memiliki koneksi ke database di $conn

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil 5 riwayat terakhir berdasarkan nama pengguna
$sql = "SELECT Nama, Lokasi, Botol, Status, Date FROM Riwayat WHERE Nama = ? ORDER BY Date DESC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nama_pengguna);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data setiap baris
    while ($row = $result->fetch_assoc()) {
        echo "<div style='margin-bottom: 15px; padding: 8px; border: 0px solid #ccc;'>
                <p><strong>Nama:</strong> " . htmlspecialchars($row["Nama"]) . "</p>
                <p><strong>Lokasi:</strong> " . htmlspecialchars($row["Lokasi"]) . "</p>
                <p><strong>Botol:</strong> " . htmlspecialchars($row["Botol"]) . "</p>
                <p><strong>Status:</strong> " . htmlspecialchars($row["Status"]) . "</p>
                <p><strong>Date:</strong> " . htmlspecialchars($row["Date"]) . "</p>
              </div>";
    }
} else { echo"Data Tidak Ada";
}

?>
                  </span>
              </div>
<!--               </section>
                <div class="hpengguna-container4">
                  <span class="hpengguna-free-plan-features1">

                  </span>
                </div>
                <div class="hpengguna-container5">
                  <span class="hpengguna-free-plan-features2">

                  </span>
                </div>
              </section>-->
            </div>
          </div>
        </div>

        <div class="popup" id="popup"></div>

        <div class="hpengguna-footer">
          <footer class="hpengguna-footer1 footerContainer">
            <div class="hpengguna-container6">
              <a href="#home" class="hpengguna-logo2">TA JAN</a>
            </div>
            <div class="hpengguna-separator"></div>
            <div class="hpengguna-container7">
              <span class="bodySmall hpengguna-text10">
                ©2024 TA JAN, mESIN PENCACAH PLASTIK OTOMATIS UNTUK BANK SAMPAH.
              </span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    
    <script>
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"

      setTimeout(function() {
            window.location.href = "selesai.php?kode=<?php echo urlencode($kode); ?>";
        }, 3600000); //1 jam=3600000, 10000 milliseconds = 10 seconds

        document.getElementById("formSelesai").addEventListener("submit", function(event) {
            event.preventDefault();
            window.location.href = "selesai.php?kode=<?php echo urlencode($kode); ?>";
        });
        
    </script>
    
<script>
    function redirectSequentially() {
        const kode = "<?php echo isset($kode) ? urlencode($kode) : ''; ?>";
        const url = kode ? `selesai.php?kode=${kode}` : 'selesai.php';

        // Menggunakan Fetch API untuk mengarahkan ke selesai.php dan memeriksa responnya
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Proses data dari selesai.php
                console.log('Response from selesai.php:', data);

                // Setelah selesai, arahkan ke logout.php
                window.location.href = "logout.php";
            })
            .catch(error => {
                console.error('Error:', error);

                // Tetap mengarahkan ke logout.php meskipun terjadi error
                window.location.href = "logout.php";
            });
    }

    // Tambahkan event listener ke tombol
    document.getElementById('redirectButton').addEventListener('click', redirectSequentially);
    </script>


    
<?php if (!empty($row['nama_lokasi'])): ?>
    <script>
        setTimeout(function() {
            window.location.href = "hpengguna.php"; // Ganti dengan URL halaman baru yang ingin Anda tuju
        }, 300000); // 300000 milidetik = 5 menit
    </script>
<?php endif; ?>

 
   <!-- JavaScript untuk menampilkan push popup -->
    <script>
        // Fungsi untuk menampilkan push popup
        function showPushPopup(message, isSuccess) {
            var popup = document.getElementById('popup');
            popup.textContent = message;
            popup.style.backgroundColor = isSuccess ? 'green' : 'red'; // Sesuaikan warna berdasarkan keberhasilan
            popup.style.display = 'block'; // Tampilkan popup

            // Sembunyikan popup setelah beberapa detik (opsional)
            setTimeout(function() {
                popup.style.display = 'none';
            }, 5000); // 3000 milidetik = 3 detik
        }

        // Simulasi respons dari server (untuk pengujian)
        var fakeResponse = <?php
            // Contoh respons JSON dari PHP
            echo json_encode($response);
        ?>;

        // Panggil fungsi showPushPopup untuk menampilkan push popup
        showPushPopup(fakeResponse.message, fakeResponse.success);
    </script>

  </body>
</html>
