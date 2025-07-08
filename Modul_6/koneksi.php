<?php
$host = "localhost";
$user = "root";
$pass = "keyyboy14";
$db = "perusahaan";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>