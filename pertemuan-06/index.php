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
            $tempatlahir = "Bandar Lampung";
            $tanggallahir = "08/12/2006";
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
                echo $tempatlahir;
                ?>
            </p>
            <p>
                <strong>Tanggal Lahir :</strong>
                <?php
                echo $tanggallahir;
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
        <section id="ipk">
            <?php
            $namaMatkul1 = "";
            $namaMatkul2 = "";
            $namaMatkul3 = "";
            $namaMatkul4 = "";
            $namaMatkul5 = "";
            $sksMatkul1 = "";
            $sksMatkul2 = "";
            $sksMatkul3 = "";
            $sksMatkul4 = "";
            $sksMatkul5 = "";
            $nilaiHadir1 = "";
            $nilaiHadir2 = "";
            $nilaiHadir3 = "";
            $nilaiHadir4 = "";
            $nilaiHadir5 = "";
            $nilaiTugas1 = "";
            $nilaiTugas2 = "";
            $nilaiTugas3 = "";
            $nilaiTugas4 = "";
            $nilaiTugas5 = "";
            $nilaiUTS1 = "";
            $nilaiUTS2 = "";
            $nilaiUTS3 = "";
            $nilaiUTS4 = "";
            $nilaiUTS5 = "";
            $nilaiUAS1 = "";
            $nilaiUAS2 = "";
            $nilaiUAS3 = "";
            $nilaiUAS4 = "";
            $nilaiUAS5 = "";
            #Nilai Akhir = (0.1 * nilaiHadir) + (0.2 * nilaiTugas) + (0.3 * nilaiUTS) + (0.4 * nilaiUAS)
            $nilaiAkhir1 = "(0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1)";
            $nilaiAkhir2 = "(0.1 * $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2)";
            $nilaiAkhir3 = "(0.1 * $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3)";
            $nilaiAkhir4 = "(0.1 * $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4)";
            $nilaiAkhir5 = "(0.1 * $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5)";
            #Nilai kehadiran < 70, otomatis Grade = E.
            $grade1 = "if ";
            $grade2 = "";
            $grade3 = "";
            $grade4 = "";
            $grade5 = "";
            if ($nilaikehadiran1 < 70):
                $grade1 = "E";
            endif;
            if ($nilaikehadiran2 < 70):
                $grade2 = "E";
            endif;
            if ($nilaikehadiran3 < 70):
                $grade3 = "E";
            endif;
            if ($nilaikehadiran4 < 70):
                $grade4 = "E";
            endif;
            if ($nilaikehadiran5 < 70):
                $grade5 = "E";
            endif;
            $mutu1 = "";
            $mutu2 = "";
            $mutu3 = "";
            $mutu4 = "";
            $mutu5 = "";
            $bobot1 = "";
            $bobot2 = "";
            $bobot3 = "";
            $bobot4 = "";
            $bobot5 = "";
            $status1 = "";
            $status2 = "";
            $status3 = "";
            $status4 = "";
            $status5 = "";
            $totalBobot = "";
            $totalSKS = "";
            $IPK = "";
            ?>
            <h2>Tentang Kami</h2>
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