<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
  }

  $ccid = filter_input(INPUT_POST, 'ccid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$ccid) {
    $_SESSION['flash_error'] = 'CCID Tidak Valid.';
    redirect_ke('read.php');
  }

  $nama = bersihkan($_POST['txtNmLengkap'] ?? '');
  $tempat_lahir = bersihkan($_POST['txtT4Lhr'] ?? '');
  $tanggal_lahir = !empty($_POST['txtTglLhr']) ? $_POST['txtTglLhr'] : NULL;
  $hobi = bersihkan($_POST['txtHobi'] ?? '');
  $pasangan = bersihkan($_POST['txtPasangan'] ?? '');
  $pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
  $orangtua = bersihkan($_POST['txtNmOrtu'] ?? '');
  $kakak = bersihkan($_POST['txtNmKakak'] ?? '');
  $adik = bersihkan($_POST['txtNmAdik'] ?? '');
  $captcha = bersihkan($_POST['txtCaptcha'] ?? '');

  $errors = [];

  if ($nama === '') {
    $errors[] = 'Nama Lengkap wajib diisi.';
  }

  if (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
  }

  if ($captcha === '') {
    $errors[] = 'Pertanyaan captcha wajib diisi.';
  }

  if ($captcha !== '21') {
    $errors[] = 'Jawaban captcha salah.';
  }

  if (!empty($errors)) {
    $_SESSION['old'] = [
      'nama' => $nama,
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
    redirect_ke('edit_biodata.php?ccid=' . $ccid);
  }

  $stmt = mysqli_prepare($conn, "UPDATE biodatasederhanamahasiswa 
                                SET cnama = ?, ctempat_lahir = ?, ctanggal_lahir = ?, 
                                    chobi = ?, cpasangan = ?, cpekerjaan = ?, 
                                    corangtua = ?, ckakak = ?, cadik = ? 
                                WHERE ccid = ?");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal): ' . mysqli_error($conn);
    redirect_ke('edit_biodata.php?ccid=' . $ccid);
  }

  mysqli_stmt_bind_param($stmt, "ssssssssii", $nama, $tempat_lahir, $tanggal_lahir, $hobi, $pasangan, $pekerjaan, $orangtua, $kakak, $adik, $ccid);

  if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);
    $_SESSION['flash_sukses'] = 'Data biodata berhasil diperbarui!';
    redirect_ke('read.php');
  } else {
    $_SESSION['old'] = [
      'nama' => $nama,
      'tempat_lahir' => $tempat_lahir,
      'tanggal_lahir' => $tanggal_lahir,
      'hobi' => $hobi,
      'pasangan' => $pasangan,
      'pekerjaan' => $pekerjaan,
      'orangtua' => $orangtua,
      'kakak' => $kakak,
      'adik' => $adik,
    ];
    $_SESSION['flash_error'] = 'Terjadi kesalahan saat menyimpan data: ' . mysqli_error($conn);
    redirect_ke('edit_biodata.php?ccid=' . $ccid);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
?>
