<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.php');
  exit;
}

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

// Sanitize data for database
$ckode_pengunjung = htmlspecialchars($ckode_pengunjung, ENT_QUOTES, 'UTF-8');
$cnama_pengunjung = htmlspecialchars($cnama_pengunjung, ENT_QUOTES, 'UTF-8');
$calamat_rumah = htmlspecialchars($calamat_rumah, ENT_QUOTES, 'UTF-8');
$ctanggal_kunjungan = htmlspecialchars($ctanggal_kunjungan, ENT_QUOTES, 'UTF-8');
$chobi = htmlspecialchars($chobi, ENT_QUOTES, 'UTF-8');
$casal_slta = htmlspecialchars($casal_slta, ENT_QUOTES, 'UTF-8');
$cpekerjaan = htmlspecialchars($cpekerjaan, ENT_QUOTES, 'UTF-8');
$cnama_orangtua = htmlspecialchars($cnama_orangtua, ENT_QUOTES, 'UTF-8');
$cnama_pacar = htmlspecialchars($cnama_pacar, ENT_QUOTES, 'UTF-8');
$cnama_mantan = htmlspecialchars($cnama_mantan, ENT_QUOTES, 'UTF-8');

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
?>
