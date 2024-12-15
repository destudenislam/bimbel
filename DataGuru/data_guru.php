<?php
include 'koneksi.php';
$sql = "SELECT * FROM guru"; 
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Data Guru Bimbel</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="navigation">
            <ul>
            <li><a href="#"><span class="title">Rumah Bimbel Trio</span></a></li>
            <li><a href="http://bimtrio.mif.myhost.id"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Dashboard</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/berita/berita.php"><span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span><span class="title">Berita</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/galeri/galeri.php"><span class="icon"><ion-icon name="image-outline"></ion-icon></span><span class="title">Galeri</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/DataGuru/data_guru.php"><span class="icon"><ion-icon name="people-outline"></ion-icon></span><span class="title">Data Guru</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/siswa/data_siswa.php"><span class="icon"><ion-icon name="person-outline"></ion-icon></span><span class="title">Data Siswa</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/paket/paket.php"><span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span><span class="title">Paket</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/TingkatPendidikan/tingkat_pendidikan.php"><span class="icon"><ion-icon name="school-outline"></ion-icon></span><span class="title">Tingkat Pendidikan</span></a></li>
                <li><a href="http://bimtrio.mif.myhost.id/transaksi/transaksi.php"><span class="icon"><ion-icon name="wallet-outline"></ion-icon></span><span class="title">Transaksi</span></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main">
            <h2>Form Guru</h2>
            <form method="POST" action="add_guru.php">
                <input type="text" name="guruName" placeholder="Nama Guru" required />
                <input type="text" name="guruPhone" placeholder="No Telepon" required />
                <input type="text" name="guruAddress" placeholder="Alamat" required />
                <input type="text" name="guruSubject" placeholder="ID Mapel" required />
                <input type="text" name="adminId" placeholder="Admin ID" required />
                <button type="submit">Tambahkan</button>
            </form>

            <h2>Daftar Guru</h2>
            <table>
                <tr>
                    <th>Nama Guru</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>ID Mapel</th>
                    <th>Admin ID</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama_guru']) ?></td>
                        <td><?= htmlspecialchars($row['no_telepon']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td><?= htmlspecialchars($row['id_mapel']) ?></td>
                        <td><?= htmlspecialchars($row['admin_id']) ?></td>
                        <td>
                            <a href="edit_guru.php?id=<?= $row['id_guru'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_guru.php?id=<?= $row['id_guru'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data guru ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>
