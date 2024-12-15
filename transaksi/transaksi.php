<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT t.transaksi_id, s.nama_siswa, s.no_telepon, t.paket_id, t.bukti_pembayaran, t.tanggal_transaksi, t.status 
        FROM transaksi t
        JOIN siswa s ON t.siswa_id = s.siswa_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="navigation">
            <ul>
                <li><a href="#"><span class="title">Rumah Bimbel Trio</span></a></li>
                <li><a href="http://localhost/bimbel"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Dashboard</span></a></li>
                <li><a href="http://localhost/bimbel/berita/berita.php"><span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span><span class="title">Berita</span></a></li>
                <li><a href="http://localhost/bimbel/galeri/galeri.php"><span class="icon"><ion-icon name="image-outline"></ion-icon></span><span class="title">Galeri</span></a></li>
                <li><a href="http://localhost/bimbel/DataGuru/data_guru.php"><span class="icon"><ion-icon name="people-outline"></ion-icon></span><span class="title">Data Guru</span></a></li>
                <li><a href="http://localhost/bimbel/siswa/data_siswa.php"><span class="icon"><ion-icon name="person-outline"></ion-icon></span><span class="title">Data Siswa</span></a></li>
                <li><a href="http://localhost/bimbel/paket/paket.php"><span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span><span class="title">Paket</span></a></li>
                <li><a href="http://localhost/bimbel/TingkatPendidikan/tingkat_pendidikan.php"><span class="icon"><ion-icon name="school-outline"></ion-icon></span><span class="title">Tingkat Pendidikan</span></a></li>
                <li><a href="http://localhost/bimbel/transaksi/transaksi.php"><span class="icon"><ion-icon name="wallet-outline"></ion-icon></span><span class="title">Transaksi</span></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main">
            <h2>Riwayat Transaksi</h2>
            <table>
                <tr>
                    <th>Nama Siswa</th>
                    <th>No Telepon</th>
                    <th>ID Paket</th>
                    <th>Bukti Pembayaran</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama_siswa']) ?></td>
                        <td><?= htmlspecialchars($row['no_telepon']) ?></td>
                        <td><?= htmlspecialchars($row['paket_id']) ?></td>
                        <td>
                            <a href="<?= htmlspecialchars($row['bukti_pembayaran']) ?>" target="_blank">Lihat Bukti</a>
                        </td>
                        <td><?= htmlspecialchars($row['tanggal_transaksi']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                        <td>
                            <a href="edit_transaksi.php?id=<?= $row['transaksi_id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_transaksi.php?id=<?= $row['transaksi_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
