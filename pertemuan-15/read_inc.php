<?php
require 'koneksi.php';

$fieldContact = [
  "nama" => ["label" => "Nama:", "suffix" => ""],
  "email" => ["label" => "Email:", "suffix" => ""],
  "pesan" => ["label" => "Pesan Anda:", "suffix" => ""]
];

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrContact = [
      "nama"  => $row["cnama"]  ?? "",
      "email" => $row["cemail"] ?? "",
      "pesan" => $row["cpesan"] ?? "",
    ];
    echo tampilkanBiodata($fieldContact, $arrContact);
  }
}

echo "<hr>";
echo "<h3>Data Biodata Mahasiswa</h3>";

$fieldBiodata = [
  "nama" => ["label" => "Nama:", "suffix" => ""],
  "tempat_lahir" => ["label" => "Tempat Lahir:", "suffix" => ""],
  "tanggal_lahir" => ["label" => "Tanggal Lahir:", "suffix" => ""],
  "hobi" => ["label" => "Hobi:", "suffix" => ""],
  "pasangan" => ["label" => "Pasangan:", "suffix" => ""],
  "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => ""],
  "orangtua" => ["label" => "Orang Tua:", "suffix" => ""],
  "kakak" => ["label" => "Kakak:", "suffix" => ""],
  "adik" => ["label" => "Adik:", "suffix" => ""],
];

$sql_biodata = "SELECT * FROM biodatasederhanamahasiswa ORDER BY cid DESC";
$q_biodata = mysqli_query($conn, $sql_biodata);
if (!$q_biodata) {
  echo "<p>Gagal membaca data biodata: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q_biodata) === 0) {
  echo "<p>Belum ada data biodata mahasiswa yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q_biodata)) {
    $arrBiodata = [
      "nama"  => $row["cnama"]  ?? "",
      "tempat_lahir" => $row["ctempat_lahir"] ?? "",
      "tanggal_lahir" => $row["ctanggal_lahir"] ?? "",
      "hobi" => $row["chobi"] ?? "",
      "pasangan" => $row["cpasangan"] ?? "",
      "pekerjaan" => $row["cpekerjaan"] ?? "",
      "orangtua" => $row["corangtua"] ?? "",
      "kakak" => $row["ckakak"] ?? "",
      "adik" => $row["cadik"] ?? "",
    ];
    echo tampilkanBiodata($fieldBiodata, $arrBiodata);
    echo "<hr>";
  }
}
?>
