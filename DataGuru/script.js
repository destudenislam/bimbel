let guruList = JSON.parse(localStorage.getItem("guruList")) || [];
let editIndex = -1;

document.getElementById("guruForm").addEventListener("submit", function (e) {
  e.preventDefault();
  const guruId = document.getElementById("guruId").value;
  const guruName = document.getElementById("guruName").value;
  const guruAddress = document.getElementById("guruAddress").value;
  const guruGender = document.getElementById("guruGender").value;
  const guruSubject = document.getElementById("guruSubject").value;
  const guruPhoto = document.getElementById("guruPhoto").files[0];

  const reader = new FileReader();
  reader.onloadend = function () {
    const photoURL = reader.result;

    if (editIndex === -1) {
      // Tambah guru baru
      const newGuru = {
        id: guruList.length + 1,
        name: guruName,
        address: guruAddress,
        gender: guruGender,
        subject: guruSubject,
        photo: photoURL, // Simpan URL foto
      };
      guruList.push(newGuru);
    } else {
      // Edit guru yang ada
      guruList[editIndex] = {
        id: guruId,
        name: guruName,
        address: guruAddress,
        gender: guruGender,
        subject: guruSubject,
        photo: photoURL, // Update URL foto
      };
      editIndex = -1; // Reset edit index setelah edit
    }

    // Simpan data guru ke localStorage
    localStorage.setItem("guruList", JSON.stringify(guruList));

    renderGuruList();
    document.getElementById("guruForm").reset();
  };

  if (guruPhoto) {
    reader.readAsDataURL(guruPhoto); // Membaca file foto
  }
});

function renderGuruList() {
  const list = document.getElementById("guruList");
  list.innerHTML = ""; // Kosongkan daftar sebelum diisi ulang
  guruList.forEach((guru, index) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
            <td>${guru.id}</td>
            <td>${guru.name}</td>
            <td>${guru.address}</td>
            <td>${guru.gender === "L" ? "Laki-laki" : "Perempuan"}</td>
            <td>${guru.subject}</td>
            <td><img src="${
              guru.photo
            }" alt="Foto Profil" style="width:50px;height:50px;" /></td>
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
  document.getElementById("guruAddress").value = guru.address;
  document.getElementById("guruGender").value = guru.gender;
  document.getElementById("guruSubject").value = guru.subject;
  // Reset foto jika sedang mengedit
  document.getElementById("guruPhoto").value = ""; // Reset input file
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
