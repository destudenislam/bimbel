<?php 
include 'koneksi.php';

$sql = "SELECT * FROM siswa"; 
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Siswa Bimbel</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
            <h2>Form Pendaftaran Siswa</h2>
            <form id="siswaForm" method="POST" action="process.php">
                <input type="hidden" name="adminId" id="adminId" value="1" />
                <input type="hidden" name="siswaId" id="siswaId" />
                <input type="text" name="siswaName" id="siswaName" placeholder="Nama Siswa" required />
                <input type="date" name="siswaBirthDate" id="siswaBirthDate" required />
                <input type="text" name="siswaAddress" id="siswaAddress" placeholder="Alamat" required />
                <input type="text" name="siswaPhone" id="siswaPhone" placeholder="No Telepon" required />
                <input type="text" name="siswaSchool" id="siswaSchool" placeholder="Asal Sekolah" required />
                <select name="siswaEducation" id="siswaEducation" required>
                    <option value="">Pilih Tingkat Pendidikan</option>
                    <option value="1">SD</option>
                    <option value="2">SMP</option>
                    <option value="3">SMA</option>
                    <option value="4">UMUM</option>
                </select>
                <button type="submit">Simpan Siswa</button>
            </form>

            <h2>Daftar Siswa</h2>
            <table id="siswaTable">
                <thead>
                    <tr>
                        <th>Siswa ID</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Asal Sekolah</th>
                        <th>Tingkat Pendidikan</th>
                        <th>ID Admin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $row['siswa_id']; ?></td>
                            <td><?= $row['nama_siswa']; ?></td>
                            <td><?= $row['tanggal_lahir']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['no_telepon']; ?></td>
                            <td><?= $row['asal_sekolah']; ?></td>
                            <td>
                                <?php 
                                    switch ($row['tingkat_pendidikan_id']) {
                                        case 1: echo "SD"; break;
                                        case 2: echo "SMP"; break;
                                        case 3: echo "SMA"; break;
                                        case 4: echo "UMUM"; break;
                                    }
                                ?>
                            </td>
                            <td><?= $row['admin_id']; ?></td>
                            <td>
                                <a href="update_siswa.php?id=<?= $row['siswa_id']; ?>">Edit</a>
                                <a href="delete_siswa.php?id=<?= $row['siswa_id']; ?>" onclick="return confirm('Hapus siswa ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
