<?php
// Koneksi database
include 'koneksi.php';

// Hapus data berdasarkan ID
$id = $_GET['id'];
$sql = "DELETE FROM berita WHERE berita_id = $id";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Berita berhasil dihapus.'); window.location='berita.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
