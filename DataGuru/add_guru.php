<?php
include 'koneksi.php';

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_guru = mysqli_real_escape_string($conn, $_POST['guruName']);
    $no_telepon = mysqli_real_escape_string($conn, $_POST['guruPhone']);
    $alamat = mysqli_real_escape_string($conn, $_POST['guruAddress']);
    $id_mapel = intval($_POST['guruSubject']);
    $admin_id = intval($_POST['adminId']);

    // Query untuk menambahkan data ke tabel "guru"
    $sql = "INSERT INTO guru (nama_guru, no_telepon, alamat, id_mapel, admin_id) 
            VALUES ('$nama_guru', '$no_telepon', '$alamat', $id_mapel, $admin_id)";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Guru berhasil ditambahkan!'); window.location.href='data_guru.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Tutup koneksi
mysqli_close($conn);
?>
