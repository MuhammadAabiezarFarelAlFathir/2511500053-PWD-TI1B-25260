document.getElementById("menutoggle").addEventListener("click", function () { // Tombol hamburger, toggle navigasi menu ketika menu di click
    const nav = document.querySelector("nav");
    nav.classList.toggle("active"); // Menambahkan atau menghapus class "active" pada elemen <nav>
    if (nav.classList.contains("active")) {
        this.textContent = "\u2716"; // Mengubah teks tombol menjadi simbol "X" ketika menu aktif
    } else {
        this.textContent = "\u2630"; // Mengubah teks tombol kembali menjadi simbol hamburger ketika menu tidak aktif
    }
});

document.getElementById("txtPesan").addEventListener("input", function () { // Menghitung jumlah karakter pada textarea pesan
    const panjang = this.value.length; // Menghitung panjang teks dalam textarea
    document.getElementById("charCount").textContent = panjang + "/200 karakter"; // Menampilkan jumlah karakter di elemen dengan id "charCount"
});

document.addEventListener("DOMContentLoaded", function () { 
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

document.querySelector("form").addEventListener("submit", function (e) { // Validasi form sebelum submit
    const nama = document.getElementById("txtNama"); // Mengambil elemen input nama
    const email = document.getElementById("txtEmail"); // Mengambil elemen input email
    const pesan = document.getElementById("txtPesan"); // Mengambil elemen textarea pesan

    document.querySelectorAll(".error-msg").forEach(el => el.remove()); // Menghapus pesan error yang ada
    [nama, email, pesan].forEach(el => el.style.border = ""); // Menghapus gaya border merah pada input

    let isValid = true; // Flag untuk validasi form

    if (nama.value.trim().length < 3) { // Validasi nama minimal 3 huruf
        showError(nama, "Nama minimal 3 huruf dan tidak boleh kosong."); // Menampilkan pesan error
        isValid = false; // Menandai form sebagai tidak valid
    } else if (!/^[A-Za-z\s]+$/.test(nama.value)) { // Validasi hanya huruf dan spasi
        showError(nama, "Nama hanya boleh berisi huruf dan spasi."); // Menampilkan pesan error
        isValid = false; // Menandai form sebagai tidak valid
    }
    
    if (email.value.trim() === "") { // Validasi email tidak boleh kosong
        showError(email, "Email wajib diisi."); // Menampilkan pesan error
        isValid = false; // Menandai form sebagai tidak valid
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) { // Validasi format email
        showError(email, "Format email tidak valid. Contoh: nama@mail.com"); // Menampilkan pesan error
        isValid = false; // Menandai form sebagai tidak valid
    }

    if (pesan.value.trim().length < 10) { // Validasi pesan minimal 10 karakter
        showError(pesan, "Pesan minimal 10 karakter agar lebih jelas."); // Menampilkan pesan error
        isValid = false; // Menandai form sebagai tidak valid
    }
    if (!isValid) { // Jika form tidak valid, cegah submit
        e.preventDefault(); // Mencegah submit form
    } else { // Jika form valid, tampilkan alert terima kasih
        alert("Terima kasih, " + nama.value + "!\nPesan Anda telah dikirim."); // Menampilkan pesan terima kasih
        // e.target.reset();
        e.target.submit(); // Melanjutkan submit form
    }
});
function showError(inputElement, message) { // Fungsi untuk menampilkan pesan error
    const label = inputElement.closest("label"); // Mencari elemen label terdekat
    if (!label) return; // memastikan label ada

    label.style.flexWrap = "wrap"; // Mengatur flex-wrap pada label untuk menampung pesan error

    const small = document.createElement("small"); // Membuat elemen small untuk pesan error
    small.className = "error-msg"; // Menetapkan class untuk styling
    small.textContent = message; // Menetapkan teks pesan error

    small.style.color = "red"; // Mengatur warna teks pesan error
    small.style.fontSize = "14px"; // Mengatur ukuran font pesan error
    small.style.display = "block"; // Mengatur display block untuk pesan error
    small.style.marginTop = "4px"; // Mengatur margin atas pesan error
    small.style.flexBasis = "100%"; // Mengatur flex-basis agar pesan error mengambil seluruh baris
    small.dataset.forId = inputElement.id; // Menyimpan id input terkait pada dataset untuk referensi

    if (inputElement.nextSibling) { // Menyisipkan pesan error setelah elemen input
        label.insertBefore(small, inputElement.nextSibling); // Sisipkan sebelum "sibling" berikutnya
    } else { // Jika tidak ada sibling
        label.appendChild(small); // Tambahkan di akhir label
    }

    inputElement.style.border = "1px solid red"; // Menambahkan border merah pada input yang error

    alignErrorMessage(small, inputElement); // Menyelaraskan pesan error dengan input
}

function alignErrorMessage(smallEl, inputEl) { // Fungsi untuk menyelaraskan pesan error dengan input
    const isMobile = window.matchMedia("(max-width: 600px)").matches; // Memeriksa apakah tampilan mobile sama
    if (isMobile) { 
        smallEl.style.marginLeft = "0"; // Mengatur margin kiri pesan error untuk tampilan mobile
        smallEl.style.width = "100%"; // Mengatur lebar pesan error untuk tampilan mobile
        return;
    }

    const label = inputEl.closest("label"); // Mencari elemen label terdekat
    if (!label) return; // memastikan label ada
    
    const rectLabel = label.getBoundingClientRect(); // Mendapatkan posisi dan ukuran label
    const rectInput = inputEl.getBoundingClientRect(); // Mendapatkan posisi dan ukuran input
    const offsetLeft = Math.max(0, Math.round(rectInput.left - rectLabel.left)); // Menghitung offset kiri input relatif terhadap label
    
    smallEl.style.marginLeft = offsetLeft + "px"; // Mengatur margin kiri pesan error sesuai offset input
    smallEl.style.width = Math.round(rectInput.width) + "px"; // Mengatur lebar pesan error sesuai lebar input
}

window.addEventListener("resize", () => { // Menyelaraskan ulang pesan error saat jendela diubah ukurannya
    document.querySelectorAll(".error-msg").forEach(small => { // Memilih semua elemen pesan error
        const target = document.getElementById(small.dataset.forId); // Mendapatkan elemen input terkait menggunakan dataset
        if (target) alignErrorMessage(small, target); // Menyelaraskan pesan error dengan input terkait
    });
});