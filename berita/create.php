<?php
include 'koneksi.php';if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $admin_id = $_POST['admin_id'];

    $sql = "INSERT INTO berita (judul, isi, tanggal, kategori, admin_id) VALUES ('$judul', '$isi', '$tanggal', '$kategori', '$admin_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Berita berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<h2>Tambah Berita</h2>
<form method="POST" action="">
    Judul: <input type="text" name="judul" required><br>
    Isi: <textarea name="isi" required></textarea><br>
    Tanggal: <input type="date" name="tanggal" required><br>
    Kategori: <input type="text" name="kategori" required><br>
    Admin ID: <input type="number" name="admin_id" required><br>
    <button type="submit" name="create">Tambah Berita</button>
</form>
