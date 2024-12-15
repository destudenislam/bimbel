<?php
// Koneksi ke database
include 'koneksi.php';

// Data pengguna baru
$username = 'admin'; // Gantilah dengan username yang sesuai
$password = 'password123'; // Gantilah dengan password yang sesuai

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Masukkan data pengguna ke database
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password); // "ss" untuk dua string
if ($stmt->execute()) {
    echo "Pengguna berhasil ditambahkan!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
