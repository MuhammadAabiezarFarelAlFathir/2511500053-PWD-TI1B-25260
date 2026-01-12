<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

#ambil dan bersihkan nilai dari form
$nama  = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat_lahir = bersihkan($_POST['txtT4Lhr'] ?? '');
$tanggal_lahir = bersihkan($_POST['txtTglLhr'] ?? '');
$hobi = bersihkan($_POST['txtHobi'] ?? '');
$pasangan = bersihkan($_POST['txtPasangan'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$orangtua = bersihkan($_POST['txtNmOrtu'] ?? '');
$kakak = bersihkan($_POST['txtNmKakak'] ?? '');
$adik = bersihkan($_POST['txtNmAdik'] ?? '');

#Validasi sederhana
$errors = [];

if ($nama === '') {
  $errors[] = 'Nama wajib diisi.';
}

if ($tempat_lahir === '') {
  $errors[] = 'Tempat Lahir wajib diisi.';
}

if ($tanggal_lahir === '') {
  $errors[] = 'Tanggal Lahir wajib diisi.';
}

if ($hobi === '') {
  $errors[] = 'Hobi wajib diisi.';
}

if ($pasangan === '') {
  $errors[] = 'Pasangan wajib diisi.';
}

if ($pekerjaan === '') {
  $errors[] = 'Pekerjaan wajib diisi.';
}

if ($orangtua === '') {
  $errors[] = 'Nama Orang Tua wajib diisi.';
}

if ($kakak === '') {
  $errors[] = 'Nama Kakak wajib diisi.';
}

if ($adik === '') {
  $errors[] = 'Nama Adik wajib diisi.';
}

if (mb_strlen($nama) < 3) {
  $errors[] = 'Nama minimal 3 karakter.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['old'] = [
    'nama'  => $nama,
    'tempat_lahir' => $tempat_lahir,
    'tanggal_lahir' => $tanggal_lahir,
    'hobi' => $hobi,
    'pasangan' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'orangtua' => $orangtua,
    'kakak' => $kakak,
    'adik' => $adik,
  ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO biodatasederhanamahasiswa (cnama, ctempat_lahir, ctanggal_lahir, chobi, cpasangan, cpekerjaan, corangtua, ckakak, cadik) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}

#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "sssssssss", $nama, $tempat_lahir, $tanggal_lahir, $hobi, $pasangan, $pekerjaan, $orangtua, $kakak, $adik);

if (mysqli_stmt_execute($stmt)) {
  #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Data biodata berhasil ditambahkan!';
  redirect_ke('index.php#biodata');
} else {
  #jika gagal eksekusi, beri pesan error
  $_SESSION['flash_error'] = 'Terjadi kesalahan saat menyimpan data: ' . mysqli_error($conn);
  redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
