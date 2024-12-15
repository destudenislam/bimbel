<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../galeri/uploads/';
        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $uploadDate = date('Y-m-d H:i:s');
            $query = "INSERT INTO galeri (deskripsi, url_foto, tanggal_upload, admin_id)
                      VALUES ('$description', '$targetFilePath', '$uploadDate', 1)";

            if (mysqli_query($conn, $query)) {
                echo "Image uploaded successfully!";
            } else {
                echo "Database error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
}
?>
