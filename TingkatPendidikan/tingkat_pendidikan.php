<?php
include 'koneksi.php';

// Handle Create/Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tingkat_id = isset($_POST['tingkat_id']) ? $_POST['tingkat_id'] : null;
    $nama_tingkat = $_POST['nama_tingkat'];
    $harga = $_POST['harga'];

    if ($tingkat_id) {
        // Update data
        $sql = "UPDATE tingkat_pendidikan SET nama_tingkat='$nama_tingkat', harga=$harga WHERE tingkat_id=$tingkat_id";
    } else {
        // Insert data
        $sql = "INSERT INTO tingkat_pendidikan (nama_tingkat, harga) VALUES ('$nama_tingkat', $harga)";
    }

    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle Delete
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM tingkat_pendidikan WHERE tingkat_id=$delete_id";

    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch Data
$sql = "SELECT * FROM tingkat_pendidikan";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tingkat Pendidikan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
            <header>
                <h1>Tingkat Pendidikan</h1>
            </header>

            <main>
                <!-- Form Tambah/Edit Tingkat -->
                <h2>Form Tingkat Pendidikan</h2>
                <form method="POST" action="">
                    <input type="hidden" name="tingkat_id" id="tingkat_id" />
                    <div class="form-control">
                        <label for="nama_tingkat">Nama Tingkat:</label>
                        <input
                            type="text"
                            name="nama_tingkat"
                            id="nama_tingkat"
                            placeholder="Masukkan Nama Tingkat"
                            required
                        />
                    </div>
                    <div class="form-control">
                        <label for="harga">Harga:</label>
                        <input
                            type="number"
                            name="harga"
                            id="harga"
                            placeholder="Masukkan Harga"
                            required
                        />
                    </div>
                    <button type="submit" id="addButton">Simpan</button>
                </form>

                <!-- Tabel Daftar Tingkat Pendidikan -->
                <h3>Daftar Tingkat Pendidikan</h3>
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Tingkat</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tingkatList">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['tingkat_id'] . "</td>";
                                echo "<td>" . $row['nama_tingkat'] . "</td>";
                                echo "<td>" . $row['harga'] . "</td>";
                                echo "<td>
                                        <button onclick='editTingkat(" . $row['tingkat_id'] . ", \"" . $row['nama_tingkat'] . "\", " . $row['harga'] . ")'>Edit</button>
                                        <a href='?delete_id=" . $row['tingkat_id'] . "' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </main>

            <footer>
                <p>&copy; 2024 CRUD Tingkat Pendidikan. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <script>
        // Fungsi untuk Edit Data
        function editTingkat(id, namaTingkat, harga) {
            document.getElementById("tingkat_id").value = id;
            document.getElementById("nama_tingkat").value = namaTingkat;
            document.getElementById("harga").value = harga;

            document.getElementById("addButton").textContent = "Perbarui";
        }
    </script>

    <!-- General Styles for CRUD Buttons -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
        }

        /* Sidebar styles */
       
        /* Main content */
        .main {
            flex: 1;
            padding: 20px;
        }

        header h1 {
            font-size: 24px;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .form-control label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
        }
    </style>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
