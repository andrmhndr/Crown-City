<?php 
	
	include 'koneksi.php';

	session_start();

	$tipe_perumahan = $_POST['tipe_rumah'];
	$nomor = $_POST['nomor'];
	$tipe_pembayaran = $_POST['tipe_pembayaran'];

	$dataRumah = mysqli_query($koneksi,"select * from transaksi where nomor = '$nomor' and id_perumahan = '$tipe_perumahan'");
	$cekRumah = mysqli_num_rows($dataRumah);

	if ($cekRumah == 1) {
		header("location:beli.php?info=terisi");
	}
	else {
		$perumahan = mysqli_query($koneksi,"select * from perumahan where id_perumahan = '$tipe_perumahan'");
		$data_perumahan = mysqli_fetch_array($perumahan);
			$harga=$data_perumahan['harga'];
			$id = $_SESSION['id'];
		if ($tipe_pembayaran=='12x') {
			$total_cicilan=12;
			$tahun=1;
			$_SESSION['total_cicilan']=$total_cicilan;
			$_SESSION['tahun']=$tahun;
			$tanggal= date("Y-m-d");
			$transaksi=mysqli_query($koneksi,"INSERT INTO transaksi (id_transaksi, id_customer, id_admin, id_perumahan, status_pembayaran, tipe_pembayaran, tgl_lunas, tgl_pembelian, nomor) VALUES (NULL, '$id', NULL, '$tipe_perumahan', 'belum lunas', 'cicilan', NULL, '$tanggal', '$nomor')");
			$_SESSION['nomor']=$nomor;
			$_SESSION['tipe_perumahan']=$tipe_perumahan;
			header("location:process_cicilan.php");
		}
		elseif ($tipe_pembayaran=='18x') {
			$total_cicilan=18;
			$tahun=3;
			$_SESSION['total_cicilan']=$total_cicilan;
			$_SESSION['tahun']=$tahun;
			$tanggal= date("Y-m-d");
			$transaksi=mysqli_query($koneksi,"INSERT INTO transaksi (id_transaksi, id_customer, id_admin, id_perumahan, status_pembayaran, tipe_pembayaran, tgl_lunas, tgl_pembelian, nomor) VALUES (NULL, '$id', NULL, '$tipe_perumahan', 'belum lunas', 'cicilan', NULL, '$tanggal', '$nomor')");
			$_SESSION['nomor']=$nomor;
			$_SESSION['tipe_perumahan']=$tipe_perumahan;
			header("location:process_cicilan.php");
		}
		elseif ($tipe_pembayaran=='20x') {
			$total_cicilan=20;
			$tahun=5;
			$_SESSION['total_cicilan']=$total_cicilan;
			$_SESSION['tahun']=$tahun;
			$tanggal= date("Y-m-d");
			$transaksi=mysqli_query($koneksi,"INSERT INTO transaksi (id_transaksi, id_customer, id_admin, id_perumahan, status_pembayaran, tipe_pembayaran, tgl_lunas, tgl_pembelian, nomor) VALUES (NULL, '$id', NULL, '$tipe_perumahan', 'belum lunas', 'cicilan', NULL, '$tanggal', '$nomor')");
			$_SESSION['nomor']=$nomor;
			$_SESSION['tipe_perumahan']=$tipe_perumahan;
			header("location:process_cicilan.php");
		}
		elseif ($tipe_pembayaran=='cash') {
			$tanggal= date("Y-m-d");
			$_SESSION['nomor']=$nomor;
			$transaksi=mysqli_query($koneksi,"INSERT INTO transaksi (id_transaksi, id_customer, id_admin, id_perumahan, status_pembayaran, tipe_pembayaran, tgl_lunas, tgl_pembelian, nomor) VALUES (NULL, '$id', NULL, '$tipe_perumahan', 'belum lunas', 'cash', NULL, '$tanggal', '$nomor')");
			$_SESSION['tipe_perumahan']=$tipe_perumahan;
			header("location:process_cash.php");
		}
		elseif ($tipe_pembayaran=='sewa') {
			$tanggal= date("Y-m-d");
			$_SESSION['nomor']=$nomor;
			$transaksi=mysqli_query($koneksi,"INSERT INTO transaksi (id_transaksi, id_customer, id_admin, id_perumahan, status_pembayaran, tipe_pembayaran, tgl_lunas, tgl_pembelian, nomor) VALUES (NULL, '$id', NULL, '$tipe_perumahan', 'belum lunas', 'sewa', NULL, '$tanggal', '$nomor')");
			$_SESSION['tipe_perumahan']=$tipe_perumahan;
			header("location:process_sewa.php");
		}
	}

 ?>