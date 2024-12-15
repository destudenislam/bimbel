<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Jika form disubmit
if (isset($_POST['update'])) {
    $id = intval($_POST['guru_id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama_guru']);
    $telepon = mysqli_real_escape_string($conn, $_POST['no_telepon']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $id_mapel = intval($_POST['id_mapel']);
    $admin_id = intval($_POST['admin_id']);

    $sql = "UPDATE guru SET 
            nama_guru = '$nama', 
            no_telepon = '$telepon', 
            alamat = '$alamat', 
            id_mapel = '$id_mapel', 
            admin_id = '$admin_id' 
            WHERE guru_id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data guru berhasil diperbarui!'); window.location.href='data_guru.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Ambil data berdasarkan ID untuk diisi ke form
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM guru WHERE id_guru = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='data_guru.php';</script>";
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Data Guru</title>
</head>
<body>
    <h2>Edit Data Guru</h2>
    <form method="POST" action="edit_guru.php">
        <input type="hidden" name="guru_id" value="<?= htmlspecialchars($row['guru_id']) ?>" />
        <input type="text" name="nama_guru" value="<?= htmlspecialchars($row['nama_guru']) ?>" required />
        <input type="text" name="no_telepon" value="<?= htmlspecialchars($row['no_telepon']) ?>" required />
        <input type="text" name="alamat" value="<?= htmlspecialchars($row['alamat']) ?>" required />
        <input type="text" name="id_mapel" value="<?= htmlspecialchars($row['id_mapel']) ?>" required />
        <input type="text" name="admin_id" value="<?= htmlspecialchars($row['admin_id']) ?>" required />
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
