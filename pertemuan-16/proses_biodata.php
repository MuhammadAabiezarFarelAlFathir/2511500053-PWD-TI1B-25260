<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.php');
  exit;
}

// Check if this is a confirmation submission
$is_confirmation = isset($_POST['confirm']) && $_POST['confirm'] === 'yes';

// Retrieve and sanitize input data
$ckode_pengunjung = isset($_POST['txtKodePen']) ? trim($_POST['txtKodePen']) : '';
$cnama_pengunjung = isset($_POST['txtNmPengunjung']) ? trim($_POST['txtNmPengunjung']) : '';
$calamat_rumah = isset($_POST['txtAlRmh']) ? trim($_POST['txtAlRmh']) : '';
$ctanggal_kunjungan = isset($_POST['txtTglKunjungan']) ? trim($_POST['txtTglKunjungan']) : '';
$chobi = isset($_POST['txtHobi']) ? trim($_POST['txtHobi']) : '';
$casal_slta = isset($_POST['txtAsalSMA']) ? trim($_POST['txtAsalSMA']) : '';
$cpekerjaan = isset($_POST['txtKerja']) ? trim($_POST['txtKerja']) : '';
$cnama_orangtua = isset($_POST['txtNmOrtu']) ? trim($_POST['txtNmOrtu']) : '';
$cnama_pacar = isset($_POST['txtNmPacar']) ? trim($_POST['txtNmPacar']) : '';
$cnama_mantan = isset($_POST['txtNmMantan']) ? trim($_POST['txtNmMantan']) : '';

// Validation
$errors = [];

if (empty($ckode_pengunjung)) {
  $errors['txtKodePen'] = 'Kode Pengunjung tidak boleh kosong';
}

if (empty($cnama_pengunjung)) {
  $errors['txtNmPengunjung'] = 'Nama Pengunjung tidak boleh kosong';
}

if (empty($calamat_rumah)) {
  $errors['txtAlRmh'] = 'Alamat Rumah tidak boleh kosong';
}

if (empty($ctanggal_kunjungan)) {
  $errors['txtTglKunjungan'] = 'Tanggal Kunjungan tidak boleh kosong';
}

if (empty($chobi)) {
  $errors['txtHobi'] = 'Hobi tidak boleh kosong';
}

if (empty($casal_slta)) {
  $errors['txtAsalSMA'] = 'Asal SLTA tidak boleh kosong';
}

if (empty($cpekerjaan)) {
  $errors['txtKerja'] = 'Pekerjaan tidak boleh kosong';
}

if (empty($cnama_orangtua)) {
  $errors['txtNmOrtu'] = 'Nama Orang Tua tidak boleh kosong';
}

if (empty($cnama_pacar)) {
  $errors['txtNmPacar'] = 'Nama Pacar tidak boleh kosong';
}

if (empty($cnama_mantan)) {
  $errors['txtNmMantan'] = 'Nama Mantan tidak boleh kosong';
}

// If there are errors, use PRG pattern to redirect with error message
if (!empty($errors)) {
  $_SESSION['flash_error'] = 'Semua field harus diisi!';
  $_SESSION['old'] = [
    'kodepen' => $ckode_pengunjung,
    'nama' => $cnama_pengunjung,
    'alamat' => $calamat_rumah,
    'tanggal' => $ctanggal_kunjungan,
    'hobi' => $chobi,
    'slta' => $casal_slta,
    'pekerjaan' => $cpekerjaan,
    'ortu' => $cnama_orangtua,
    'pacar' => $cnama_pacar,
    'mantan' => $cnama_mantan,
  ];
  header('Location: index.php');
  exit;
}

// Sanitize data for display and database
$ckode_pengunjung_html = htmlspecialchars($ckode_pengunjung, ENT_QUOTES, 'UTF-8');
$cnama_pengunjung_html = htmlspecialchars($cnama_pengunjung, ENT_QUOTES, 'UTF-8');
$calamat_rumah_html = htmlspecialchars($calamat_rumah, ENT_QUOTES, 'UTF-8');
$ctanggal_kunjungan_html = htmlspecialchars($ctanggal_kunjungan, ENT_QUOTES, 'UTF-8');
$chobi_html = htmlspecialchars($chobi, ENT_QUOTES, 'UTF-8');
$casal_slta_html = htmlspecialchars($casal_slta, ENT_QUOTES, 'UTF-8');
$cpekerjaan_html = htmlspecialchars($cpekerjaan, ENT_QUOTES, 'UTF-8');
$cnama_orangtua_html = htmlspecialchars($cnama_orangtua, ENT_QUOTES, 'UTF-8');
$cnama_pacar_html = htmlspecialchars($cnama_pacar, ENT_QUOTES, 'UTF-8');
$cnama_mantan_html = htmlspecialchars($cnama_mantan, ENT_QUOTES, 'UTF-8');

// If confirmation is submitted, insert into database
if ($is_confirmation) {
  // Prepare INSERT query
  $sql = "INSERT INTO biodatapengunjung (
    CKodePengunjung, 
    CNamaPengunjung, 
    CAlamatRumah, 
    CTanggalKunjungan, 
    CHobi, 
    CAsalSLTA, 
    CPekerjaan, 
    CNamaOrangTua, 
    CNamaPacar, 
    CNamaMantan
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  if (!$stmt) {
    $_SESSION['flash_error'] = 'Error: ' . mysqli_error($conn);
    header('Location: index.php');
    exit;
  }

  // Bind parameters
  mysqli_stmt_bind_param(
    $stmt,
    'ssssssssss',
    $ckode_pengunjung,
    $cnama_pengunjung,
    $calamat_rumah,
    $ctanggal_kunjungan,
    $chobi,
    $casal_slta,
    $cpekerjaan,
    $cnama_orangtua,
    $cnama_pacar,
    $cnama_mantan
  );

  // Execute query
  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data Biodata Pengunjung berhasil ditambahkan!';
    mysqli_stmt_close($stmt);
    header('Location: index.php');
    exit;
  } else {
    $_SESSION['flash_error'] = 'Error: ' . mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    header('Location: index.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Biodata Pengunjung</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Konfirmasi Biodata Pengunjung</h1>
  </header>

  <main>
    <section id="confirm-biodata">
      <h2>Verifikasi Data Anda</h2>
      <p>Mohon periksa kembali data yang Anda kirimkan sebelum melanjutkan:</p>

      <form action="proses_biodata.php" method="POST" style="margin: 20px 0;">
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-bottom: 20px;">
          <tr>
            <td><strong>Kode Pengunjung:</strong></td>
            <td><?= $ckode_pengunjung_html; ?></td>
          </tr>
          <tr>
            <td><strong>Nama Pengunjung:</strong></td>
            <td><?= $cnama_pengunjung_html; ?></td>
          </tr>
          <tr>
            <td><strong>Alamat Rumah:</strong></td>
            <td><?= $calamat_rumah_html; ?></td>
          </tr>
          <tr>
            <td><strong>Tanggal Kunjungan:</strong></td>
            <td><?= $ctanggal_kunjungan_html; ?></td>
          </tr>
          <tr>
            <td><strong>Hobi:</strong></td>
            <td><?= $chobi_html; ?></td>
          </tr>
          <tr>
            <td><strong>Asal SLTA:</strong></td>
            <td><?= $casal_slta_html; ?></td>
          </tr>
          <tr>
            <td><strong>Pekerjaan:</strong></td>
            <td><?= $cpekerjaan_html; ?></td>
          </tr>
          <tr>
            <td><strong>Nama Orang Tua:</strong></td>
            <td><?= $cnama_orangtua_html; ?></td>
          </tr>
          <tr>
            <td><strong>Nama Pacar:</strong></td>
            <td><?= $cnama_pacar_html; ?></td>
          </tr>
          <tr>
            <td><strong>Nama Mantan:</strong></td>
            <td><?= $cnama_mantan_html; ?></td>
          </tr>
        </table>

        <!-- Hidden fields to preserve data -->
        <input type="hidden" name="txtKodePen" value="<?= $ckode_pengunjung_html; ?>">
        <input type="hidden" name="txtNmPengunjung" value="<?= $cnama_pengunjung_html; ?>">
        <input type="hidden" name="txtAlRmh" value="<?= $calamat_rumah_html; ?>">
        <input type="hidden" name="txtTglKunjungan" value="<?= $ctanggal_kunjungan_html; ?>">
        <input type="hidden" name="txtHobi" value="<?= $chobi_html; ?>">
        <input type="hidden" name="txtAsalSMA" value="<?= $casal_slta_html; ?>">
        <input type="hidden" name="txtKerja" value="<?= $cpekerjaan_html; ?>">
        <input type="hidden" name="txtNmOrtu" value="<?= $cnama_orangtua_html; ?>">
        <input type="hidden" name="txtNmPacar" value="<?= $cnama_pacar_html; ?>">
        <input type="hidden" name="txtNmMantan" value="<?= $cnama_mantan_html; ?>">
        <input type="hidden" name="confirm" value="yes">

        <button type="submit" name="action" value="confirm">Konfirmasi & Simpan</button>
        <a href="index.php" style="display: inline-block; padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Kembali Ubah</a>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2025. All rights reserved.</p>
  </footer>
  <script src="script.js"></script>
</body>

</html>
