<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql_tamu = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
  $q_tamu = mysqli_query($conn, $sql_tamu);
  if (!$q_tamu) {
    die("Query error: " . mysqli_error($conn));
  }

  $sql_biodata = "SELECT * FROM biodatasederhanamahasiswa ORDER BY ccid DESC";
  $q_biodata = mysqli_query($conn, $sql_biodata);
  if (!$q_biodata) {
    die("Query error: " . mysqli_error($conn));
  }
?>

<?php
  $flash_sukses = $_SESSION['flash_sukses'] ?? ''; #jika query sukses
  $flash_error  = $_SESSION['flash_error'] ?? ''; #jika ada error
  #bersihkan session ini
  unset($_SESSION['flash_sukses'], $_SESSION['flash_error']); 
?>

<?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
<?php endif; ?>

<h2>Data Tamu</h2>
<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
    <th>Created At</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q_tamu)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?cid=<?= (int)$row['cid']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['cnama']); ?>?')" href="proses_delete.php?cid=<?= (int)$row['cid']; ?>">Delete</a>
      </td>
      <td><?= $row['cid']; ?></td>
      <td><?= htmlspecialchars($row['cnama']); ?></td>
      <td><?= htmlspecialchars($row['cemail']); ?></td>
      <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
      <td><?= formatTanggal(htmlspecialchars($row['dcreated_at'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<h2>Data Biodata Mahasiswa</h2>
<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Hobi</th>
    <th>Pasangan</th>
    <th>Pekerjaan</th>
    <th>Orang Tua</th>
    <th>Kakak</th>
    <th>Adik</th>
    <th>Created At</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q_biodata)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit_biodata.php?ccid=<?= (int)$row['ccid']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['cnama']); ?>?')" href="proses_delete_biodata.php?ccid=<?= (int)$row['ccid']; ?>">Delete</a>
      </td>
      <td><?= $row['ccid']; ?></td>
      <td><?= htmlspecialchars($row['cnama']); ?></td>
      <td><?= htmlspecialchars($row['ctempat_lahir']); ?></td>
      <td><?= htmlspecialchars($row['ctanggal_lahir']); ?></td>
      <td><?= htmlspecialchars($row['chobi']); ?></td>
      <td><?= htmlspecialchars($row['cpasangan']); ?></td>
      <td><?= htmlspecialchars($row['cpekerjaan']); ?></td>
      <td><?= htmlspecialchars($row['corangtua']); ?></td>
      <td><?= htmlspecialchars($row['ckakak']); ?></td>
      <td><?= htmlspecialchars($row['cadik']); ?></td>
      <td><?= formatTanggal($row['ccreated_at'] ?? ''); ?></td>
    </tr>
  <?php endwhile; ?>
</table>