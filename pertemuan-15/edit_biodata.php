<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $ccid = filter_input(INPUT_GET, 'ccid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$ccid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
  }

  $stmt = mysqli_prepare($conn, "SELECT ccid, cnama, ctempat_lahir, ctanggal_lahir, chobi, cpasangan, cpekerjaan, corangtua, ckakak, cadik 
                                    FROM biodatasederhanamahasiswa WHERE ccid = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $ccid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
  }

  $nama  = $row['cnama'] ?? '';
  $tempat_lahir = $row['ctempat_lahir'] ?? '';
  $tanggal_lahir = $row['ctanggal_lahir'] ?? '';
  $hobi = $row['chobi'] ?? '';
  $pasangan = $row['cpasangan'] ?? '';
  $pekerjaan = $row['cpekerjaan'] ?? '';
  $orangtua = $row['corangtua'] ?? '';
  $kakak = $row['ckakak'] ?? '';
  $adik = $row['cadik'] ?? '';

  $flash_error = $_SESSION['flash_error'] ?? '';
  $flash_sukses = $_SESSION['flash_sukses'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['flash_sukses'], $_SESSION['old']);
  
  if (!empty($old)) {
    $nama  = $old['nama'] ?? $nama;
    $tempat_lahir = $old['tempat_lahir'] ?? $tempat_lahir;
    $tanggal_lahir = $old['tanggal_lahir'] ?? $tanggal_lahir;
    $hobi = $old['hobi'] ?? $hobi;
    $pasangan = $old['pasangan'] ?? $pasangan;
    $pekerjaan = $old['pekerjaan'] ?? $pekerjaan;
    $orangtua = $old['orangtua'] ?? $orangtua;
    $kakak = $old['kakak'] ?? $kakak;
    $adik = $old['adik'] ?? $adik;
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Sistem Manajemen Biodata</h1>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
      <nav>
        <ul>
          <li><a href="index.php#biodata">Biodata</a></li>
          <li><a href="read.php">Data</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="contact">
        <h2>Edit Biodata Mahasiswa</h2>
        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
        <form action="proses_update_biodata.php" method="POST">

          <input type="text" name="ccid" value="<?= (int)$ccid; ?>">

          <label for="txtNmLengkap"><span>Nama Lengkap:</span>
            <input type="text" id="txtNmLengkap" name="txtNmLengkap" 
              placeholder="Masukkan Nama Lengkap" required autocomplete="name"
              value="<?= htmlspecialchars($nama); ?>">
          </label>

          <label for="txtT4Lhr"><span>Tempat Lahir:</span>
            <input type="text" id="txtT4Lhr" name="txtT4Lhr" 
              placeholder="Masukkan Tempat Lahir"
              value="<?= htmlspecialchars($tempat_lahir); ?>">
          </label>

          <label for="txtTglLhr"><span>Tanggal Lahir:</span>
            <input type="date" id="txtTglLhr" name="txtTglLhr" 
              value="<?= htmlspecialchars($tanggal_lahir); ?>">
          </label>

          <label for="txtHobi"><span>Hobi:</span>
            <input type="text" id="txtHobi" name="txtHobi" 
              placeholder="Masukkan Hobi"
              value="<?= htmlspecialchars($hobi); ?>">
          </label>

          <label for="txtPasangan"><span>Pasangan:</span>
            <input type="text" id="txtPasangan" name="txtPasangan" 
              placeholder="Masukkan Pasangan"
              value="<?= htmlspecialchars($pasangan); ?>">
          </label>

          <label for="txtKerja"><span>Pekerjaan:</span>
            <input type="text" id="txtKerja" name="txtKerja" 
              placeholder="Masukkan Pekerjaan"
              value="<?= htmlspecialchars($pekerjaan); ?>">
          </label>

          <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
            <input type="text" id="txtNmOrtu" name="txtNmOrtu" 
              placeholder="Masukkan Nama Orang Tua"
              value="<?= htmlspecialchars($orangtua); ?>">
          </label>

          <label for="txtNmKakak"><span>Nama Kakak:</span>
            <input type="text" id="txtNmKakak" name="txtNmKakak" 
              placeholder="Masukkan Nama Kakak"
              value="<?= htmlspecialchars($kakak); ?>">
          </label>

          <label for="txtNmAdik"><span>Nama Adik:</span>
            <input type="text" id="txtNmAdik" name="txtNmAdik" 
              placeholder="Masukkan Nama Adik"
              value="<?= htmlspecialchars($adik); ?>">
          </label>

          <label for="txtCaptcha"><span>Captcha 9 + 10 (Jawaban e 21)</span>
            <input type="number" id="txtCaptcha" name="txtCaptcha" 
              placeholder="Jawab Pertanyaan..." required>
          </label>

          <button type="submit">Simpan</button>
          <button type="reset">Batal</button>
          <a href="read.php" class="reset">Kembali ke Data</a>
        </form>
      </section>
    </main>

    <footer>
      <p>&copy; 2025 Biodata Management System</p>
    </footer>

    <script src="script.js"></script>
  </body>
</html>
