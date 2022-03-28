<?php 
include 'koneksi.php';
session_start();

$id_pembayaran = $_POST['id_pembayaran'];
$kode = $_POST['kode_pembayaran'];

$tipe = $_GET['tipe'];

$id = $_SESSION['id'];

if ($tipe == 'cash') {
	$cash = mysqli_query($koneksi,"UPDATE cash SET id_admin = '$id', kode_pembayaran = '$kode' WHERE id_cash='$id_pembayaran'");
	header("location:admin.php?info=berhasil");
}
elseif ($tipe == 'cicilan') {
	$cicilan = mysqli_query($koneksi,"UPDATE cicilan SET id_admin = '$id', kode_pembayaran = '$kode' WHERE id_cicilan = '$id_pembayaran'");
	header("location:admin.php?info=berhasil");
}
elseif ($tipe == 'sewa'){
	$sewa = mysqli_query($koneksi,"UPDATE sewa SET id_admin = '$id', kode_pembayaran = '$kode' WHERE id_sewa = '$id_pembayaran'");
	header("location:admin.php?info=berhasil");
}
 ?>