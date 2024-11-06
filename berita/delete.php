<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = $conn->prepare("DELETE FROM berita WHERE berita_id = ?");
$query->execute([$id]);

header('Location: index.php');
?>
