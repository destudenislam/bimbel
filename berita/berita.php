<?php
// Koneksi database
include 'koneksi.php';

// Variabel untuk menyimpan pesan dan data berita
$message = "";
$editMode = false;
$editData = null;

// Jika ada parameter 'edit', ambil data berita yang akan diedit
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $editMode = true;
    $id = intval($_GET['edit']);
    $result = mysqli_query($conn, "SELECT * FROM berita WHERE berita_id = $id");
    $editData = mysqli_fetch_assoc($result);
}

// Fungsi untuk menambahkan data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $admin_id = intval($_POST['admin_id']);
    $sql = "INSERT INTO berita (judul, isi, tanggal, kategori, admin_id) VALUES ('$judul', '$isi', '$tanggal', '$kategori', $admin_id)";
    if (mysqli_query($conn, $sql)) {
        header("Location: berita.php?message=added");
        exit();
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Fungsi untuk mengupdate data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $admin_id = intval($_POST['admin_id']);
    $sql = "UPDATE berita SET judul='$judul', isi='$isi', tanggal='$tanggal', kategori='$kategori', admin_id=$admin_id WHERE berita_id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: berita.php?message=updated");
        exit();
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
            <li><a href="#"><span class="title">Rumah Bimbel Trio</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Dashboard</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/berita/berita.php"><span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span><span class="title">Berita</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/galeri/galeri.php"><span class="icon"><ion-icon name="image-outline"></ion-icon></span><span class="title">Galeri</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/DataGuru/data_guru.php"><span class="icon"><ion-icon name="people-outline"></ion-icon></span><span class="title">Data Guru</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/siswa/data_siswa.php"><span class="icon"><ion-icon name="person-outline"></ion-icon></span><span class="title">Data Siswa</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/paket/paket.php"><span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span><span class="title">Paket</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/TingkatPendidikan/tingkat_pendidikan.php"><span class="icon"><ion-icon name="school-outline"></ion-icon></span><span class="title">Tingkat Pendidikan</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/transaksi/transaksi.php"><span class="icon"><ion-icon name="wallet-outline"></ion-icon></span><span class="title">Transaksi</span></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main">
        
            <h1>Manajemen Berita</h1>

            <!-- Form Tambah/Edit -->
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $editMode ? htmlspecialchars($editData['berita_id']) : '' ?>">
                Judul: <input type="text" name="judul" value="<?= $editMode ? htmlspecialchars($editData['judul']) : '' ?>" required><br>
                Isi: <textarea name="isi" required><?= $editMode ? htmlspecialchars($editData['isi']) : '' ?></textarea><br>
                Tanggal: <input type="date" name="tanggal" value="<?= $editMode ? htmlspecialchars($editData['tanggal']) : '' ?>" required><br>
                Kategori: <input type="text" name="kategori" value="<?= $editMode ? htmlspecialchars($editData['kategori']) : '' ?>" required><br>
                Admin ID: <input type="number" name="admin_id" value="<?= $editMode ? htmlspecialchars($editData['admin_id']) : '' ?>" required><br>

                <?php if ($editMode): ?>
                    <button type="submit" name="update">Update Berita</button>
                <?php else: ?>
                    <button type="submit" name="create">Tambah Berita</button>
                <?php endif; ?>
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
                    <th>Aksi</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($beritaData)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['berita_id']) ?></td>
                        <td><?= htmlspecialchars($row['judul']) ?></td>
                        <td><?= htmlspecialchars($row['isi']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal']) ?></td>
                        <td><?= htmlspecialchars($row['kategori']) ?></td>
                        <td><?= htmlspecialchars($row['admin_id']) ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="berita.php?edit=<?= $row['berita_id'] ?>" class="btn btn-warning">Edit</a>
                            <!-- Tombol Delete -->
                            <a href="delete.php?id=<?= $row['berita_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berita ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>
