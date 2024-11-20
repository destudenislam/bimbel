<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT url_foto FROM galeri WHERE galeri_id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['url_foto'];

        // Hapus file gambar dari server
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data dari database
        $delete_query = "DELETE FROM galeri WHERE galeri_id = $id";
        if ($conn->query($delete_query)) {
            echo "Image deleted successfully.";
        } else {
            echo "Error deleting image.";
        }
    }
    header("Location: galeri.php");
}
?>
