const mapelList = document.getElementById("mapelList");
const mapelForm = document.getElementById("mapelForm");
const mapelIdInput = document.getElementById("mapel_id");
const mapelInput = document.getElementById("mapel");
const addButton = document.getElementById("addButton");
const updateButton = document.getElementById("updateButton");

let mapelData = JSON.parse(localStorage.getItem("mapelData")) || []; // Mengambil data dari localStorage atau array kosong

// Fungsi untuk memperbarui tampilan daftar mata pelajaran
function updateMapelList() {
  mapelList.innerHTML = ""; // Kosongkan daftar sebelumnya
  mapelData.forEach((mapel) => {
    const row = document.createElement("tr");

    const idCell = document.createElement("td");
    idCell.textContent = mapel.id_mapel;
    row.appendChild(idCell);

    const nameCell = document.createElement("td");
    nameCell.textContent = mapel.mapel;
    row.appendChild(nameCell);

    const actionCell = document.createElement("td");
    const editButton = document.createElement("button");
    editButton.textContent = "Edit";
    editButton.onclick = () => editMapel(mapel.id_mapel);
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Hapus";
    deleteButton.classList.add("delete");
    deleteButton.onclick = () => deleteMapel(mapel.id_mapel);

    actionCell.appendChild(editButton);
    actionCell.appendChild(deleteButton);
    row.appendChild(actionCell);

    mapelList.appendChild(row);
  });
}

// Fungsi untuk menambahkan mata pelajaran
function addMapel() {
  const mapelName = mapelInput.value;
  const mapelId = mapelData.length
    ? mapelData[mapelData.length - 1].id_mapel + 1
    : 1; // Generate new ID
  mapelData.push({ id_mapel: mapelId, mapel: mapelName });
  saveToLocalStorage(); // Simpan ke localStorage
  updateMapelList();
  mapelForm.reset();
}

// Fungsi untuk mengedit mata pelajaran
function editMapel(id) {
  const mapel = mapelData.find((m) => m.id_mapel === id);
  if (mapel) {
    mapelIdInput.value = mapel.id_mapel;
    mapelInput.value = mapel.mapel;
    addButton.style.display = "none";
    updateButton.style.display = "inline-block";
  }
}

// Fungsi untuk memperbarui mata pelajaran
function updateMapel() {
  const id = parseInt(mapelIdInput.value);
  const mapelName = mapelInput.value;
  const mapel = mapelData.find((m) => m.id_mapel === id);
  if (mapel) {
    mapel.mapel = mapelName;
    saveToLocalStorage(); // Simpan perubahan ke localStorage
    updateMapelList();
    mapelForm.reset();
    addButton.style.display = "inline-block";
    updateButton.style.display = "none";
  }
}

// Fungsi untuk menghapus mata pelajaran dengan konfirmasi
function deleteMapel(id) {
  const confirmation = confirm(
    "Apakah Anda yakin ingin menghapus mata pelajaran ini?"
  );
  if (confirmation) {
    mapelData = mapelData.filter((m) => m.id_mapel !== id);
    saveToLocalStorage(); // Simpan perubahan ke localStorage
    updateMapelList();
  }
}

// Fungsi untuk menyimpan data ke localStorage
function saveToLocalStorage() {
  localStorage.setItem("mapelData", JSON.stringify(mapelData));
}

// Event listener untuk form submit
mapelForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if (mapelIdInput.value) {
    updateMapel(); // Update jika id_mapel ada
  } else {
    addMapel(); // Tambah jika id_mapel kosong
  }
});

// Inisialisasi tampilan awal
updateMapelList();
