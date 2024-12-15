<?php
// Koneksi ke database

$host = "http://bimtrio.mif.myhost.id";
$username = "mifmyho2_bimtrio";
$password = "@Mif2024";
$dbname = "mifmyho2_bimtrio";

// Establishing the connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Checking the connection
if ($conn) {
    // Redirecting to index.php if the connection is successful
    header("Location: http://bimtrio.mif.myhost.id/bimbel/landingpage/landingpage.php");
    exit();  // It's important to call exit() after header() to stop further script execution
} else {
    // Display error message if connection fails
    die("Koneksi gagal: " . mysqli_connect_error());
}



// Konstanta untuk direktori upload
define('UPLOAD_DIR', __DIR__ . '/uploads/');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_siswa = trim($_POST['nama']);
    $tanggal_lahir = trim($_POST['tgl_lahir']);
    $alamat = trim($_POST['alamat']);
    $no_telepon = trim($_POST['no_tlp']);
    $asal_sekolah = trim($_POST['asal_sekolah']);

    // Validasi input
    if (empty($nama_siswa) || empty($tanggal_lahir) || empty($alamat) || empty($no_telepon) || empty($asal_sekolah)) {
        die("Semua field harus diisi!");
    }
    if (!preg_match("/^[0-9]{10,15}$/", $no_telepon)) {
        die("Nomor telepon tidak valid!");
    }

    // Proses file upload
    $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];
    $max_size = 5 * 1024 * 1024; // 5MB

    $file_name = basename($_FILES['buktiPembayaran']['name']);
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_path = UPLOAD_DIR . $file_name;

    if (!in_array($file_extension, $allowed_types)) {
        die("Format file tidak didukung! Hanya jpg, jpeg, png, dan pdf yang diperbolehkan.");
    }
    if ($_FILES['buktiPembayaran']['size'] > $max_size) {
        die("Ukuran file terlalu besar! Maksimum 5MB.");
    }

    if (move_uploaded_file($_FILES['buktiPembayaran']['tmp_name'], $file_path)) {
        // Simpan data ke database menggunakan prepared statement
        $stmt = $conn->prepare("INSERT INTO submissions (nama, tgl_lahir, alamat, no_tlp, asal_sekolah, bukti_pembayaran) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nama_siswa, $tanggal_lahir, $alamat, $no_telepon, $asal_sekolah, $file_path);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil disimpan!'); window.location.href='form.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        die("Gagal mengupload file. Pastikan folder 'uploads' memiliki izin tulis.");
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Isi Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #e6e6e6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        .container h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .file-input {
            display: flex;
            align-items: center;
            background-color: #d9d9d9;
            padding: 10px;
            border-radius: 10px;
            justify-content: space-between;
        }
        .file-input label {
            margin: 0;
        }
        .file-label {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            margin-top: 8px;
        }
        .file-label:hover {
            background-color: #3399ff;
        }
        .submit-btn {
            display: flex;
            justify-content: flex-end;
        }
        .submit-btn button {
            background-color: #66b3ff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
        }
        .submit-btn button:hover {
            background-color: #3399ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Isi Form</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
            </div>
            <div class="form-group">
                <label for="no_tlp">No Telepon</label>
                <input type="text" name="no_tlp" id="no_tlp" placeholder="No Telepon" required>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" required>
            </div>
            <div class="file-input">
                <label for="buktiPembayaran">Bukti Pembayaran</label>
                <input type="file" id="buktiPembayaran" name="buktiPembayaran" accept=".jpg,.jpeg,.png,.pdf" hidden>
                <span class="file-label" onclick="document.getElementById('buktiPembayaran').click()">Pilih file</span>
            </div>
            <br>
            <div class="submit-btn">
                <button type="submit">Selesai</button>
            </div>
        </form>
    </div>
</body>
</html>
