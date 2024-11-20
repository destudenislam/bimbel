<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Variabel untuk menyimpan pesan dan data berita
$message = "";
$editMode = false;
$editData = null;

// Fungsi untuk menambahkan data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $admin_id = intval($_POST['admin_id']);
    $sql = "INSERT INTO berita (judul, isi, tanggal, kategori, admin_id) VALUES ('$judul', '$isi', '$tanggal', '$kategori', $admin_id)";
    if (mysqli_query($conn, $sql)) {
        $message = "Berita berhasil ditambahkan.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Mengambil data berita
$beritaData = mysqli_query($conn, "SELECT * FROM berita");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Berita - Rumah Bimbel Trio</title>
    <link rel="stylesheet" href="berita/style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Bimbel Trio</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/berita/berita.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">Berita</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/galeri/galeri.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/data_guru/data_guru.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/paket/paket.php">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Paket</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Tingkat Pendidikan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span class="title">Transaksi</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            <h1>Manajemen Berita</h1>
            <!-- Form Tambah/Edit -->
            <form method="POST" action="">
                Judul: <input type="text" name="judul" required><br>
                Isi: <textarea name="isi" required></textarea><br>
                Tanggal: <input type="date" name="tanggal" required><br>
                Kategori: <input type="text" name="kategori" required><br>
                Admin ID: <input type="number" name="admin_id" required><br>
                <button type="submit" name="create">Tambah Berita</button>
            </form>
            <h2>Daftar Berita</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Admin ID</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($beritaData)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['berita_id']) ?></td>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= htmlspecialchars($row['isi']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal']) ?></td>
                    <td><?= htmlspecialchars($row['kategori']) ?></td>
                    <td><?= htmlspecialchars($row['admin_id']) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>
