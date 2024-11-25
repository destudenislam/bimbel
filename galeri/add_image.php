<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deskripsi = $_POST['deskripsi'];
    $tanggal_upload = date('Y-m-d');
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $url_foto = $target_file;

        $stmt = $conn->prepare("INSERT INTO galeri (deskripsi, url_foto, tanggal_upload) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $deskripsi, $url_foto, $tanggal_upload);

        if ($stmt->execute()) {
            echo "Image uploaded successfully.";
            header("Location: galeri.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Image</title>
</head>
<body>
    <h1>Add New Image</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="deskripsi">Description:</label><br>
        <textarea name="deskripsi" id="deskripsi" rows="4" cols="50" required></textarea><br><br>
        <label for="file">Select Image:</label><br>
        <input type="file" name="file" id="file" accept="image/*" required><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
