<?php 
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM siswa"; 
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Siswa Bimbel</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <h1>Data Siswa Bimbingan Belajar</h1>
    </header>

    <main>
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
    </main>

    <footer>
        <p>&copy; 2024 Bimbel TRIO. All rights reserved.</p>
    </footer>
</body>
</html>
