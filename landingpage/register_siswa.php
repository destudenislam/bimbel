<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bimbel"; // Nama database Anda

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inisialisasi pesan sukses atau error
$success = $error = "";

// Proses form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        $error = "Username dan Password harus diisi.";
    } else {
        // Cek apakah username sudah ada
        $check_sql = "SELECT * FROM users WHERE username = '$username'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            // Jika username sudah terdaftar, arahkan ke landing page
            header("Location: http://localhost/bimbel/landingpage/landingpage.php?#hi-$username");
            exit();
        } else {
            // Jika username belum terdaftar, lakukan penyimpanan
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                $success = "Registrasi berhasil! Anda akan diarahkan ke landing page.";
                // Arahkan ke landing page setelah sukses
                header("Location: http://localhost/bimbel/landingpage/landingpage.php?#hi-$username");
                exit();
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        .btn-register {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: #218838;
        }

        .success {
            color: green;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .error {
            color: red;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Registrasi Siswa</h2>

        <!-- Pesan sukses atau error -->
        <?php if (isset($success)): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php elseif (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <!-- Form registrasi -->
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br><br>
            </div>

            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
            </div>

            <button type="submit" class="btn-register">Daftar</button>
        </form>
    </div>

    <script>
        // Validasi form sebelum submit
        function validateForm() {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            if (username === "" || password === "") {
                aler
