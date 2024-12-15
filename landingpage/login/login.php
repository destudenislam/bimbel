<?php
// Koneksi ke database
include "koneksi.php";

session_start(); // Mulai sesi

// Jika pengguna sudah login, arahkan langsung ke dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: http://bimtrio.mif.myhost.id"); // URL dashboard
    exit();
}

// Proses login jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username) || empty($password)) {
        $error = "Username dan password tidak boleh kosong!";
    } else {
        // Query ke database untuk mencocokkan username dan password
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password); // Karena password tersimpan dalam teks biasa
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login berhasil
            $row = $result->fetch_assoc();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['username'] = $row['username'];

            // Redirect ke dashboard
            header("Location: index.php");
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .form-control label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-control input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-control input:focus {
            outline: none;
            border-color: #007BFF;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #6c757d;
            margin-top: 10px;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login Admin</h1>
        <?php if (isset($error)) { echo "<p class='error'>" . $error . "</p>"; } ?>
        <form method="POST" action="index.php">
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <!-- Tombol Kembali ke Landing Page -->
        <form action="http://bimtrio.mif.myhost.id/landingpage/landingpage.php" method="get">
            <button type="submit" class="back-button">Kembali ke Landing Page</button>
        </form>
    </div>
</body>
</html>
