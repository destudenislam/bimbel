<?php
include 'koneksi.php';

// Cek apakah ID siswa diberikan
if (!isset($_GET['id'])) {
    die("ID siswa tidak ditemukan!");
}

$siswa_id = $_GET['id'];

// Ambil data siswa berdasarkan ID untuk mengisi form
$sql = "SELECT * FROM siswa WHERE siswa_id = $siswa_id";
$result = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($result);

if (!$siswa) {
    die("Data siswa tidak ditemukan!");
}

// Update data siswa jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_siswa = $_POST['siswaName'];
    $tanggal_lahir = $_POST['siswaBirthDate'];
    $alamat = $_POST['siswaAddress'];
    $no_telepon = $_POST['siswaPhone'];
    $asal_sekolah = $_POST['siswaSchool'];
    $tingkat_pendidikan = $_POST['siswaEducation'];

    $sql = "UPDATE siswa 
            SET nama_siswa = '$nama_siswa', 
                tanggal_lahir = '$tanggal_lahir', 
                alamat = '$alamat', 
                no_telepon = '$no_telepon', 
                asal_sekolah = '$asal_sekolah', 
                tingkat_pendidikan_id = '$tingkat_pendidikan' 
            WHERE siswa_id = $siswa_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: data_siswa.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <h1>Edit Data Siswa</h1>
    </header>

    <main>
        <form method="POST" action="">
            <input type="hidden" name="siswaId" value="<?= $siswa['siswa_id']; ?>" />
            
            <label for="siswaName">Nama Siswa:</label>
            <input type="text" name="siswaName" id="siswaName" value="<?= $siswa['nama_siswa']; ?>" required />

            <label for="siswaBirthDate">Tanggal Lahir:</label>
            <input type="date" name="siswaBirthDate" id="siswaBirthDate" value="<?= $siswa['tanggal_lahir']; ?>" required />

            <label for="siswaAddress">Alamat:</label>
            <input type="text" name="siswaAddress" id="siswaAddress" value="<?= $siswa['alamat']; ?>" required />

            <label for="siswaPhone">No. Telepon:</label>
            <input type="text" name="siswaPhone" id="siswaPhone" value="<?= $siswa['no_telepon']; ?>" required />

            <label for="siswaSchool">Asal Sekolah:</label>
            <input type="text" name="siswaSchool" id="siswaSchool" value="<?= $siswa['asal_sekolah']; ?>" required />

            <label for="siswaEducation">Tingkat Pendidikan:</label>
            <select name="siswaEducation" id="siswaEducation" required>
                <option value="1" <?= $siswa['tingkat_pendidikan_id'] == 1 ? 'selected' : ''; ?>>SD</option>
                <option value="2" <?= $siswa['tingkat_pendidikan_id'] == 2 ? 'selected' : ''; ?>>SMP</option>
                <option value="3" <?= $siswa['tingkat_pendidikan_id'] == 3 ? 'selected' : ''; ?>>SMA</option>
                <option value="4" <?= $siswa['tingkat_pendidikan_id'] == 4 ? 'selected' : ''; ?>>UMUM</option>
            </select>

            <button type="submit">Simpan Perubahan</button>
        </form>
        <a href="data_siswa.php">Kembali ke Daftar Siswa</a>
    </main>

    <footer>
        <p>&copy; 2024 Bimbel TRIO. All rights reserved.</p>
    </footer>
</body>
</html>
