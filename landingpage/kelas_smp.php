<html>
<head>
    <title>Pilih Jenjang dan Kelas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
            position: relative;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin: 20px 0 10px;
        }
        .buttons-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        .button {
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 5px 15px;
            cursor: pointer;
            font-size: 14px;
        }
        .button.selected {
            border-color: #007bff;
            color: #007bff;
        }
        .save-button {
            background-color: #d35400;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <span class="close">&times;</span>
        <div class="header">
            <h2>Pilih Mata Pelajaran</h2>
        </div>
        <div class="buttons-group">
            <div class="button selected">IPS</div>
            <div class="button">B.Indonesia</div>
            <div class="button">Matematika</div>
            <div class="button">B.Inggris</div>
            <div class="button">IPA</div>
        </div>
        <hr>
        <div class="section-title">Pilih Kelas</div>
        <div class="buttons-group">
            <div class="button">Kelas 7</div>
            <div class="button">Kelas 8</div>
            <div class="button">Kelas 9</div>
        </div>
        <button class="save-button">Simpan</button>
    </div>
</body>
</html>