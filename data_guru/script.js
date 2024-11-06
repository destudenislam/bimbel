document.getElementById("guruForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const guruName = document.getElementById("guruName").value;
    const guruPhone = document.getElementById("guruPhone").value;
    const guruAddress = document.getElementById("guruAddress").value;
    const guruGender = document.getElementById("guruGender").value;
    const guruPhoto = document.getElementById("guruPhoto").files[0];
  
    addGuru(guruName, guruPhone, guruAddress, guruGender, guruPhoto);
    document.getElementById("guruForm").reset();
  });
  
  let guruList = [];
  let editIndex = -1;
  
  function addGuru(name, phone, address, gender, photo) {
    const reader = new FileReader();
    reader.onload = function (event) {
      const guru = { name, phone, address, gender, photo: event.target.result };
      if (editIndex === -1) {
        guruList.push(guru);
      } else {
        guruList[editIndex] = guru;
        editIndex = -1; // Reset edit index setelah edit
      }
      renderGuruList();
    };
    reader.readAsDataURL(photo);
  }
  
  function renderGuruList() {
    const list = document.getElementById("guruList");
    list.innerHTML = "";
    guruList.forEach((guru, index) => {
      const li = document.createElement("li");
      li.innerHTML = `
              <div>
                  <strong>${guru.name}</strong><br>
                  No Telepon: ${guru.phone}<br>
                  Alamat: ${guru.address}<br>
                  Jenis Kelamin: ${guru.gender}
                  <img src="${guru.photo}" alt="Foto Guru">
              </div>
          `;
      li.appendChild(createEditButton(() => editGuru(index)));
      li.appendChild(createDeleteButton(() => deleteGuru(index)));
      list.appendChild(li);
    });
  }
  
  function createEditButton(onClick) {
    const button = document.createElement("button");
    button.textContent = "Edit";
    button.className = "edit-button";
    button.onclick = onClick;
    return button;
  }
  
  function createDeleteButton(onClick) {
    const button = document.createElement("button");
    button.textContent = "Hapus";
    button.className = "delete-button";
    button.onclick = onClick;
    return button;
  }
  
  function editGuru(index) {
    const guru = guruList[index];
    document.getElementById("guruName").value = guru.name;
    document.getElementById("guruPhone").value = guru.phone;
    document.getElementById("guruAddress").value = guru.address;
    document.getElementById("guruGender").value = guru.gender;
    editIndex = index; // Set index untuk edit
  }
  
  function deleteGuru(index) {
    const confirmation = confirm("Apakah Anda yakin ingin menghapus guru ini?");
    if (confirmation) {
      guruList.splice(index, 1);
      renderGuruList();
    }
  }