<!DOCTYPE html> 
<html> 
<head> 
  <title>Belajar PHP Dasar</title> 
</head> 
<body> 
  <h1><?php echo "Halo, Dunia PHP!"; ?></h1> 
</body> 
</html>
<?php 
$nama = "Yohanes Setiawan Japriadi"; 
$umur = 25; 
$tinggi = 1.75; 
$aktif = true; 
$hobi = ["Coding", "Memasak", "Musik"]; 
$mahasiswa = (object)[ 
  "nim" => "0344300002", 
  "nama" => "Yohanes Setiawan", 
  "prodi" => "Teknik Informatika" 
]; 
$nilai_akhir = NULL; 
echo "<h2>Demo Tipe Data PHP</h2>"; 
 
echo "<pre>"; 
echo "String:\n"; 
var_dump($nama); 
 
echo "\nInteger:\n"; 
var_dump($umur); 
 
echo "\nFloat:\n"; 
var_dump($tinggi); 
 
echo "\nBoolean:\n"; 
var_dump($aktif); 
 
echo "\nArray:\n"; 
var_dump($hobi); 

echo "\nObject:\n"; 
var_dump($mahasiswa); 
 
echo "\nNULL:\n"; 
var_dump($nilai_akhir); 
echo "</pre>"; 
?>

<?php 
define("KAMPUS", "ISB Atma Luhur"); 
const ANGKATAN = 2025; 
 
echo "Kampus: " . KAMPUS . "<br>"; 
echo "Angkatan: " . ANGKATAN;
?>