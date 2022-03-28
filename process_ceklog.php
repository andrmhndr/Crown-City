<?php
	session_start();

	include 'koneksi.php';

	$id = $_POST['id'];
	$pass = $_POST['pass'];

	$dataAdmin = mysqli_query($koneksi,"select * from admin where id_admin='$id' and password='$pass'");
	$dataCustomer = mysqli_query($koneksi,"select * from customer where id_customer='$id' and password='$pass'");
	$admin = mysqli_fetch_array($dataAdmin);
	$customer = mysqli_fetch_array($dataCustomer);
	$cekAdmin = mysqli_num_rows($dataAdmin);
	$cekCustomer = mysqli_num_rows($dataCustomer);

	if (($cekAdmin == 1) && ($cekCustomer == 0)) {
		$_SESSION['id'] = $id;
		$_SESSION['nama'] = $admin['nama'];
		$_SESSION['status'] = "admin";
		header("location:admin.php");
	}
	elseif (($cekAdmin == 0) && ($cekCustomer == 1)) {
		$_SESSION['id'] = $id;
		$_SESSION['nama'] = $customer['nama'];
		$_SESSION['status'] = "customer";
		header("location:customer.php");
	}
	elseif (($cekAdmin == 0) && ($cekCustomer == 0)) {
		header("location:login.php?info=failed");
	}
  ?>