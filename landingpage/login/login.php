<?php
// Menghubungkan ke database
$conn = new mysqli("localhost", "root", "", "bimbel");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data login dari form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "Username dan password tidak boleh kosong!";
    } else {
        // Menggunakan prepared statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Jika password benar, cek role
                session_start();
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['username'] = $username;
                header("Location: http://localhost/bimbel/");
                exit();
            } else {
                echo "Password salah!";
            }
        } else {
            echo "Username tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <section class="wrapper">
        <div class="form login">
            <header>Login</header>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" value="Login" />
            </form>
        </div>
    </section>
</body>
</html>