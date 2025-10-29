document.getElementById("menutoggle").addEventListener("click", function () { // Tombol hamburger, toggle navigasi menu ketika menu di click
    const nav = document.querySelector("nav");
    nav.classList.toggle("active"); // Menambahkan atau menghapus class "active" pada elemen <nav>
    if (nav.classList.contains("active")) {
        this.textContent = "\u2716"; // Mengubah teks tombol menjadi simbol "X" ketika menu aktif
    } else {
        this.textContent = "\u2630"; // Mengubah teks tombol kembali menjadi simbol hamburger ketika menu tidak aktif
    }
});

document.getElementById("txtPesan").addEventListener("input", function () {
    const panjang = this.value.length;
    document.getElementById("charCount").textContent = panjang + "/200 karakter";
});

document.addEventListener("DOMContentLoaded", function () { // 
    const homesection = document.getElementById("home"); // Pastikan ada elemen dengan id "home" di HTML
    const ucapan = document.createElement("p"); // Membuat elemen paragraf baru
    ucapan.textContent = "Selamat datang di halaman saya!"; // Menambahkan teks ucapan
    homesection.appendChild(ucapan); // Menambahkan paragraf ke dalam elemen home

    function setupCharCountLayout() { // Mengatur layout penghitung karakter
        const label = document.querySelector('label[for="txtPesan"]'); // Memilih label yang terkait dengan textarea pesan
        if (!label) return; // memastikan label ada

        let wrapper = label.querySelector('[data-wrapper="pesan-wrapper"]'); // Memeriksa apakah wrapper sudah ada
        const span = label.querySelector('span'); // Memilih elemen span di dalam label
        const textarea = document.getElementById('txtPesan'); // Memilih textarea pesan
        const counter = document.getElementById('charCount'); // Memilih elemen penghitung karakter
        if (!span || !textarea || !counter) return; // memastikan elemen-elemen ada

        if (!wrapper) { // Jika wrapper belum ada, buat dan atur elemen wrapper
            wrapper = document.createElement('div'); // Membuat elemen div sebagai wrapper
            wrapper.dataset.wrapper = 'pesan-wrapper'; // Menetapkan atribut data-wrapper
            wrapper.style.width = '100%'; // Mengatur lebar wrapper
            wrapper.style.flex = '1'; // Membiarkan wrapper mengisi ruang yang tersedia
            wrapper.style.display = 'flex'; // Mengatur display flex untuk wrapper
            wrapper.style.flexDirection = 'column'; // Mengatur arah flex kolom

            label.insertBefore(wrapper, textarea); // Menyisipkan wrapper sebelum textarea
            wrapper.appendChild(textarea); // Memindahkan textarea ke dalam wrapper
            wrapper.appendChild(counter); // Memindahkan penghitung karakter ke dalam wrapper

            textarea.style.width = '100%'; // Mengatur lebar textarea
            textarea.style.boxSizing = 'border-box'; // Mengatur box-sizing untuk textarea
            counter.style.color = '#555'; // Mengatur warna teks penghitung karakter
            counter.style.fontSize = '14px'; // Mengatur ukuran font penghitung karakter
            counter.style.marginTop = '4px'; // Mengatur margin atas penghitung karakter
        }

        applyResponsiveLayout(); // Menerapkan layout responsif saat inisialisasi
    }
    function applyResponsiveLayout() { 
        const label = document.querySelector('label[for="txtPesan"]'); // Memilih label yang terkait dengan textarea pesan
        const span = label.querySelector('span'); // Memilih elemen span di dalam label
        const wrapper = label.querySelector('[data-wrapper="pesan-wrapper"]'); // Memilih wrapper pesan
        const counter = document.getElementById('charCount'); // Memilih elemen penghitung karakter
        if (!label || !span || !wrapper || !counter) return; // memastikan elemen-elemen ada

        const isMobile = window.matchMedia("(max-width: 600px)").matches; // Memeriksa apakah lebar layar kurang dari atau sama dengan 600px

        if (isMobile) { // Atur layout untuk tampilan mobile
            label.style.display = 'flex'; // Mengatur label sebagai flex container
            label.style.flexDirection = 'column'; // Mengatur arah flex kolom
            label.style.alignItems = 'flex-start'; // Menyelaraskan item ke awal
            label.style.width = '100%'; // Mengatur lebar label

            span.style.minWidth = 'auto'; // Mengatur lebar minimum span
            span.style.textAlign = 'left'; // Mengatur teks span rata kiri
            span.style.paddingRight = '0'; // Menghapus padding kanan span
            span.style.flexShrink = '0'; // Mencegah span menyusut
            span.style.marginBottom = '4px'; // Menambahkan margin bawah pada span

            wrapper.style.flex = '1'; // Membiarkan wrapper mengisi ruang yang tersedia
            wrapper.style.display = 'flex'; // Mengatur display flex untuk wrapper
            wrapper.style.flexDirection = 'column'; // Mengatur arah flex kolom
            counter.style.alignSelf = 'flex-end'; // Menyelaraskan penghitung karakter ke akhir
            counter.style.width = 'auto'; // Mengatur lebar penghitung karakter otomatis
        } else {
            label.style.display = 'flex'; // Mengatur label sebagai flex container
            label.style.flexDirection = 'row'; // Mengatur arah flex baris
            label.style.alignItems = 'baseline'; // Menyelaraskan item pada garis dasar
            label.style.width = '100%'; // Mengatur lebar label

            span.style.minWidth = '180px'; // Mengatur lebar minimum span
            span.style.textAlign = 'right'; // Mengatur teks span rata kanan
            span.style.paddingRight = '16px'; // Menambahkan padding kanan pada span
            span.style.flexShrink = '0'; // Mencegah span menyusut
            span.style.marginBottom = '0'; // Menghapus margin bawah pada span

            wrapper.style.flex = '1'; // Membiarkan wrapper mengisi ruang yang tersedia
            wrapper.style.display = 'flex'; // Mengatur display flex untuk wrapper
            wrapper.style.flexDirection = 'column'; // Mengatur arah flex kolom
            counter.style.alignSelf = 'flex-end'; // Menyelaraskan penghitung karakter ke akhir
            counter.style.width = 'auto'; // Mengatur lebar penghitung karakter otomatis
        }
    }

    setupCharCountLayout(); 

    window.addEventListener('resize', applyResponsiveLayout); // Menerapkan layout responsif saat jendela diubah ukurannya
});

