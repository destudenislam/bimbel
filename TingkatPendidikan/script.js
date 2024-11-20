const tingkatList = document.getElementById("tingkatList");
const tingkatForm = document.getElementById("tingkatForm");
const tingkatIdInput = document.getElementById("tingkat_id");
const namaTingkatInput = document.getElementById("nama_tingkat");
const addButton = document.getElementById("addButton");
const updateButton = document.getElementById("updateButton");

// Fungsi untuk memperbarui tampilan daftar tingkat pendidikan
function updateTingkatList() {
  fetch("tingkat_pendidikan.php")
    .then((response) => response.json())
    .then((data) => {
      tingkatList.innerHTML = ""; // Kosongkan daftar sebelumnya
      data.forEach((tingkat) => {
        const row = document.createElement("tr");

        const idCell = document.createElement("td");
        idCell.textContent = tingkat.tingkat_id;
        row.appendChild(idCell);

        const nameCell = document.createElement("td");
        nameCell.textContent = tingkat.nama_tingkat;
        row.appendChild(nameCell);

        const actionCell = document.createElement("td");
        const editButton = document.createElement("button");
        editButton.textContent = "Edit";
        editButton.onclick = () => editTingkat(tingkat.tingkat_id);
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Hapus";
        deleteButton.onclick = () => deleteTingkat(tingkat.tingkat_id);

        actionCell.appendChild(editButton);
        actionCell.appendChild(deleteButton);
        row.appendChild(actionCell);

        tingkatList.appendChild(row);
      });
    });
}

// Fungsi untuk menambahkan tingkat pendidikan
function addTingkat() {
  const namaTingkat = namaTingkatInput.value;

  fetch("tingkat_pendidikan.php", {
    method: "POST",
    body: new URLSearchParams({ nama_tingkat: namaTingkat }),
  })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message);
      updateTingkatList();
      tingkatForm.reset();
    });
}

// Fungsi untuk mengedit tingkat pendidikan
function editTingkat(id) {
  fetch(`tingkat_pendidikan.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      const tingkat = data[0]; // Ambil data pertama jika ada
      tingkatIdInput.value = tingkat.tingkat_id;
      namaTingkatInput.value = tingkat.nama_tingkat;
      addButton.style.display = "none";
      updateButton.style.display = "inline-block";
    });
}

// Fungsi untuk memperbarui tingkat pendidikan
function updateTingkat() {
  const tingkatId = tingkatIdInput.value;
  const namaTingkat = namaTingkatInput.value;

  fetch("tingkat_pendidikan.php", {
    method: "PUT",
    body: new URLSearchParams({
      tingkat_id: tingkatId,
      nama_tingkat: namaTingkat,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message);
      updateTingkatList();
      tingkatForm.reset();
      addButton.style.display = "inline-block";
      updateButton.style.display = "none";
    });
}

// Fungsi untuk menghapus tingkat pendidikan
function deleteTingkat(id) {
  const confirmation = confirm(
    "Apakah Anda yakin ingin menghapus tingkat ini?"
  );
  if (confirmation) {
    fetch("tingkat_pendidikan.php", {
      method: "DELETE",
      body: new URLSearchParams({ tingkat_id: id }),
    })
      .then((response) => response.json())
      .then((data) => {
        alert(data.message);
        updateTingkatList();
      });
  }
}

// Event listener untuk form submit
tingkatForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if (tingkatIdInput.value) {
    updateTingkat(); // Update jika tingkat_id ada
  } else {
    addTingkat(); // Tambah jika tingkat_id kosong
  }
});

// Inisialisasi tampilan awal
updateTingkatList();
