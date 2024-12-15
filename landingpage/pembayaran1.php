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
        <div class="form-group">
            <input type="text" placeholder="nama">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Tanggal Lahir">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Alamat">
        </div>
        <div class="form-group">
            <input type="text" placeholder="No Tlp">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Asal Sekolah">
        </div>
        <div class="file-input">
    <label for="buktiPembayaran">Bukti Pembayaran</label>
    <input type="file" id="buktiPembayaran" name="buktiPembayaran" accept=".jpg,.jpeg,.png,.pdf" onchange="updateFileLabel(this)" hidden>
    <span class="file-label" onclick="document.getElementById('buktiPembayaran').click()">Pilih file</span>
</div><br><div class="submit-btn"> 
            <button>Selesai</button>
        </div>
    </div>
</body>
</html>