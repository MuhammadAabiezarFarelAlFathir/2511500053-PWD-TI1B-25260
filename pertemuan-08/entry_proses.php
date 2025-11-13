<?php
session_start();

$_SESSION['nim'] = isset($_POST['nim']) ? trim($_POST['nim']) : '';
$_SESSION['namaLengkap'] = isset($_POST['namaLengkap']) ? trim($_POST['namaLengkap']) : '';
$_SESSION['tempatLahir'] = isset($_POST['tempatLahir']) ? trim($_POST['tempatLahir']) : '';
$_SESSION['tanggalLahir'] = isset($_POST['tanggalLahir']) ? trim($_POST['tanggalLahir']) : '';
$_SESSION['hobi'] = isset($_POST['hobi']) ? trim($_POST['hobi']) : '';
$_SESSION['pasangan'] = isset($_POST['pasangan']) ? trim($_POST['pasangan']) : '';
$_SESSION['pekerjaan'] = isset($_POST['pekerjaan']) ? trim($_POST['pekerjaan']) : '';
$_SESSION['namaOrtu'] = isset($_POST['namaOrtu']) ? trim($_POST['namaOrtu']) : '';
$_SESSION['namaKakak'] = isset($_POST['namaKakak']) ? trim($_POST['namaKakak']) : '';
$_SESSION['namaAdik'] = isset($_POST['namaAdik']) ? trim($_POST['namaAdik']) : '';

header('Location: index.php#about');
exit;
?>