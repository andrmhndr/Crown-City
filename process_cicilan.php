<?php 
include 'koneksi.php';

session_start();

$id = $_SESSION['id'];
$nomor = $_SESSION['nomor'];
$tipe_perumahan = $_SESSION['tipe_perumahan'];
$tahun = $_SESSION['tahun'];
$total_cicilan = $_SESSION['total_cicilan'];
$tanggal = date("Y-m-d");

$transaksi = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_customer = '$id' AND nomor = '$nomor' AND id_perumahan = '$tipe_perumahan'");
$data_transaksi = mysqli_fetch_array($transaksi);
$id_transaksi = $data_transaksi['id_transaksi'];

$perumahan = mysqli_query($koneksi,"SELECT * FROM perumahan WHERE id_perumahan = '$tipe_perumahan'");
$data_perumahan = mysqli_fetch_array($perumahan);
$harga = $data_perumahan['harga'];

$harga_cicilan = $harga/$total_cicilan;

$harga_cicilan;

$cicilan = mysqli_query($koneksi,"INSERT INTO cicilan VALUES (NULL, '$id_transaksi','$total_cicilan','1','$harga_cicilan','belum lunas', NULL, '$tahun', '$tanggal', NULL, NULL, NULL)");

header("location:customer.php?info=berhasil");
 ?>