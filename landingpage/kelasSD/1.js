// Fungsi untuk menangani tombol kelas yang diklik
function pilihKelas(el) {
    // Ambil semua tombol dengan kelas 'kelas'
    const buttons = document.querySelectorAll('.kelas');
    
    // Hapus kelas 'active' dari semua tombol
    buttons.forEach(button => button.classList.remove('active'));
    
    // Tambahkan kelas 'active' ke tombol yang diklik
    el.classList.add('active');
}
