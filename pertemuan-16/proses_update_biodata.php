<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: read.php');
  exit;
}

// Get ID
$ccid = isset($_POST['ccid']) ? (int)$_POST['ccid'] : 0;

if ($ccid === 0) {
  $_SESSION['flash_error'] = 'Data tidak valid!';
  header('Location: read.php');
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
  $errors[] = 'Kode Pengunjung tidak boleh kosong';
}

if (empty($cnama_pengunjung)) {
  $errors[] = 'Nama Pengunjung tidak boleh kosong';
}

if (empty($calamat_rumah)) {
  $errors[] = 'Alamat Rumah tidak boleh kosong';
}

if (empty($ctanggal_kunjungan)) {
  $errors[] = 'Tanggal Kunjungan tidak boleh kosong';
}

if (empty($chobi)) {
  $errors[] = 'Hobi tidak boleh kosong';
}

if (empty($casal_slta)) {
  $errors[] = 'Asal SLTA tidak boleh kosong';
}

if (empty($cpekerjaan)) {
  $errors[] = 'Pekerjaan tidak boleh kosong';
}

if (empty($cnama_orangtua)) {
  $errors[] = 'Nama Orang Tua tidak boleh kosong';
}

if (empty($cnama_pacar)) {
  $errors[] = 'Nama Pacar tidak boleh kosong';
}

if (empty($cnama_mantan)) {
  $errors[] = 'Nama Mantan tidak boleh kosong';
}

// If there are errors, redirect back
if (!empty($errors)) {
  $_SESSION['flash_error'] = 'Semua field harus diisi!';
  header('Location: edit_biodata.php?ccid=' . $ccid);
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

// Prepare UPDATE query
$sql = "UPDATE biodatapengunjung SET 
  CKodePengunjung = ?,
  CNamaPengunjung = ?,
  CAlamatRumah = ?,
  CTanggalKunjungan = ?,
  CHobi = ?,
  CAsalSLTA = ?,
  CPekerjaan = ?,
  CNamaOrangTua = ?,
  CNamaPacar = ?,
  CNamaMantan = ?
WHERE CCid = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Error: ' . mysqli_error($conn);
  header('Location: edit_biodata.php?ccid=' . $ccid);
  exit;
}

// Bind parameters
mysqli_stmt_bind_param(
  $stmt,
  'ssssssssssi',
  $ckode_pengunjung,
  $cnama_pengunjung,
  $calamat_rumah,
  $ctanggal_kunjungan,
  $chobi,
  $casal_slta,
  $cpekerjaan,
  $cnama_orangtua,
  $cnama_pacar,
  $cnama_mantan,
  $ccid
);

// Execute query
if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data Biodata Pengunjung berhasil diupdate!';
  mysqli_stmt_close($stmt);
  header('Location: read.php');
  exit;
} else {
  $_SESSION['flash_error'] = 'Error: ' . mysqli_stmt_error($stmt);
  mysqli_stmt_close($stmt);
  header('Location: edit_biodata.php?ccid=' . $ccid);
  exit;
}
?>
