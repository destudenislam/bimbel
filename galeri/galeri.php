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
