<!DOCTYPE html>
<html lang="en">
<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <title>Gallery</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<div class="container">
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
    <div class="gallery-container">
        <h1>Gallery</h1>
        <button class="add-button" onclick="toggleUploadForm()">Add New Image</button>

        <!-- Form untuk upload gambar -->
        <div id="uploadForm" style="display: none; margin-top: 20px;">
            <input type="file" id="imageFile" accept="image/*" required>
            <input type="text" id="imageDescription" placeholder="Enter description" required>
            <button onclick="uploadImage()">Upload</button>
        </div>

        <!-- Gallery dinamis dari database -->
        <div class="gallery-grid">
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
            echo '<button class="edit-btn" onclick="window.location.href=\'edit_image.php?id=' . $row['galeri_id'] . '\'">Edit</button>';
            echo '<button class="delete-btn" onclick="deleteImage(' . $row['galeri_id'] . ')">Delete</button>';
            echo '</div>';
            echo '</div>';
                }
            } else {
                echo '<p>No images found.</p>';
            }
            ?>
        </div>
    </div>

    <script>
        // Menampilkan/menghilangkan form upload
        function toggleUploadForm() {
            const form = document.getElementById('uploadForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        // Mengunggah gambar menggunakan AJAX
        function uploadImage() {
            const fileInput = document.getElementById('imageFile');
            const descriptionInput = document.getElementById('imageDescription');

            if (fileInput.files.length === 0 || descriptionInput.value.trim() === '') {
                alert('Please provide an image and a description.');
                return;
            }

            const formData = new FormData();
            formData.append('image', fileInput.files[0]);
            formData.append('description', descriptionInput.value);

            fetch('add_image.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload(); // Reload halaman untuk melihat gambar baru
            })
            .catch(error => console.error('Error:', error));
        }

        // Menghapus gambar
        function deleteImage(id) {
            if (confirm("Are you sure you want to delete this image?")) {
                window.location.href = 'delete_image.php?id=' + id;
            }
        }
    </script>
</div>
</body>
</html>
