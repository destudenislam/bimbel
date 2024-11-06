<?php
include 'koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    
    $query = $conn->prepare("UPDATE berita SET judul = ?, isi = ?, tanggal = ?, kategori = ? WHERE berita_id = ?");
    $query->execute([$judul, $isi, $tanggal, $kategori, $id]);
    
    header('Location: index.php');
}

$query = $conn->prepare("SELECT * FROM berita WHERE berita_id = ?");
$query->execute([$id]);
$berita = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit News</h1>
        <form action="update.php?id=<?= $id ?>" method="post">
            <label for="judul">Title:</label>
            <input type="text" id="judul" name="judul" value="<?= $berita['judul'] ?>" required><br>
            
            <label for="isi">Content:</label>
            <textarea id="isi" name="isi" required><?= $berita['isi'] ?></textarea><br>

            <label for="tanggal">Date:</label>
            <input type="date" id="tanggal" name="tanggal" value="<?= $berita['tanggal'] ?>" required><br>

            <label for="kategori">Category:</label>
            <input type="text" id="kategori" name="kategori" value="<?= $berita['kategori'] ?>" required><br>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>
