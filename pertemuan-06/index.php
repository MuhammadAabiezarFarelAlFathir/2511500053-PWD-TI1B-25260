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
            $namaMatkul1 = "Aplikasi Perkantoran";
            $namaMatkul2 = "Wawasan Budi Luhur";
            $namaMatkul3 = "Pemrograman Web Dasar";
            $namaMatkul4 = "Kalkulus";
            $namaMatkul5 = "Logika Informatika";
            $sksMatkul1 = 4;
            $sksMatkul2 = "";
            $sksMatkul3 = "";
            $sksMatkul4 = "";
            $sksMatkul5 = "";
            $nilaiHadir1 = 100;
            $nilaiHadir2 = "";
            $nilaiHadir3 = "";
            $nilaiHadir4 = "";
            $nilaiHadir5 = "";
            $nilaiTugas1 = 90;
            $nilaiTugas2 = "";
            $nilaiTugas3 = "";
            $nilaiTugas4 = "";
            $nilaiTugas5 = "";
            $nilaiUTS1 = 60;
            $nilaiUTS2 = "";
            $nilaiUTS3 = "";
            $nilaiUTS4 = "";
            $nilaiUTS5 = "";
            $nilaiUAS1 = 60;
            $nilaiUAS2 = "";
            $nilaiUAS3 = "";
            $nilaiUAS4 = "";
            $nilaiUAS5 = "";
            #Nilai Akhir = (0.1 * nilaiHadir) + (0.2 * nilaiTugas) + (0.3 * nilaiUTS) + (0.4 * nilaiUAS)
            $nilaiAkhir1 = (0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1);
            $nilaiAkhir2 = (0.1 * $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2);
            $nilaiAkhir3 = (0.1 * $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3);
            $nilaiAkhir4 = (0.1 * $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4);
            $nilaiAkhir5 = (0.1 * $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5);
            if (($nilaiAkhir1 >= 91) and ($nilaiAkhir1 <= 100)):
                $grade1 = "A";
                $mutu1 = 4;
            elseif (($nilaiAkhir1 >= 81) and ($nilaiAkhir1 <= 90)):
                $grade1 = "A-";
                $mutu1 = 3.7;
            elseif (($nilaiAkhir1 >= 76) and ($nilaiAkhir1 <= 80)):
                $grade1 = "B+";
                $mutu1 = 3.3;
            elseif (($nilaiAkhir1 >= 71) and ($nilaiAkhir1 <= 75)):
                $grade1 = "B";
                $mutu1 = 3.0;
            elseif (($nilaiAkhir1 >= 66) and ($nilaiAkhir1 <= 70)):
                $grade1 = "B-";
                $mutu1 = 2.7;
            elseif (($nilaiAkhir1 >= 61) and ($nilaiAkhir1 <= 65)):
                $grade1 = "C+";
                $mutu1 = 2.3;
            elseif (($nilaiAkhir1 >= 56) and ($nilaiAkhir1 <= 60)):
                $grade1 = "C";
                $mutu1 = 2.0;
            elseif (($nilaiAkhir1 >= 51) and ($nilaiAkhir1 <= 55)):
                $grade1 = "C-";
                $mutu1 = 1.7;
            elseif (($nilaiAkhir1 >= 36) and ($nilaiAkhir1 <= 50)):
                $grade1 = "D";
                $mutu1 = 1.0;
            elseif (($nilaiAkhir1 >= 0) and ($nilaiAkhir1 <= 35)):
                $grade1 = "E";
                $mutu1 = 0;
            endif;
            if (($nilaiAkhir2 >= 91) and ($nilaiAkhir2 <= 100)):
                $grade2 = "A";
                $mutu2 = 4;
            elseif (($nilaiAkhir2 >= 81) and ($nilaiAkhir2 <= 90)):
                $grade2 = "A-";
                $mutu2 = 3.7;
            elseif (($nilaiAkhir2 >= 76) and ($nilaiAkhir2 <= 80)):
                $grade2 = "B+";
                $mutu2 = 3.3;
            elseif (($nilaiAkhir2 >= 71) and ($nilaiAkhir2 <= 75)):
                $grade2 = "B";
                $mutu2 = 3.0;
            elseif (($nilaiAkhir2 >= 66) and ($nilaiAkhir2 <= 70)):
                $grade2 = "B-";
                $mutu2 = 2.7;
            elseif (($nilaiAkhir2 >= 61) and ($nilaiAkhir2 <= 65)):
                $grade2 = "C+";
                $mutu2 = 2.3;
            elseif (($nilaiAkhir2 >= 56) and ($nilaiAkhir2 <= 60)):
                $grade2 = "C";
                $mutu2 = 2.0;
            elseif (($nilaiAkhir2 >= 51) and ($nilaiAkhir2 <= 55)):
                $grade2 = "C-";
                $mutu2 = 1.7;
            elseif (($nilaiAkhir2 >= 36) and ($nilaiAkhir2 <= 50)):
                $grade2 = "D";
                $mutu2 = 1.0;
            elseif (($nilaiAkhir2 >= 0) and ($nilaiAkhir2 <= 35)):
                $grade2 = "E";
                $mutu2 = 0;
            endif;
            if (($nilaiAkhir3 >= 91) and ($nilaiAkhir3 <= 100)):
                $grade3 = "A";
                $mutu3 = 4;
            elseif (($nilaiAkhir3 >= 81) and ($nilaiAkhir3 <= 90)):
                $grade3 = "A-";
                $mutu3 = 3.7;
            elseif (($nilaiAkhir3 >= 76) and ($nilaiAkhir3 <= 80)):
                $grade3 = "B+";
                $mutu3 = 3.3;
            elseif (($nilaiAkhir3 >= 71) and ($nilaiAkhir3 <= 75)):
                $grade3 = "B";
                $mutu3 = 3.0;
            elseif (($nilaiAkhir3 >= 66) and ($nilaiAkhir3 <= 70)):
                $grade3 = "B-";
                $mutu3 = 2.7;
            elseif (($nilaiAkhir3 >= 61) and ($nilaiAkhir3 <= 65)):
                $grade3 = "C+";
                $mutu3 = 2.3;
            elseif (($nilaiAkhir3 >= 56) and ($nilaiAkhir3 <= 60)):
                $grade3 = "C";
                $mutu3 = 2.0;
            elseif (($nilaiAkhir3 >= 51) and ($nilaiAkhir3 <= 55)):
                $grade3 = "C-";
                $mutu3 = 1.7;
            elseif (($nilaiAkhir3 >= 36) and ($nilaiAkhir3 <= 50)):
                $grade3 = "D";
                $mutu3 = 1.0;
            elseif (($nilaiAkhir3 >= 0) and ($nilaiAkhir3 <= 35)):
                $grade3 = "E"; 
                $mutu3 = 0;
            endif;
            if (($nilaiAkhir4 >= 91) and ($nilaiAkhir4 <= 100)):
                $grade4 = "A";
                $mutu4 = 4;
            elseif (($nilaiAkhir4 >= 81) and ($nilaiAkhir4 <= 90)):
                $grade4 = "A-";
                $mutu4 = 3.7;
            elseif (($nilaiAkhir4 >= 76) and ($nilaiAkhir4 <= 80)):
                $grade4 = "B+";
                $mutu4 = 3.3;
            elseif (($nilaiAkhir4 >= 71) and ($nilaiAkhir4 <= 75)):
                $grade4 = "B";
                $mutu4 = 3.0;
            elseif (($nilaiAkhir4 >= 66) and ($nilaiAkhir4 <= 70)):
                $grade4 = "B-";
                $mutu4 = 2.7;
            elseif (($nilaiAkhir4 >= 61) and ($nilaiAkhir4 <= 65)):
                $grade4 = "C+";
                $mutu4 = 2.3;
            elseif (($nilaiAkhir4 >= 56) and ($nilaiAkhir4 <= 60)):
                $grade4 = "C";
                $mutu4 = 2.0;
            elseif (($nilaiAkhir4 >= 51) and ($nilaiAkhir4 <= 55)):
                $grade4 = "C-";
                $mutu4 = 1.7;
            elseif (($nilaiAkhir4 >= 36) and ($nilaiAkhir4 <= 50)):
                $grade4 = "D";
                $mutu4 = 1.0;
            elseif (($nilaiAkhir4 >= 0) and ($nilaiAkhir4 <= 35)):
                $grade4 = "E";
                $mutu4 = 0;
            endif;
            if (($nilaiAkhir5 >= 91) and ($nilaiAkhir5 <= 100)):
                $grade5 = "A";
                $mutu5 = 4;
            elseif (($nilaiAkhir5 >= 81) and ($nilaiAkhir5 <= 90)):
                $grade5 = "A-";
                $mutu5 = 3.7;
            elseif (($nilaiAkhir5 >= 76) and ($nilaiAkhir5 <= 80)):
                $grade5 = "B+";
                $mutu5 = 3.3;
            elseif (($nilaiAkhir5 >= 71) and ($nilaiAkhir5 <= 75)):
                $grade5 = "B";
                $mutu5 = 3.0;
            elseif (($nilaiAkhir5 >= 66) and ($nilaiAkhir5 <= 70)):
                $grade5 = "B-";
                $mutu5 = 2.7;
            elseif (($nilaiAkhir5 >= 61) and ($nilaiAkhir5 <= 65)):
                $grade5 = "C+";
                $mutu5 = 2.3;
            elseif (($nilaiAkhir5 >= 56) and ($nilaiAkhir5 <= 60)):
                $grade5 = "C";
                $mutu5 = 2.0;
            elseif (($nilaiAkhir5 >= 51) and ($nilaiAkhir5 <= 55)):
                $grade5 = "C-";
                $mutu5 = 1.7;
            elseif (($nilaiAkhir5 >= 36) and ($nilaiAkhir5 <= 50)):
                $grade5 = "D";
                $mutu5 = 1.0;
            elseif (($nilaiAkhir5 >= 0) and ($nilaiAkhir5 <= 35)):
                $grade5 = "E";
                $mutu5 = 0;
            endif;
            if ($nilaiHadir1 < 70):
                $grade1 = "E";
            endif;
            if ($nilaiHadir2 < 70):
                $grade2 = "E";
            endif;
            if ($nilaiHadir3 < 70):
                $grade3 = "E";
            endif;
            if ($nilaiHadir4 < 70):
                $grade4 = "E";
            endif;
            if ($nilaiHadir5 < 70):
                $grade5 = "E";
            endif;
            #Bobot = angkaMutu * sksMatkul
            $bobot1 = $mutu1 * $sksMatkul1;
            $bobot2 = $mutu2 * $sksMatkul2;
            $bobot3 = $mutu3 * $sksMatkul3;
            $bobot4 = $mutu4 * $sksMatkul4;
            $bobot5 = $mutu5 * $sksMatkul5;
            /*
            Grade A, A-, B+, B, B-, C+, C, C- maka Status: LULUS
            Grade D, E maka Status: GAGAL
            Disini case A sampai C- menggunakan format simple tapi panjang untuk memudahkan pembacaan
            Disini case D dan E menggunakan format gabungan yang lebih singkat dan padat
            */
            switch ($grade1):
                case "A": $status1 = "LULUS"; break;
                case "A-": $status1 = "LULUS"; break;
                case "B+": $status1 = "LULUS"; break;
                case "B": $status1 = "LULUS"; break;
                case "B-": $status1 = "LULUS"; break;
                case "C+": $status1 = "LULUS"; break;
                case "C": $status1 = "LULUS"; break;
                case "C-": $status1 = "LULUS"; break;
                case "D":
                case "E":
                    $status1 = "GAGAL";
                    break;
            endswitch;
            switch ($grade2):
                case "A": $status2 = "LULUS"; break;
                case "A-": $status2 = "LULUS"; break;
                case "B+": $status2 = "LULUS"; break;
                case "B": $status2 = "LULUS"; break;
                case "B-": $status2 = "LULUS"; break;
                case "C+": $status2 = "LULUS"; break;
                case "C": $status2 = "LULUS"; break;
                case "C-": $status2 = "LULUS"; break;
                case "D":
                case "E":
                    $status2 = "GAGAL";
                    break;
            endswitch;
            switch ($grade2):
                case "A": $status2 = "LULUS"; break;
                case "A-": $status2 = "LULUS"; break;
                case "B+": $status2 = "LULUS"; break;
                case "B": $status2 = "LULUS"; break;
                case "B-": $status2 = "LULUS"; break;
                case "C+": $status2 = "LULUS"; break;
                case "C": $status2 = "LULUS"; break;
                case "C-": $status2 = "LULUS"; break;
                case "D":
                case "E":
                    $status2 = "GAGAL";
                    break;
            endswitch;
            switch ($grade3):
                case "A": $status3 = "LULUS"; break;
                case "A-": $status3 = "LULUS"; break;
                case "B+": $status3 = "LULUS"; break;
                case "B": $status3 = "LULUS"; break;
                case "B-": $status3 = "LULUS"; break;
                case "C+": $status3 = "LULUS"; break;
                case "C": $status3 = "LULUS"; break;
                case "C-": $status3 = "LULUS"; break;
                case "D":
                case "E":
                    $status3 = "GAGAL";
                    break;
            endswitch;
            switch ($grade4):
                case "A": $status4 = "LULUS"; break;
                case "A-": $status4 = "LULUS"; break;
                case "B+": $status4 = "LULUS"; break;
                case "B": $status4 = "LULUS"; break;
                case "B-": $status4 = "LULUS"; break;
                case "C+": $status4 = "LULUS"; break;
                case "C": $status4 = "LULUS"; break;
                case "C-": $status4 = "LULUS"; break;
                case "D":
                case "E":
                    $status4 = "GAGAL";
                    break;
            endswitch;
            switch ($grade5):
                case "A": $status5 = "LULUS"; break;
                case "A-": $status5 = "LULUS"; break;
                case "B+": $status5 = "LULUS"; break;
                case "B": $status5 = "LULUS"; break;
                case "B-": $status5 = "LULUS"; break;
                case "C+": $status5 = "LULUS"; break;
                case "C": $status5 = "LULUS"; break;
                case "C-": $status5 = "LULUS"; break;
                case "D":
                case "E":
                    $status5 = "GAGAL";
                    break;
            endswitch;
            $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
            $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
            #IPK = totalBobot / totalSKS
            $IPK = $totalBobot / $totalSKS;
            ?>
            <h2>Nilai Saya</h2>
            <p><strong>Nama Matakuliah ke-1:</strong> <?php echo $namaMatkul1;?></p>
            <p><strong>SKS:</strong> <?php echo $sksMatkul1 ?></p>
            <p><strong>Kehadiran:</strong> <?php echo $nilaiHadir1 ?></p>
            <p><strong>Tugas:</strong> <?php echo $nilaiTugas1 ?></p>
            <p><strong>UTS:</strong> <?php echo $nilaiUTS1 ?></p>
            <p><strong>UAS:</strong> <?php echo $nilaiUAS1 ?></p>
            <p><strong>Nilai Akhir:</strong> <?php echo $nilaiAkhir1 ?></p>
            <p><strong>Grade:</strong> <?php echo $grade1 ?></p>
            <p><strong>Angka Mutu:</strong> <?php echo $mutu1 ?></p>
            <p><strong>Bobot:</strong> <?php echo $bobot1 ?></p>
            <p><strong>Status:</strong> <?php echo $status1 ?></p>
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