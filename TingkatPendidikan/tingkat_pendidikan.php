<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT * FROM tingkat_pendidikan"; // Replace 'tingkat_pendidikan' with your actual table name
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
        <h2>Tingkat Pendidikan</h2>

        <!-- Form Tambah/Edit Tingkat -->
        <form id="tingkatForm">
            <input type="hidden" id="tingkat_id" />
            <div class="form-control">
                <label for="nama_tingkat">Nama Tingkat:</label>
                <input
                    type="text"
                    id="nama_tingkat"
                    placeholder="Masukkan Nama Tingkat"
                    required
                />
            </div>
            <button type="submit" id="addButton">Tambah</button>
            <button type="submit" id="updateButton" style="display: none">
                Perbarui
            </button>
        </form>

        <!-- Tabel Daftar Tingkat Pendidikan -->
        <h3>Daftar Tingkat Pendidikan</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Tingkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tingkatList">
                <?php
                // Check if there are results and output them
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['tingkat_id'] . "</td>"; // Use the correct column name
                        echo "<td>" . $row['nama_tingkat'] . "</td>"; // Ensure this column name is correct as well
                        echo "<td>
                                <button onclick='editTingkat(" . $row['tingkat_id'] . ")'>Edit</button>
                                <button onclick='deleteTingkat(" . $row['tingkat_id'] . ")'>Hapus</button>
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
        <p>&copy; 2024 Tingkat Pendidikan. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>