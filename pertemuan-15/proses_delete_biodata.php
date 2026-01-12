<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  $ccid = filter_input(INPUT_GET, 'ccid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$ccid) {
    $_SESSION['flash_error'] = 'CCID Tidak Valid.';
    redirect_ke('read.php');
  }

  $stmt = mysqli_prepare($conn, "DELETE FROM biodatasederhanamahasiswa
                                WHERE ccid = ?");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('read.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $ccid);

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus!';
    redirect_ke('read.php');
  } else {
    $_SESSION['flash_error'] = 'Terjadi kesalahan saat menghapus data.';
    redirect_ke('read.php');
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
?>
