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
		<h2 class="judul_menu">Specification</h2>
<h2 class="sub-menu">Perumahan Elite </h2>
<p>Keunggulan Perumahan Elite Crown City, yaitu:</p>
<ul>
<li>Dikembangkan oleh developer terpercaya NewCastle</li>
<li>Akses transportasi mudah, dekat dengan berbagai akses Toll dan Stasiun Commuter Line</li>
<li>Penggunaan teknologi Jepang yang ramah lingkungan dan hemat energi di setiap huniannya</li>
<li>Dilengkapi fitur teknologi smart home (triple security lock door system, panic button, internet, cctv, connect to mobile phone: home security camera & lighting switch)</li>
<li>Tersedia shuttle bus hingga Aeon Mall dan Pasar Modern</li>
<li>Nilai investasi properti yang terus tumbuh dengan baik di Semarang</li>
</ul>

<p>Fasilitas yang terdapat pada Perumahan Elite Crown City, yaitu:</p>
<ul>
	<li>Community Park</li>
	<li>Shuttle Bus</li>
	<li>Samasana club house</li>
	<li>Gymnasium</li>
	<li>Onsen pool</li>
	<li>Kids Golf</li>
	<li>Tennis court</li>
	<li>Basket 3 on 3</li>
	<li>Sauna</li>
	<li>Japanese Aquamassage</li>
	<li>Function Hall</li>
	<li>Taman Tematik (Nami Garden, Ohana Garden, Hoshi Garden, Hanabi Garden, Kizuna Garden)</li>
</ul>
<h2 class="mini-menu">1.	Tipe Diamond </h2>
<img align="right" class="ukuran" src="Diamond1.jpg">
<ul>
	<li>Luas Tanah : 261 m2</li>
	<li>Jumlah Lantai    : 3 lantai</li>
	<li>4 Kamar Tidur</li>
	<li>4 Kamar Mandi</li>
	<li>1 Kamar Tidur Pembantu</li>
	<li>Kamar Mandi Pembantu</li>
	<li>Ruang Tamu</li>
	<li>Ruang keluarga</li>
	<li>Dapur</li>
	<li>Ruang Makan</li>
	<li>Teras</li>
	<li>Halaman Belakang</li>
	<li>2 Carport</li>
	<li>Garasi untuk 1 mobil</li>
	<li>Taman</li>
</ul>
<h2 class="mini-menu">2.	Tipe Platinum </h2>
<img  align="right" class="ukuran" src="Platinum.jpg">
<ul>
	<li>Luas Tanah : 120 m2</li>
	<li>Jumlah Lantai    : 2 lantai</li>
	<li>4 Kamar Tidur</li>
	<li>3 Kamar Mandi</li>
	<li>1 Kamar Tidur Pembantu</li>
	<li>1 Kamar Mandi Pembantu</li>
	<li>Ruang Tamu</li>
	<li>Ruang keluarga</li>
	<li>Dapur</li>
	<li>Ruang Makan</li>
	<li>Teras</li>
	<li>Halaman Belakang</li>
	<li>1 Carport</li>
	<li>Garasi untuk 1 mobil</li>
	<li>Taman</li>

</ul>
<h2 class="mini-menu">3.	Tipe Gold </h2>
<img align="right" class="ukuran" src="Gold.jpg">
<ul>
	<li>Luas Tanah : 77 m2</li>
	<li>Jumlah Lantai    : 2 lantai</li>
	<li>3 Kamar Tidur</li>
	<li>3 Kamar Mandi</li>
	<li>1 Kamar Tidur Pembantu</li>
	<li>1 Kamar Mandi Pembantu</li>
	<li>Ruang Tamu</li>
	<li>Ruang keluarga</li>
	<li>Dapur</li>
	<li>Ruang Makan</li>
	<li>Teras</li>
	<li>Halaman Belakang</li>
	<li>1 Carport</li>
	<li>Taman</li>
</ul>
<h2 class="sub-menu">Perumahan Middle </h2>
<p>Keunggulan dari Crown City perumahan Middle</p>
<ul>
	<li>Desain rumah dengan bergaya American Farm house.</li>
	<li>Boulevard utama dibuat selebar 28 meter</li>
	<li>Setiap unit rumah memiliki ruangan dapur yang luas dan nyaman.</li>
	<li>Dikembangkan oleh developer terpercaya dan ternama, Ciputra Grup.</li>
	<li>Dekat dengan berbagai macam kawasan pendidikan (Al Azhar 29 BSB, SD Marsudirini, Tunas Mulia Bangsa BSB).</li>
	<li>15 menit dari Bandara Internasional A. Yani.</li>
	<li>3,8 KM menuju Rumah Sakit Permata Medika.</li>
</ul>
<p>Fasilitas</p>
<ul>
	<li>Jogging Track</li>
	<li>Bicycle Lane</li>
	<li>BSB Sport Club</li>
	<li>Kolam Renang</li>
	<li>Pusat Kebugaran</li>
	<li>Area Komersil</li>
	<li>Taman Bermain Anak</li>
	<li>Keamanan 24 Jam</li>
</ul>
<h2 class="mini-menu">1.	Tipe Silver </h2>
<img align="right" class="ukuran" src="Silver.jpg">
<ul>
	<li>Luas Tanah : 68 m2</li>
	<li>Jumlah Lantai   : 2 Lantai</li>
	<li>3 Kamar Tidur</li>
	<li>2 Kamar Mandi</li>
	<li>Ruang Tamu</li>
	<li>Ruang Keluarga</li>
	<li>Dapur</li>
	<li>Ruang Makan</li>
	<li>1 Carport</li>
	<li>Halaman Belakang</li>
	<li>Teras</li>
</ul>
<h2 class="mini-menu">2.Tipe Bronze </h2>
<img align="right" class="ukuran" src="Bronze.jpg">
<ul>
	<li>Luas Tanah : 60 m2</li>
	<li>Jumlah Lantai   : 2 Lantai</li>
	<li>3 Kamar Tidur</li>
	<li>1 Kamar Mandi</li>
	<li>Ruang Tamu</li>
	<li>Dapur</li>
	<li>Ruang Makan</li>
	<li>1 Carport</li>
	<li>Halaman Belakang</li>
	<li>Teras</li>
</ul>
<h2 class="sub-menu">Apartement</h2>
<div align="left">
<img align="left" width="550px" src="Apartemen2.jpg">
<p style="margin-left: 580px">PONDASI : SPUN PILE STRUKTUR : STRUKTUR BANGUNAN BETON BERTULANG DINDING : DINDING PEMBATAS UNIT & BALKON – BATA RINGAN DENGAN PLESTER & ACI DINDING RUANGAN – PARTISI GYPSUM FINISHES: LIVING ROOM LANTAI – CERAMIC TILE 40 X 40 ex PLATINUM DINDING – PLESTER ACI DENGAN FINISH CAT PLAFOND – FINISH GYPSUM & EKSPOSE DENGAN FINISH CAT PINTU – PINTU KAYU DENGAN KUSEN ALUMINIUM JENDELA – ALUMINIUM FRAME WITH CLEAR GLASS</p> 
</div>
<br><br><br><br><br><br><br><br><br><br>
<div align="left">
<img align="right" src="DenahApartemen.jpg">
<p style="margin-right: 580px">PONDASI : SPUN PILE STRUKTUR : STRUKTUR BANGUNAN BETON BERTULANG DINDING : DINDING PEMBATAS UNIT & BALKON – BATA RINGAN DENGAN PLESTER & ACI DINDING RUANGAN – PARTISI GYPSUM FINISHES: LIVING ROOM LANTAI – CERAMIC TILE 40 X 40 ex PLATINUM DINDING – PLESTER ACI DENGAN FINISH CAT PLAFOND – FINISH GYPSUM & EKSPOSE DENGAN FINISH CAT PINTU – PINTU KAYU DENGAN KUSEN ALUMINIUM JENDELA – ALUMINIUM FRAME WITH CLEAR GLASS</p>
</div>
</div>
</body>
</html>