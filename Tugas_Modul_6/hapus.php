<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM db_toko WHERE id_produk = $id");
header("Location: index.php");
?>
