<?php 
	session_start();

	include 'koneksi.php';

	$id = $_POST['id'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$dataCustomer = mysqli_query($koneksi,"select * from customer where id_customer='$id'");
	$cekCustomer = mysqli_num_rows($dataCustomer);

	if ($cekCustomer == 1) {
		header("location:registration.php?info=idsama");
	}
	elseif ($pass != $pass2) {
		header("location:registration.php?info=wrongpass");
	}
	else {
		mysqli_query($koneksi, "insert into customer values ('$id','$pass','$name','$address','$phone','$email')");
		$_SESSION['id'] = $id;
		$_SESSION['nama'] = $name;
		$_SESSION['status'] = "customer";
		header("location:login.php");
	}
 ?>