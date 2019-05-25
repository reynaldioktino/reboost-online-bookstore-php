<?php  
include '../functions.php';

$id_keranjang = $_GET['id_keranjang'];
$id_buku = $_GET['id_buku'];
$jumlah = $_GET['jumlah'];

$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id_buku");
$book = mysqli_fetch_array($result);

$stokupdate = $book['stok'] + $jumlah;

mysqli_query($conn, "UPDATE buku SET stok=$stokupdate WHERE id_buku=$id_buku");

mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang=$id_keranjang");
header("location: ../admin.php?menu=inputpenjualan");

?>