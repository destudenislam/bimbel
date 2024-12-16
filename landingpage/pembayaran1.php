<html>
    <?php include "koneksi.php";
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];
        $asal_sekolah = $_POST['asal_sekolah'];
    
        // Proses file upload
        $upload_dir = "uploads/";
        $file_name = basename($_FILES['buktiPembayaran']['name']);
        $file_path = $upload_dir . $file_name;
    
        if (move_uploaded_file($_FILES['buktiPembayaran']['tmp_name'], $file_path)) {
            // Query untuk menyimpan data
            $sql = "INSERT INTO submissions (nama, tgl_lahir, alamat, no_tlp, asal_sekolah, bukti_pembayaran) 
                    VALUES ('$nama', '$tgl_lahir', '$alamat', '$no_tlp', '$asal_sekolah', '$file_path')";
    
            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil disimpan!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Gagal mengupload file.";
        }
    }
    
    $conn->close();
    ?>
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
            width: 500px; /* Increased width for desktop view */
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
        .file-input .file-label {
            background-color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            
        }
        .file-label {
        display: inline-block;
        padding: 8px 12px;
        background-color: #007bff;
        /* color: #fff; */
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        margin-top: 8px;
        background-color: #0056b3;
         
        }
        .file-label:hover {
        background-color: #3399ff ;
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
        <form action="submit_form.php" method="POST" enctype="multipart/form-data">
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
    </div>
</body>
</html>