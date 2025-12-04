<?php
$host = "localhost";
$username = "root";
$pass = "";
$database = "db_pwd2025";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}