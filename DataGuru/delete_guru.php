<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengamankan ID dari input
    $sql = "DELETE FROM guru WHERE id_guru = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data guru berhasil dihapus!'); window.location.href='data_guru.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='data_guru.php';</script>";
}

mysqli_close($conn);
?>
