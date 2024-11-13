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
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori']; 
    $admin_id = $_POST['admin_id'];
    $sql = "INSERT INTO berita (judul, isi, tanggal, kategori, admin_id) VALUES ('$judul', '$isi', '$tanggal', '$kategori', '$admin_id')";
    if (mysqli_query($conn, $sql)) {
        $message = "Berita berhasil ditambahkan.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Fungsi untuk memperbarui data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['berita_id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $admin_id = $_POST['admin_id'];
    $sql = "UPDATE berita SET judul='$judul', isi='$isi', tanggal='$tanggal', kategori='$kategori', admin_id='$admin_id' WHERE berita_id=$id";
    if (mysqli_query($conn, $sql)) {
        $message = "Berita berhasil diperbarui.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Fungsi untuk menghapus data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['berita_id'];
    $sql = "DELETE FROM berita WHERE berita_id=$id";
    if (mysqli_query($conn, $sql)) {
        $message = "Berita berhasil dihapus.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Mengambil data berita untuk ditampilkan
$beritaData = mysqli_query($conn, "SELECT * FROM berita");

// Menangani permintaan untuk mengedit (menampilkan data di form)
if (isset($_GET['edit'])) {
    $editMode = true;
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM berita WHERE berita_id=$id");
    if ($result && mysqli_num_rows($result) > 0) {
        $editData = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Berita</title>
    <script>
        function hideMessage() {
            setTimeout(function() {
                document.getElementById('message').style.display = 'none';
            }, 3000); // Sembunyikan pesan setelah 3 detik
        }
    </script>
</head>
<body onload="hideMessage()">

<!-- Menampilkan pesan sukses atau error -->
<?php if ($message): ?>
    <div id="message"><?= $message ?></div>
<?php endif; ?>

<h2><?= $editMode ? "Edit Berita" : "Tambah Berita" ?></h2>
<form method="POST" action="">
    <?php if ($editMode): ?>
        <input type="hidden" name="berita_id" value="<?= $editData['berita_id'] ?>">
    <?php endif; ?>
    Judul: <input type="text" name="judul" value="<?= $editMode ? $editData['judul'] : '' ?>" required><br>
    Isi: <textarea name="isi" required><?= $editMode ? $editData['isi'] : '' ?></textarea><br>
    Tanggal: <input type="date" name="tanggal" value="<?= $editMode ? $editData['tanggal'] : '' ?>" required><br>
    Kategori: <input type="text" name="kategori" value="<?= $editMode ? $editData['kategori'] : '' ?>" required><br>
    Admin ID: <input type="number" name="admin_id" value="<?= $editMode ? $editData['admin_id'] : '' ?>" required><br>
    <button type="submit" name="<?= $editMode ? 'update' : 'create' ?>">
        <?= $editMode ? "Update Berita" : "Tambah Berita" ?>
    </button>
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
            <td><?= $row['berita_id'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['isi'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['kategori'] ?></td>
            <td><?= $row['admin_id'] ?></td>
            <td>
                <a href="?edit=<?= $row['berita_id'] ?>">Edit</a>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="berita_id" value="<?= $row['berita_id'] ?>">
                    <button type="submit" name="delete" onclick="return confirm('Yakin ingin menghapus berita ini?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php
// Tutup koneksi database
mysqli_close($conn);
?>
