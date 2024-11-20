<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "bimbel");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data berdasarkan `galeri_id` dari URL
$galeri_id = $_GET['id'];
$sql = "SELECT * FROM galeri WHERE galeri_id = $galeri_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi'];
    $old_file = $row['url_foto']; // Gambar lama
    $upload_dir = 'uploads/';
    $new_file = $old_file;

    // Jika ada file baru diunggah
    if (!empty($_FILES['file']['name'])) {
        $new_file = $upload_dir . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $new_file)) {
            // Hapus file lama jika file baru berhasil diupload
            if (file_exists($old_file)) {
                unlink($old_file);
            }
        } else {
            echo "Gagal mengunggah file baru.";
        }
    }

    // Update data di database
    $update_sql = "UPDATE galeri SET deskripsi='$deskripsi', url_foto='$new_file' WHERE galeri_id=$galeri_id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Data berhasil diperbarui!";
        header("Location: galeri.php"); // Redirect ke halaman galeri
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Gambar</title>
</head>
<body>
    <h1>Edit Gambar</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" required>
        </div>
        <div>
            <label for="file">Gambar Baru (Opsional):</label>
            <input type="file" id="file" name="file">
        </div>
        <div>
            <img src="<?php echo $row['url_foto']; ?>" alt="Gambar Saat Ini" style="width: 150px; height: 150px; object-fit: cover;">
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="galeri.php">Kembali</a>
</body>
</html>
