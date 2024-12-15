<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM berita WHERE berita_id = $id");
    $data = mysqli_fetch_assoc($result);
}

// Proses Update Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
</head>
<body>
    <h1>Edit Berita</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $data['berita_id'] ?>">
        Judul: <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required><br>
        Isi: <textarea name="isi" required><?= htmlspecialchars($data['isi']) ?></textarea><br>
        Tanggal: <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required><br>
        Kategori: <input type="text" name="kategori" value="<?= htmlspecialchars($data['kategori']) ?>" required><br>
        Admin ID: <input type="number" name="admin_id" value="<?= $data['admin_id'] ?>" required><br>
        <button type="submit">Update Berita</button>
    </form>
</body>
</html>
