<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 150px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .dropdown {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .button {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border: 1px dashed #00bcd4;
            border-radius: 8px;
            color: #00bcd4;
            text-decoration: none;
            margin-bottom: 10px;
        }
        .button i {
            margin-right: 10px;
        }
        .total-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .total-price span {
            color: #ff0000;
        }
        .buy-button {
            width: 100%;
            padding: 10px;
            background-color: #ffcc99;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .terms {
            font-size: 12px;
            color: #888;
        }
        .terms a {
            color: #00bcd4;
            text-decoration: none;
        }
        .container1 {
            background-color: #fff;
            padding: 25px ;
            margin:0 auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* width: 300px; */
        }
        .container1 h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .item:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pilih metode pelunasan</h2>
        <select class="dropdown">
            <option>Pembayaran Lunas</option>
        </select>
        <div class="section">
            <div class="section-title">Gunakan kode diskon</div>
            <a href="#" class="button">
                <div>
                    <i class="fas fa-tags"></i> Lihat promo yang tersedia
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <div class="container1">
        <h2>Detail Pembayaran</h2>
        <div class="item">
            <span>ruangbelajar 1 Tahun Ajaran 
            2021/2022 SBMPTN</span>
            <span>Rp 1.498.000</span>
        </div>
        <div class="item">
            <span>Nominal Diskon</span>
            <span class="discount">-Rp 898.800</span>
        </div>
        <div class="item">
            <span>Kode Diskon</span>
            <span>calonmaba</span>
        </div>
        <hr>

        <div class="total-price">
            <h2>Total Harga<h2>
            <span>Rp 0</span>
        </div>
        <button class="buy-button">Beli</button>
        <div class="terms">
            Jika memilih metode pelunasan cicilan, pastikan kamu sudah membaca dan menyetujui <a href="#">Syarat dan Ketentuan</a>
        </div>
    </div>
</body>
</html>