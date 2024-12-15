<?php
// Koneksi ke database
include 'koneksi.php';


session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: http://bimtrio.mif.myhost.id/bimbel/index.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Proses logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: http://bimtrio.mif.myhost.id/bimbel/login.php"); // Arahkan kembali ke login setelah logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Bimbel Trio</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="navigation">
        <ul>
        <li>
    <a href="#">
        <span class="title">Rumah Bimbel Trio</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel">
        <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/berita/berita.php">
        <span class="icon">
            <ion-icon name="newspaper-outline"></ion-icon>
        </span>
        <span class="title">Berita</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/galeri/galeri.php">
        <span class="icon">
            <ion-icon name="image-outline"></ion-icon>
        </span>
        <span class="title">Galeri</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/DataGuru/data_guru.php">
        <span class="icon">
            <ion-icon name="people-outline"></ion-icon>
        </span>
        <span class="title">Data Guru</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/siswa/data_siswa.php">
        <span class="icon">
            <ion-icon name="person-outline"></ion-icon>
        </span>
        <span class="title">Data Siswa</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/paket/paket.php">
        <span class="icon">
            <ion-icon name="pricetag-outline"></ion-icon>
        </span>
        <span class="title">Paket</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/TingkatPendidikan/tingkat_pendidikan.php">
        <span class="icon">
            <ion-icon name="school-outline"></ion-icon>
        </span>
        <span class="title">Tingkat Pendidikan</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/transaksi/transaksi.php">
        <span class="icon">
            <ion-icon name="wallet-outline"></ion-icon>
        </span>
        <span class="title">Transaksi</span>
    </a>
</li>
<li>
    <a href="http://bimtrio.mif.myhost.id/bimbel/landingpage/login/login.php">
        <span class="icon">
            <ion-icon name="log-out-outline"></ion-icon>
        </span>
        <span class="title">Logout</span>
    </a>
</li>

        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>
        </div>
        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                </div>
                <br>
                <iframe title="project_smt3" width="1140" height="541.25" src="https://app.powerbi.com/reportEmbed?reportId=3eedd2ee-132e-4b61-844a-81d6421c0590&autoAuth=true&ctid=5263cc81-5912-42c4-abc1-d0f1b668b530" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
