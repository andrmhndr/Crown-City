<html>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Gupter|Noto+Sans|Open+Sans|Solway&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Ma+Shan+Zheng|Pacifico&display=swap" rel="stylesheet"> 

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
		<center>
		<img width="300" src="logo.png">
		<h2 class="judul_menu">Crown City </h2></center>
		<p>Crown City  kembali menghadirkan karya terbaiknya di kota Semarang. Kawasan lengkap terpadu yang terdiri atas Business Park, Shop House, Thematic Garden, Food and Beverage Area, dan Private Residential, hadir di lokasi sangat strategis dan the last piece di pusat kota Semarang. Crown City akan memenuhi setiap kebutuhan penghuninya maupun masyarakat kota Semarang dan sekitarnya.</p>

		<p>Dengan konsep dan lokasi yang sangat strategis, Crown City merupakan kesempatan besar untuk berinvestasi dan mengembangkan bisnis. Tahap awal akan dikembangkan Business Park, Shop House, Food and Beverage Area dan Thematic Garden. Akses yang mudah dicapai karena berlokasi di tengah kota menjadikan Crown City sebagai lokasi yang paling premium di Kota Semarang.</p>

		<p>Semarang adalah salah satu kabupaten di Propinsi Jawa Tengah yang sudah sangat terkenal sebagai kawasan Industri dan Investasi baik lokal maupun asing. Dengan luas wilayah sebesar 373,8km dan jumlah penduduk menurut sensus 2010 sebanyak 34,26 juta jiwa,Semarang akan menjadi kawasan yang tumbuh dengan pesat.</p>
	</div>
</body>
</html>