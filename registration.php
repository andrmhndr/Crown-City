<html>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Gupter|Noto+Sans|Open+Sans|Solway&display=swap" rel="stylesheet">

<head>
	<title>Crown City</title>
</head>
<body>
		<div class="sidebar">
		<a href="home.php"><img width="100%" src="logonama.png"></a>
		<?php
		session_start();
		if (isset($_SESSION['status'])) {
			if ($_SESSION['status']=="admin") {
				?>
				<a href="admin.php">
				<h2 style="font-size: 30px;">Logged in As</h2>
				<h2 style="padding: 0px 8px 0px 30px;color: #ffd700;">Admin</h2>
				<h2 style="padding: 0px 8px 0px 30px;color: #ffd700;"><?php echo $_SESSION['nama'] ?></h2>
				</a>
				<a href="process_logout.php">Logout</a>
				<?php
			}elseif ($_SESSION['status']=="customer") {
				?>
				<a href="customer.php">
				<h2 style="font-size: 30px;">Logged in As</h2>
				<h2 style="padding: 0px 8px 0px 30px;color: #ffd700;">Customer</h2>
				<h2 style="padding: 0px 8px 0px 30px;color: #ffd700;"><?php echo $_SESSION['nama'] ?></h2>
				</a>
				<a href="process_logout.php">Logout</a>
				<?php
			}	
		}
		else {
		 	?>
			<a href="login.php">Login</a>
		 	<?php 
		 } 
		 ?>
		<a href="home.php">Home</a>
		<a href="about.php">About</a>
		<a href="specification.php">Specification</a>
		<a href="contact.php">Contact</a>
	</div>
	<div class="main">
		<form class="kotak_registrasi" method="post" action="process_registrasi.php">
			<h1>Registration</h1>
			<label>KTP</label>
			<input style="margin-bottom: 0px;" type="text" name="id" class="form_registrasi" placeholder="Insert your id" required="required">
			<h5 style="margin-top: 0px;">*KTP digunakan sebagai ID</h5>
			<label>PASSWORD</label>
			<input type="password" name="pass" class="form_registrasi" placeholder="Insert your password" required="required">
		 	<label>RE-TYPE PASSWORD</label>
		 	<input type="password" name="pass2" class="form_registrasi" placeholder="Insert your password" required="required">
		 	<label>Full Name</label>
		 	<input type="text" name="name" class="form_registrasi" placeholder="Insert your Full Name" required="required">
		 	<label>Phone Number</label>
		 	<input type="text" name="phone" class="form_registrasi" placeholder="Insert your Phone Number" required="required">
		 	<label>Email</label>
		 	<input type="text" name="email" class="form_registrasi" placeholder="Insert your email" required="required">
		 	<label>Address</label>
		 	<input type="text" name="address" class="form_registrasi" placeholder="Insert your Address" required="required">
		 	<button class="tombol_registrasi">Create Account</button>
		 	<br>
		 	<br>
			<?php
			if (isset($_GET['info'])) {
				if ($_GET['info']=="idsama") {
					?>
					<h6>KTP sudah ada !</h6>
					<?php
				}
				elseif ($_GET['info']=="wrongpass") {
					?>
					<h6>Password berbeda</h6>
					<?php
				}
			}
			  ?>
		</form>
	</div>
</body>
</html>