<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Bimbel - Data Guru</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h1>Bimbel TRIO</h1>

      <div class="section">
        <h2>Data Guru</h2>
        <form id="guruForm">
          <input type="text" id="guruName" placeholder="Nama Guru" required />
          <input type="text" id="guruPhone" placeholder="No Telepon" required />
          <input type="text" id="guruAddress" placeholder="Alamat" required />
          <select id="guruGender" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <input type="file" id="guruPhoto" accept="image/*" required />
          <button type="submit">Tambah Guru</button>
        </form>
        <ul id="guruList"></ul>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>