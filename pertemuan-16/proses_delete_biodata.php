<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

// Get ID from URL
$ccid = isset($_GET['ccid']) ? (int)$_GET['ccid'] : 0;

if ($ccid === 0) {
  $_SESSION['flash_error'] = 'Data tidak valid!';
  header('Location: read.php');
  exit;
}

// Prepare DELETE query
$sql = "DELETE FROM biodatapengunjung WHERE CCid = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Error: ' . mysqli_error($conn);
  header('Location: read.php');
  exit;
}

// Bind parameters
mysqli_stmt_bind_param($stmt, 'i', $ccid);

// Execute query
if (mysqli_stmt_execute($stmt)) {
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    $_SESSION['flash_sukses'] = 'Data Biodata Pengunjung berhasil dihapus!';
  } else {
    $_SESSION['flash_error'] = 'Data tidak ditemukan!';
  }
  mysqli_stmt_close($stmt);
  header('Location: read.php');
  exit;
} else {
  $_SESSION['flash_error'] = 'Error: ' . mysqli_stmt_error($stmt);
  mysqli_stmt_close($stmt);
  header('Location: read.php');
  exit;
}
?>
