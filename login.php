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
		<form class="kotak_login" method="post" action="process_ceklog.php">
			<h1>Login to Access</h1>
			<label>ID</label>
			<input type="text" name="id" class="form_login" placeholder="Insert your id">
			<label>PASSWORD</label>
			<br>
			<input type="password" name="pass" class="form_login" placeholder="Insert your password">
		 	<button class="tombol_login">Login</button>
		 	<br>
		 	<br>
			<a href="registration.php">Create a new Account ?</a>
			<?php
			if (isset($_GET['info'])) {
				if ($_GET['info']=="failed") {
					?>
					<h6>Login Failed ! Wrong ID and Password !</h4>
					<?php
				}
				elseif ($_GET['info']=="logout") {
					?>
					<h6>Logout Success</h4>
					<?php
				}
				elseif ($_GET['info']=="logfirst") {
					?>
					<h6>Error ! Login to Access !</h4>
					<?php
				}
			}
			  ?>
		</form>
	</div>
</body>
</html>