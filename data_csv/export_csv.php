<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data siswa
$sql = "SELECT * FROM siswa";
$result = mysqli_query($conn, $sql);

// Header untuk file CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_siswa.csv');

// Membuka output stream
$output = fopen('php://output', 'w');

// Menulis header kolom ke file CSV
fputcsv($output, ['Siswa ID', 'Nama Siswa', 'Tanggal Lahir', 'Alamat', 'No Telepon', 'Asal Sekolah', 'Tingkat Pendidikan', 'Admin ID']);

// Menulis data dari tabel siswa ke file CSV
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

// Menutup koneksi dan output
fclose($output);
mysqli_close($conn);
?>
