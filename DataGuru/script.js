let guruList = JSON.parse(localStorage.getItem("guruList")) || [];
let editIndex = -1;

document.getElementById("guruForm").addEventListener("submit", function (e) {
  e.preventDefault();
  const guruId = document.getElementById("guruId").value || guruList.length + 1;
  const guruName = document.getElementById("guruName").value.trim();
  const guruPhone = document.getElementById("guruPhone").value.trim();
  const guruAddress = document.getElementById("guruAddress").value.trim();
  const guruSubject = document.getElementById("guruSubject").value.trim();
  const adminId = document.getElementById("adminId").value.trim();

  if (!guruName || !guruPhone || !guruAddress || !guruSubject || !adminId) {
    alert("Semua kolom harus diisi!");
    return;
  }

  if (editIndex === -1) {
    // Tambah guru baru
    const newGuru = {
      id: guruId,
      name: guruName,
      phone: guruPhone,
      address: guruAddress,
      subject: guruSubject,
      adminId: adminId,
    };
    guruList.push(newGuru);
  } else {
    // Edit guru yang ada
    guruList[editIndex] = {
      id: guruId,
      name: guruName,
      phone: guruPhone,
      address: guruAddress,
      subject: guruSubject,
      adminId: adminId,
    };
    editIndex = -1; // Reset edit index setelah edit
  }

  // Simpan data guru ke localStorage
  localStorage.setItem("guruList", JSON.stringify(guruList));

  renderGuruList();
  document.getElementById("guruForm").reset();
});

function renderGuruList() {
  const list = document.getElementById("guruList");
  list.innerHTML = ""; // Kosongkan daftar sebelum diisi ulang
  guruList.forEach((guru, index) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${guru.id}</td>
      <td>${guru.name}</td>
      <td>${guru.phone}</td>
      <td>${guru.address}</td>
      <td>${guru.subject}</td>
      <td>${guru.adminId}</td>
      <td>
        <button onclick="editGuru(${index})">Edit</button>
        <button onclick="deleteGuru(${index})">Hapus</button>
      </td>
    `;
    list.appendChild(tr);
  });
}

function editGuru(index) {
  const guru = guruList[index];
  document.getElementById("guruId").value = guru.id;
  document.getElementById("guruName").value = guru.name;
  document.getElementById("guruPhone").value = guru.phone;
  document.getElementById("guruAddress").value = guru.address;
  document.getElementById("guruSubject").value = guru.subject;
  document.getElementById("adminId").value = guru.adminId;

  editIndex = index; // Set index untuk edit
}

function deleteGuru(index) {
  const confirmation = confirm("Apakah Anda yakin ingin menghapus guru ini?");
  if (confirmation) {
    guruList.splice(index, 1);
    // Simpan perubahan ke localStorage
    localStorage.setItem("guruList", JSON.stringify(guruList));
    renderGuruList();
  }
}

// Memuat daftar guru saat halaman dimuat
document.addEventListener("DOMContentLoaded", renderGuruList);
