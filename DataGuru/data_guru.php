<?php
$conn = mysqli_connect("localhost", "root", "", "bimbel");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM guru"; 
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Guru Bimbel</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>Data Guru Bimbingan Belajar</h1>
    </header>

    <main>
      <h2>Form Guru</h2>
      <form id="guruForm">
        <input type="hidden" id="guruId" placeholder="ID Guru" required />
        <input type="text" id="guruName" placeholder="Nama Guru" required />
        <input
          type="text"
          id="guruPhone"
          placeholder="No Telepon"
          required
        />
        <input type="text" id="guruAddress" placeholder="Alamat" required />
        
        <input
          type="text"
          id="guruSubject"
          placeholder="ID Mapel"
          required
        />
        <input type="text" id="adminId" placeholder="Admin ID" required />
        <button type="submit">Tambahkan</button>
      </form>

      <h2>Daftar Guru</h2>
      <table id="guruTable">
        <thead>
          <tr>
            <th>Guru ID</th>
            <th>Nama Guru</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>ID Mapel</th>
            <th>Admin ID</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="guruList">
          <!-- Data guru akan ditambahkan di sini -->
        </tbody>
      </table>
    </main>

    <footer>
      <p>&copy; 2024 Bimbel TRIO. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
  </body>
</html>

