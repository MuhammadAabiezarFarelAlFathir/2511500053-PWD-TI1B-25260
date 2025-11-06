<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menutoggle" aria-label="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Selamat Datang</h2>
            <p>Ini contoh paragraf HTML.</p>
            <?php
            echo "Halo Dunia!";
            ?>
        </section>
        <section id="about">
            <?php
            $NIM = "2511500053";
            $namaL = "Muhammad Aabiezar Farel Al-Fathir &#128526;";
            $tempatLahir = "Bandar Lampung";
            $tanggalLahir = "08/12/2006";
            $hobby = "Mengutak-atik komponen komputer &#9786;";
            $status = "Single, &hearts; Open for casual talks but not to mingle";
            $pekerjaan = "Bengkel Duplikat Kunci";
            $orangTua = "Bapak Sutriyanto dan Ibu Rosdiana";
            $kakak = "Tidak ada";
            $adik = "Dzaky dan Shanum";
            ?>
            <h2>Tentang Kami</h2>
            <p>
                <strong>NIM :</strong>
                <?php
                echo $NIM;
                ?>
            </p>
            <p>
                <strong>Nama Lengkap :</strong>
                <?php
                echo $namaL;
                ?>
            </p>
            <p>
                <strong>Tempat Lahir :</strong>
                <?php
                echo $tempatLahir;
                ?>
            </p>
            <p>
                <strong>Tanggal Lahir :</strong>
                <?php
                echo $tanggalLahir;
                ?>
            </p>
            <p>
                <strong>Hobby :</strong>
                <?php
                echo $hobby;
                ?>
            </p>
            <p>
                <strong>Pasangan :</strong>
                <?php
                echo $status;
                ?>
            </p>
            <p>
                <strong>Pekerjaan :</strong>
                <?php
                echo $pekerjaan;
                ?>
            </p>
            <p>
                <strong>Nama Orang Tua :</strong>
                <?php
                echo $orangTua;
                ?>
            </p>
            <p>
                <strong>Nama Kakak :</strong>
                <?php
                echo $kakak;
                ?>
            </p>
            <p>
                <strong>Nama Adik :</strong>
                <?php
                echo $adik;
                ?>
            </p>
        </section>
        <section id="contact">
            <h2>Kontak Kami</h2>
            <form action="" method="GET">
                <label for="txtNama"><span>Nama:</span>
                    <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama Anda" required
                        autocomplete="name">
                </label>
                <label for="txtEmail"><span>Email:</span>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan Email Anda" required
                        autocomplete="email">
                </label>
                <label for="txtPesan"><span>Pesan Anda:</span>
                    <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
                        required></textarea>
                    <small id="charCount">0/200 karakter</small> <!-- Penambahan penghitung karakter -->
                </label>
                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Muhammad Aabiezar Farel Al-Fathir [2511500053]</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>