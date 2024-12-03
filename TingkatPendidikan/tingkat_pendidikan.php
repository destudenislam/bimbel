<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Handle Create/Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tingkat_id = isset($_POST['tingkat_id']) ? $_POST['tingkat_id'] : null;
    $nama_tingkat = $_POST['nama_tingkat'];

    if ($tingkat_id) {
        // Update data
        $sql = "UPDATE tingkat_pendidikan SET nama_tingkat='$nama_tingkat' WHERE tingkat_id=$tingkat_id";
    } else {
        // Insert data
        $sql = "INSERT INTO tingkat_pendidikan (nama_tingkat) VALUES ('$nama_tingkat')";
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
    <link rel="stylesheet" href="style.css" />
</head>
<body>
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
            <button type="submit" id="addButton">Simpan</button>
        </form>

        <!-- Tabel Daftar Tingkat Pendidikan -->
        <h3>Daftar Tingkat Pendidikan</h3>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Tingkat</th>
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
                        echo "<td>
                                <button onclick='editTingkat(" . $row['tingkat_id'] . ", \"" . $row['nama_tingkat'] . "\")'>Edit</button>
                                <a href='?delete_id=" . $row['tingkat_id'] . "' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 CRUD Tingkat Pendidikan. All rights reserved.</p>
    </footer>

    <script>
        // Fungsi untuk Edit Data
        function editTingkat(id, namaTingkat) {
            document.getElementById("tingkat_id").value = id;
            document.getElementById("nama_tingkat").value = namaTingkat;

            document.getElementById("addButton").textContent = "Perbarui";
        }
    </script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
