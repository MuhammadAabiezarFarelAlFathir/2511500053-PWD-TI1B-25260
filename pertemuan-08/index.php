<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;

$sesnim = "";
if (isset($_SESSION["nim"])):
  $sesnim = $_SESSION["nim"];
endif;

$sesnamalengkap = "";
if (isset($_SESSION["namaLengkap"])):
  $sesnamalengkap = $_SESSION["namaLengkap"];
endif;

$sestempatlahir = "";
if (isset($_SESSION["tempatLahir"])):
  $sestempatlahir = $_SESSION["tempatLahir"];
endif;

$sestanggallahir = "";
if (isset($_SESSION["tanggalLahir"])):
  $sestanggallahir = $_SESSION["tanggalLahir"];
endif;

$seshobi = "";
if (isset($_SESSION["hobi"])):
  $seshobi = $_SESSION["hobi"];
endif;

$sespasangan = "";
if (isset($_SESSION["pasangan"])):
  $sespasangan = $_SESSION["pasangan"];
endif;

$sespekerjaan = "";
if (isset($_SESSION["pekerjaan"])):
  $sespekerjaan = $_SESSION["pekerjaan"];
endif;

$sesnamaortu = "";
if (isset($_SESSION["namaOrtu"])):
  $sesnamaortu = $_SESSION["namaOrtu"];
endif;

$sesnamakakak = "";
if (isset($_SESSION["namaKakak"])):
  $sesnamakakak = $_SESSION["namaKakak"];
endif;
$sesnamaadik = "";
if (isset($_SESSION["namaAdik"])):
  $sesnamaadik = $_SESSION["namaAdik"];
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#entry">Entry Data</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      ?>
    </section>

    <section id="entry">
      <h2>Entry Data Mahasiswa</h2>
      <form action="entry_proses.php" method="POST">

        <label for="nim"><span>NIM:</span>
          <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" autocomplete="off">
        </label>

        <label for="namaLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="namaLengkap" name="namaLengkap" placeholder="Masukkan nama lengkap" autocomplete="name">
        </label>

        <label for="tempatLahir"><span>Tempat Lahir:</span>
          <input type="text" id="tempatLahir" name="tempatLahir" placeholder="Masukkan tempat lahir">
        </label>

        <label for="tanggalLahir"><span>Tanggal Lahir:</span>
          <input type="date" id="tanggalLahir" name="tanggalLahir">
        </label>

        <label for="hobi"><span>Hobi:</span>
          <input type="text" id="hobi" name="hobi" placeholder="Masukkan hobi">
        </label>

        <label for="pasangan"><span>Pasangan:</span>
          <input type="text" id="pasangan" name="pasangan" placeholder="Status pasangan (opsional)">
        </label>

        <label for="pekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan">
        </label>

        <label for="namaOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="namaOrtu" name="namaOrtu" placeholder="Masukkan nama orang tua">
        </label>

        <label for="namaKakak"><span>Nama Kakak:</span>
          <input type="text" id="namaKakak" name="namaKakak" placeholder="Masukkan nama kakak">
        </label>

        <label for="namaAdik"><span>Nama Adik:</span>
          <input type="text" id="namaAdik" name="namaAdik" placeholder="Masukkan nama adik">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <h2>Tentang Kami</h2>
      <p><strong>NIM :</strong> <?php echo htmlspecialchars($sesnim); ?></p>
      <p><strong>Nama Lengkap :</strong> <?php echo htmlspecialchars($sesnamalengkap); ?></p>
      <p><strong>Tempat Lahir :</strong> <?php echo htmlspecialchars($sestempatlahir); ?></p>
      <p><strong>Tanggal Lahir :</strong> <?php echo htmlspecialchars($sestanggallahir); ?></p>
      <p><strong>Hobi :</strong> <?php echo htmlspecialchars($seshobi); ?></p>
      <p><strong>Pasangan :</strong> <?php echo htmlspecialchars($sespasangan); ?></p>
      <p><strong>Pekerjaan :</strong> <?php echo htmlspecialchars($sespekerjaan); ?></p>
      <p><strong>Nama Orang Tua :</strong> <?php echo htmlspecialchars($sesnamaortu); ?></p>
      <p><strong>Nama Kakak :</strong> <?php echo htmlspecialchars($sesnamakakak); ?></p>
      <p><strong>Nama Adik :</strong> <?php echo htmlspecialchars($sesnamaadik); ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>