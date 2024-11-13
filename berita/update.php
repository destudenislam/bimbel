<?php
// Tambahkan koneksi database
$conn = mysqli_connect("localhost", "root", "", "bimbel");

// Inisialisasi variabel untuk pesan notifikasi
$update_message = "";

// Logika untuk memperbarui data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['berita_id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $admin_id = $_POST['admin_id'];

    $sql = "UPDATE berita SET judul='$judul', isi='$isi', tanggal='$tanggal', kategori='$kategori', admin_id='$admin_id' WHERE berita_id=$id";
    if (mysqli_query($conn, $sql)) {
        $update_message = "Berita berhasil diperbarui.";
    } else {
        $update_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Berita</title>
    <script>
        // Fungsi JavaScript untuk menghilangkan pesan setelah beberapa detik
        function hideMessage() {
            setTimeout(function() {
                document.getElementById('update-message').style.display = 'none';
            }, 3000); // 3000 ms = 3 detik
        }
    </script>
</head>
<body onload="hideMessage()">

<?php if ($update_message): ?>
    <div id="update-message"><?= $update_message ?></div>
<?php endif; ?>

<h2>Update Berita</h2>
<form method="POST" action="">
    Judul: <input type="text" name="judul" required><br>
    Isi: <textarea name="isi" required></textarea><br>
    Tanggal: <input type="date" name="tanggal" required><br>
    Kategori: <input type="text" name="kategori" required><br>
    Admin ID: <input type="number" name="admin_id" required><br>
    <button type="submit" name="update">Update Berita</button>
</form>

</body>
</html>
