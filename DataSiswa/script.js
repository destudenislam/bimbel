let siswaList = JSON.parse(localStorage.getItem("siswaList")) || [];
let editIndex = -1;

document.getElementById("siswaForm").addEventListener("submit", function (e) {
  e.preventDefault();
  const siswaId = document.getElementById("siswaId").value;
  const siswaName = document.getElementById("siswaName").value;
  const siswaBirthDate = document.getElementById("siswaBirthDate").value;
  const siswaAddress = document.getElementById("siswaAddress").value;
  const siswaPhone = document.getElementById("siswaPhone").value;
  const siswaEducation = document.getElementById("siswaEducation").value;

  if (editIndex === -1) {
    // Tambah siswa baru
    const newSiswa = {
      id: siswaList.length + 1,
      name: siswaName,
      birthDate: siswaBirthDate,
      address: siswaAddress,
      phone: siswaPhone,
      education: siswaEducation,
    };
    siswaList.push(newSiswa);
  } else {
    // Edit siswa yang ada
    siswaList[editIndex] = {
      id: siswaId,
      name: siswaName,
      birthDate: siswaBirthDate,
      address: siswaAddress,
      phone: siswaPhone,
      education: siswaEducation,
    };
    editIndex = -1; // Reset edit index setelah edit
  }

  // Simpan data siswa ke localStorage
  localStorage.setItem("siswaList", JSON.stringify(siswaList));

  renderSiswaList();
  document.getElementById("siswaForm").reset();
});

function renderSiswaList() {
  const list = document.getElementById("siswaList");
  list.innerHTML = ""; // Kosongkan daftar sebelum diisi ulang
  siswaList.forEach((siswa, index) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
            <td>${siswa.id}</td>
            <td>${siswa.name}</td>
            <td>${siswa.birthDate}</td>
            <td>${siswa.address}</td>
            <td>${siswa.phone}</td>
            <td>${getEducationLevel(siswa.education)}</td>
            <td>
                <button onclick="editSiswa(${index})">Edit</button>
                <button onclick="deleteSiswa(${index})">Hapus</button>
            </td>
        `;
    list.appendChild(tr);
  });
}

function getEducationLevel(level) {
  switch (level) {
    case "1":
      return "SD";
    case "2":
      return "SMP";
    case "3":
      return "SMA";
    case "4":
      return "UMUM";
    default:
      return "Tidak Diketahui";
  }
}

function editSiswa(index) {
  const siswa = siswaList[index];
  document.getElementById("siswaId").value = siswa.id;
  document.getElementById("siswaName").value = siswa.name;
  document.getElementById("siswaBirthDate").value = siswa.birthDate;
  document.getElementById("siswaAddress").value = siswa.address;
  document.getElementById("siswaPhone").value = siswa.phone;
  document.getElementById("siswaEducation").value = siswa.education;
  editIndex = index; // Set index untuk edit
}

function deleteSiswa(index) {
  const confirmation = confirm("Apakah Anda yakin ingin menghapus siswa ini?");
  if (confirmation) {
    siswaList.splice(index, 1);
    // Simpan perubahan ke localStorage
    localStorage.setItem("siswaList", JSON.stringify(siswaList));
    renderSiswaList();
  }
}

// Memuat daftar siswa saat halaman dimuat
document.addEventListener("DOMContentLoaded", renderSiswaList);
