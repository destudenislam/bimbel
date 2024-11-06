    <?php

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "bimbel");

    // Periksa koneksi
    if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Fungsi untuk menampilkan semua berita
    function getBerita() {
    global $conn;
    $sql = "SELECT * FROM berita";
    $result = mysqli_query($conn, $sql);
    return $result;
    }

    // Fungsi untuk menampilkan berita berdasarkan ID
    function getBeritaById($id) {
    global $conn;
    $sql = "SELECT * FROM berita WHERE berita_id = $id";
    $result = mysqli_query($conn, $sql);
    return $result;
    }

    // Fungsi untuk menambahkan berita baru
    function addBerita($judul, $isi, $tanggal, $kategori, $admin_id) {
    global $conn;
    $sql = "INSERT INTO berita (judul, isi, tanggal, kategori, admin_id) VALUES ('$judul', '$isi', '$tanggal', '$kategori', '$admin_id')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
    }

    // Fungsi untuk mengupdate berita
    function updateBerita($id, $judul, $isi, $tanggal, $kategori, $admin_id) {
    global $conn;
    $sql = "UPDATE berita SET judul = '$judul', isi = '$isi', tanggal = '$tanggal', kategori = '$kategori', admin_id = '$admin_id' WHERE berita_id = $id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
    }

    // Fungsi untuk menghapus berita
    function deleteBerita($id) {
    global $conn;
    $sql = "DELETE FROM berita WHERE berita_id = $id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
    }

    // Contoh penggunaan CRUD
    // Tampilkan semua berita
    $berita = getBerita();
    echo "<h2>Semua Berita</h2>";
