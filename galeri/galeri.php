<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gallery</h1>
    <!-- Add button for "Create" operation -->
    <button class="add-button" onclick="window.location.href='add_image.php'">Add New Image</button>

    <div class="gallery-container">
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Rumah Bimbel Trio</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/berita/berita.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">Berita</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/galeri/galeri.php">
                        <span class="icon">
                            <ion-icon name="image-outline"></ion-icon>
                        </span>
                        <span class="title">Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/DataGuru/data_guru.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/siswa/data_siswa.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/paket/paket.php">
                        <span class="icon">
                            <ion-icon name="pricetag-outline"></ion-icon>
                        </span>
                        <span class="title">Paket</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/bimbel/TingkatPendidikan/tingkat_pendidikan.php">
                        <span class="icon">
                            <ion-icon name="school-outline"></ion-icon>
                        </span>
                        <span class="title">Tingkat Pendidikan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="wallet-outline"></ion-icon>
                        </span>
                        <span class="title">Transaksi</span>
                    </a>
                </li>
            </ul>
        </div>
        <?php
        $query = "SELECT * FROM galeri ORDER BY tanggal_upload DESC";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="gallery-item">';
                echo '<img src="' . htmlspecialchars($row['url_foto']) . '" alt="Image">';
                echo '<p><strong>Description:</strong> ' . htmlspecialchars($row['deskripsi']) . '</p>';
                echo '<p><strong>Upload Date:</strong> ' . $row['tanggal_upload'] . '</p>';
                echo '<div class="crud-buttons">';
                echo '<button onclick="window.location.href=\'edit_image.php?id=' . $row['galeri_id'] . '\'">Edit</button>';
                echo '<button onclick="deleteImage(' . $row['galeri_id'] . ')">Delete</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No images found.</p>';
        }
        ?>
    </div>

    <script>
        function deleteImage(id) {
            if (confirm("Are you sure you want to delete this image?")) {
                window.location.href = 'delete_image.php?id=' + id;
            }
        }
    </script>
</body>
</html>
