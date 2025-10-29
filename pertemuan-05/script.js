document.getElementById("menutoggle").addEventListener("click", function () { // Tombol hamburger, toggle navigasi menu ketika menu di click
    const nav = document.querySelector("nav");
    nav.classList.toggle("active"); // Menambahkan atau menghapus class "active" pada elemen <nav>
    if (nav.classList.contains("active")) {
        this.textContent = "\u2716"; // Mengubah teks tombol menjadi simbol "X" ketika menu aktif
    } else {
        this.textContent = "\u2630"; // Mengubah teks tombol kembali menjadi simbol hamburger ketika menu tidak aktif
    }
});

document.addEventListener("DOMContentLoaded", function() { // Menambahkan ucapan selamat datang setelah halaman dimuat
    const homesection = document.getElementById("home"); // Pastikan ada elemen dengan id "home" di HTML
    const ucapan = document.createElement("p"); // Membuat elemen paragraf baru
    ucapan.textContent = "Selamat datang di halaman saya!"; // Menambahkan teks ucapan
    homesection.appendChild(ucapan); // Menambahkan paragraf ke dalam elemen home
});