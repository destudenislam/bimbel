<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            padding:30px 50px;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            height: 300px;
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
            transition: background-color 0.3s, color 0.3s;
        }
        .button:hover {
            background-color: #007bff;
            color: white;
        }
        .button.selected {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        .save-button {
    background-color: #d35400;
    color: white;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    margin: 20px 30px; /* margin yang ada sekarang */
    margin-top: 40px; /* Menambahkan jarak ke bawah */
    margin-bottom: 2px;   
    height: 20px     
}

    </style>
</head>
<body>
    <div class="container">
        <span class="close">&times;</span>
       
        <div class="section-title">Pilih Kelas</div>
        <div class="buttons-group kelas-buttons">
            <div class="button">Kelas 10</div>
            <div class="button">Kelas 11</div>
            <div class="button">Kelas 12</div>
            
        </div>
          <a href="http://bimtrio.mif.myhost.id/landingpage/pembayaran1.php" class="save-button">Simpan</a>
    </div>
    <script>
        // Seleksi tombol kelas
        const kelasButtons = document.querySelectorAll('.kelas-buttons .button');

        // Tambahkan event listener ke setiap tombol
        kelasButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Hapus kelas 'selected' dari semua tombol
                kelasButtons.forEach(btn => btn.classList.remove('selected'));
                // Tambahkan kelas 'selected' ke tombol yang diklik
                button.classList.add('selected');
            });
        });
    </script>
</body>
</html>