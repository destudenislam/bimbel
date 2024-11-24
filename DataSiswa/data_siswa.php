<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM siswa"; 
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Siswa Bimbel</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>Data Siswa Bimbingan Belajar</h1>
    </header>

    <main>
      <h2>Form Pendaftaran Siswa</h2>
      <form id="siswaForm">
        <input type="hidden" id="siswaId" />
        <input type="text" id="siswaName" placeholder="Nama Siswa" required />
        <input type="date" id="siswaBirthDate" required />
        <input type="text" id="siswaAddress" placeholder="Alamat" required />
        <input type="text" id="siswaPhone" placeholder="No Telepon" required />
        <select id="siswaEducation" required>
          <option value="">Pilih Tingkat Pendidikan</option>
          <option value="1">SD</option>
          <option value="2">SMP</option>
          <option value="3">SMA</option>
          <option value="4">UMUM</option>
        </select>
        <button type="submit">Simpan Siswa</button>
      </form>

      <h2>Daftar Siswa</h2>
      <table id="siswaTable">
        <thead>
          <tr>
            <th>Siswa ID</th>
            <th>Nama Siswa</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Tingkat Pendidikan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="siswaList">
          <!-- Data siswa akan ditambahkan di sini -->
        </tbody>
      </table>
    </main>

    <footer>
      <p>&copy; 2024 Bimbel TRIO. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
  </body>
</html>