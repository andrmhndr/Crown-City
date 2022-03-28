<?php 
include 'koneksi.php';
session_start();

$id_pembayaran = $_POST['id_pembayaran'];
$kode = $_POST['kode_bukti_pembayaran'];

$tipe = $_GET['tipe'];

$tanggal = date("Y-m-d");

$id = $_SESSION['id'];

if ($tipe == 'cash') {
	$cash = mysqli_query($koneksi,"UPDATE cash SET tgl_pembayaran ='$tanggal', kode_bukti_pembayaran = '$kode', status_pembayaran='Lunas' WHERE id_cash='$id_pembayaran'");
	$select_cash = mysqli_query($koneksi,"SELECT * FROM cash INNER JOIN transaksi ON cash.id_transaksi = transaksi.id_transaksi WHERE cash.id_cash='$id_pembayaran'");
	$data_cash = mysqli_fetch_array($select_cash);
	$id_transaksi = $data_cash['id_transaksi'];
	$transaksi = mysqli_query($koneksi,"UPDATE transaksi SET status_pembayaran='Lunas',tgl_lunas='$tanggal' WHERE id_transaksi='$id_transaksi'");
	header("location:customer.php?info=berhasil");
}
elseif ($tipe == 'cicilan') {
	$cicilan = mysqli_query($koneksi,"UPDATE cicilan SET tgl_pembayaran='$tanggal', kode_bukti_pembayaran = '$kode', status_pembayaran = 'Lunas' WHERE id_cicilan = '$id_pembayaran'");
	$select_cicilan = mysqli_query($koneksi,"SELECT * FROM cicilan INNER JOIN transaksi ON cicilan.id_transaksi = transaksi.id_transaksi WHERE cicilan.id_cicilan='$id_pembayaran'");
	$data_cicilan = mysqli_fetch_array($select_cicilan);
	$jmlh_cicilan = $data_cicilan['jumlah_cicilan'];
	$total_cicilan = $data_cicilan['total_cicilan'];
	echo $jmlh_cicilan.$total_cicilan;
	if ($jmlh_cicilan!=$total_cicilan) {
		$cicilan_sekarang = $jmlh_cicilan+1;
		echo $cicilan_sekarang;
		$transaksi = $data_cicilan['id_transaksi'];
		$harga = $data_cicilan['harga_cicilan'];
		$tahun = $data_cicilan['tahun'];
		$cicilan_baru=mysqli_query($koneksi,"INSERT INTO cicilan VALUES (NULL, '$transaksi','$total_cicilan','$cicilan_sekarang','$harga','belum lunas',NULL,'$tahun',NULL,NULL,NULL,NULL)");
		header("location:customer.php?info=berhasil");
	}
	else {
		$id_transaksi = $data_cicilan['id_transaksi'];
		$transaksi = mysqli_query($koneksi,"UPDATE transaksi SET status_pembayaran='Lunas',tgl_lunas='$tanggal' WHERE id_transaksi='$id_transaksi'");
		header("location:customer.php?info=berhasil");	
	}
}
elseif ($tipe == 'sewa'){
	$sewa = mysqli_query($koneksi,"UPDATE sewa SET tgl_pembayaran = '$tanggal',kode_bukti_pembayaran = '$kode', status_pembayaran = 'Lunas' WHERE id_sewa = '$id_pembayaran'");
	$select_sewa = mysqli_query($koneksi,"SELECT * FROM sewa WHERE id_sewa = '$id_pembayaran'");
	$data_sewa = mysqli_fetch_array($select_sewa);
	$id_transaksi = $data_sewa['id_transaksi'];
	$total_sewa = $data_sewa['total_sewa'];
	$total = $total_sewa + 1;
	$harga = $data_sewa['harga_sewa'];
	$sewa_baru = mysqli_query($koneksi,"INSERT INTO sewa VALUES (NULL,'$id_transaksi','$total','$harga','Belum Lunas',NULL, NULL, NULL, NULL)");
	header("location:customer.php?info=berhasil");
}
 ?>