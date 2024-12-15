<?php
include 'koneksi.php';
$sql = "SELECT * FROM siswa"; 
$result = mysqli_query($conn, $sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_siswa = $_POST['siswaName'];
    $tanggal_lahir = $_POST['siswaBirthDate'];
    $alamat = $_POST['siswaAddress'];
    $no_telepon = $_POST['siswaPhone'];
    $asal_sekolah = $_POST['siswaSchool'];
    $tingkat_pendidikan = $_POST['siswaEducation'];
    
    $admin_id = $_POST['adminId']; 
    $id_kelas = $tingkat_pendidikan; 

    $sql = "INSERT INTO siswa (nama_siswa, tanggal_lahir, alamat, no_telepon, asal_sekolah, tingkat_pendidikan_id, admin_id, id_kelas) 
            VALUES ('$nama_siswa', '$tanggal_lahir', '$alamat', '$no_telepon', '$asal_sekolah', '$tingkat_pendidikan', '$admin_id', '$id_kelas')";

    if (mysqli_query($conn, $sql)) {
        header("Location: data_siswa.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
