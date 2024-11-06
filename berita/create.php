<?php
// ... (include koneksi.php)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses data dari form
    $judul = $_POST['judul'];
    // ... (proses data lainnya)

    $sql = "INSERT INTO berita (judul, isi, tanggal, kategori) VALUES ('$judul', '$isi', '$tanggal', '$kategori')";
    if ($conn->query($sql) === TRUE) {
        echo "Berita baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>