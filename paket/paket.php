<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Bimbel</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your CSS file -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="navigation">
            <ul>
            <li><a href="#"><span class="title">Rumah Bimbel Trio</span></a></li>
            <li><a href="#"><span class="title">Rumah Bimbel Trio</span></a></li>
                <li><a href="http://localhost/bimbel"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Dashboard</span></a></li>
                <li><a href="http://localhost/bimbel/berita/berita.php"><span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span><span class="title">Berita</span></a></li>
                <li><a href="http://localhost/bimbel/galeri/galeri.php"><span class="icon"><ion-icon name="image-outline"></ion-icon></span><span class="title">Galeri</span></a></li>
                <li><a href="http://localhost/bimbel/DataGuru/data_guru.php"><span class="icon"><ion-icon name="people-outline"></ion-icon></span><span class="title">Data Guru</span></a></li>
                <li><a href="http://localhost/bimbel/siswa/data_siswa.php"><span class="icon"><ion-icon name="person-outline"></ion-icon></span><span class="title">Data Siswa</span></a></li>
                <li><a href="http://localhost/bimbel/paket/paket.php"><span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span><span class="title">Paket</span></a></li>
                <li><a href="http://localhost/bimbel/TingkatPendidikan/tingkat_pendidikan.php"><span class="icon"><ion-icon name="school-outline"></ion-icon></span><span class="title">Tingkat Pendidikan</span></a></li>
                <li><a href="http://localhost/bimbel/transaksi/transaksi.php"><span class="icon"><ion-icon name="wallet-outline"></ion-icon></span><span class="title">Transaksi</span></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main">
            <h1>Menu Paket Bimbel</h1>
            
            <!-- Paket SD -->
            <section id="paket-sd">
                <h2>Paket SD (1-6)</h2>
                <ul>
                    <li>Bahasa Indonesia</li>
                    <li>Matematika</li>
                    <li>IPA</li>
                </ul>
                <div class="crud-buttons">
                    <a href="create_sd.php">Tambah Paket SD</a>
                    <a href="read_sd.php">Lihat Paket SD</a>
                    <a href="update_sd.php">Edit Paket SD</a>
                    <a href="delete_sd.php">Hapus Paket SD</a>
                </div>
            </section>
            
            <!-- Paket SMP -->
            <section id="paket-smp">
                <h2>Paket SMP (7-9)</h2>
                <ul>
                    <li>Bahasa Indonesia</li>
                    <li>Matematika</li>
                    <li>IPA</li>
                    <li>Bahasa Inggris</li>
                </ul>
                <div class="crud-buttons">
                    <a href="create_smp.php">Tambah Paket SMP</a>
                    <a href="read_smp.php">Lihat Paket SMP</a>
                    <a href="update_smp.php">Edit Paket SMP</a>
                    <a href="delete_smp.php">Hapus Paket SMP</a>
                </div>
            </section>
            
            <!-- Paket SMA -->
            <section id="paket-sma">
                <h2>Paket SMA</h2>
                <ul>
                    <li>Matematika</li>
                    <li>Fisika</li>
                    <li>Ekonomi</li>
                    <li>Bahasa Inggris</li>
                    <li>Bahasa Indonesia</li>
                </ul>
                <div class="crud-buttons">
                    <a href="create_sma.php">Tambah Paket SMA</a>
                    <a href="read_sma.php">Lihat Paket SMA</a>
                    <a href="update_sma.php">Edit Paket SMA</a>
                    <a href="delete_sma.php">Hapus Paket SMA</a>
                </div>
            </section>
            
            <!-- Paket Umum -->
            <section id="paket-umum">
                <h2>Paket Umum</h2>
                <ul>
                    <li>Ujian Sekolah SD</li>
                    <li>Ujian Sekolah SMP</li>
                    <li>Ujian Akhir SMA</li>
                </ul>
                <div class="crud-buttons">
                    <a href="create_umum.php">Tambah Paket Umum</a>
                    <a href="read_umum.php">Lihat Paket Umum</a>
                    <a href="update_umum.php">Edit Paket Umum</a>
                    <a href="delete_umum.php">Hapus Paket Umum</a>
                </div>
            </section>
        </div>
    </div>

    <!-- General Styles for CRUD Buttons -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            color: #333;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }
        .crud-buttons a {
            margin-right: 10px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .crud-buttons a:hover {
            background-color: #45a049;
        }
        section {
            margin-bottom: 30px;
        }
    </style>
</body>
</html>
