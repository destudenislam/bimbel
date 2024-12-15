<?php
$host = "bimtrio.mif.myhost.id";
$username = "mifmyho2_bimtrio";
$password = "@Mif2024";
$dbname = "mifmyho2_bimtrio";

// Establishing the connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Checking the connection
if ($conn) {
    // Redirecting to index.php if the connection is successful
    header("Location: http://bimtrio.mif.myhost.id/landingpage/landingpage.php");
    exit();  // It's important to call exit() after header() to stop further script execution
} else {
    // Display error message if connection fails
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
