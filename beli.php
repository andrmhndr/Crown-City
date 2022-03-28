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
		<form class="kotak_beli" method="post" action="process_beli.php">
			<?php include 'koneksi.php'; ?>
			<h1>Pembelian<img align="right" width="120px" height="120px" src="logo.png"></h1>
			<h2></h2>
				<table>
			<h3>Tipe Rumah</h3>
			<tr><td><h4 style="margin-bottom: 20px; margin-top: 20px">ELITE</h4></td></tr>
					<tr>
						<td><h4><input type="radio" name="tipe_rumah" value="diamond">DIAMOND</h4></td>
						<td><h4>Harga : Rp. 8.000.000.000,-</h4></td>
						<td><h4><?php 
						$diamond = mysqli_query($koneksi,"select * from perumahan where id_perumahan = 'diamond'");
						$diamondD = mysqli_fetch_array($diamond);
						$jumlah = $diamondD['jumlah']; 
						$terjual = $diamondD['terjual'];
						echo "(Sisa : ".$jumlah.")"; ?></h4></td>
					</tr>
					<tr>
						<td><h4><input type="radio" name="tipe_rumah" value="platinum">PLATINUM</h4></td>
						<td><h4>Harga : Rp. 3.000.000.000,-</h4></td>
						<td><h4><?php 
						$diamond = mysqli_query($koneksi,"select * from perumahan where id_perumahan = 'platinum'");
						$diamondD = mysqli_fetch_array($diamond);
						$jumlah = $diamondD['jumlah']; 
						$terjual = $diamondD['terjual'];
						echo "(Sisa : ".$jumlah.")"; ?></h4></td>
					</tr>
					<tr>
						<td><h4><input type="radio" name="tipe_rumah" value="gold">GOLD</h4></td>
						<td><h4>Harga : Rp. 1.000.000.000,-</h4></td>
						<td><h4><?php 
						$diamond = mysqli_query($koneksi,"select * from perumahan where id_perumahan = 'gold'");
						$diamondD = mysqli_fetch_array($diamond);
						$jumlah = $diamondD['jumlah']; 
						$terjual = $diamondD['terjual'];
						echo "(Sisa : ".$jumlah.")"; ?></h4></td>
					</tr>
			<tr><td><h4 style="margin-bottom: 20px; margin-top: 20px">MIDDLE</h4></td></tr>
					<tr>
						<td><h4><input type="radio" name="tipe_rumah" value="silver">SILVER</h4></td>
						<td><h4>Harga : Rp. 800.000.000,-</h4></td>
						<td><h4><?php 
						$diamond = mysqli_query($koneksi,"select * from perumahan where id_perumahan = 'silver'");
						$diamondD = mysqli_fetch_array($diamond);
						$jumlah = $diamondD['jumlah']; 
						$terjual = $diamondD['terjual'];
						echo "(Sisa : ".$jumlah.")"; ?></h4></td>
					</tr>
					<tr>
						<td><h4><input type="radio" name="tipe_rumah" value="bronze">BRONZE</h4></td>
						<td><h4>Harga : Rp. 300.000.000,-</h4></td>
						<td><h4><?php 
						$diamond = mysqli_query($koneksi,"select * from perumahan where id_perumahan = 'bronze'");
						$diamondD = mysqli_fetch_array($diamond);
						$jumlah = $diamondD['jumlah']; 
						$terjual = $diamondD['terjual'];
						echo "(Sisa : ".$jumlah.")"; ?></h4></td>
					</tr>
			<tr><td><h4 style="margin-bottom: 20px; margin-top: 20px">APARTEMENT</h4></td></tr>
					<tr>
						<td><h4><input type="radio" name="tipe_rumah" value="apartement">APARTEMENT</h4></td>
						<td><h4>Harga : Rp. 30.000.000,-</h4></td>
						<td><h4><?php 
						$diamond = mysqli_query($koneksi,"select * from perumahan where id_perumahan = 'apartement'");
						$diamondD = mysqli_fetch_array($diamond);
						$jumlah = $diamondD['jumlah']; 
						$terjual = $diamondD['terjual'];
						echo "(Sisa : ".$jumlah.")"; ?></h4></td>
					</tr>
				</table>
			<h3>Nomor Rumah/Apartement</h3>
			<input type="text" name="nomor" class="form_beli" placeholder="isikan nomor lokasi" required="required">
			<table class="keterangan">
				<tr>
					<td><h5>keterangan</h5></td>
				</tr>
				<tr>
					<td><h5>- DIAMOND</h5></td>
					<td><h5>1-75</h5></td>
				</tr>
				<tr>
					<td><h5>- PLATINUM</h5></td>
					<td><h5>1-100</h5></td>
				</tr>
				<tr>
					<td><h5>- GOLD</h5></td>
					<td><h5>1-125</h5></td>
				</tr>
				<tr>
					<td><h5>- SILVER</h5></td>
					<td><h5>1-100</h5></td>
				</tr>
				<tr>
					<td><h5>- BRONZE</h5></td>
					<td><h5>1-100</h5></td>
				</tr>
				<tr>
					<td><h5>- APARTEMENT</h5></td>
					<td><h5>1-100</h5></td>
				</tr>
				<tr></tr>
			</table>
			<h3>Metode Pembayaran</h3>
			<table>
				<tr>
					<td><h4>Cash</h4></td>
					<td><h4>(Perumahan)</h4></td>
				</tr>
				<tr>
					<td><h4><input type="radio" name="tipe_pembayaran" value="cash">Cash</h4></td>
				</tr>
				<tr>
					<td><h4>Cicilan</h4></td>
					<td><h4>(Perumahan)</h4></td>
				</tr>
				<tr>
					<td><h4><input type="radio" name="tipe_pembayaran" value="12x">1 Tahun dengan 12x Cicilan bunga 0% tiap 1 bulan</h4></td>
				</tr>
				<tr>
					<td><h4><input type="radio" name="tipe_pembayaran" value="18x">3 Tahun dengan 18x Cicilan bunga 0% tiap 2 bulan</h4></td>
				</tr>
				<tr>
					<td><h4><input type="radio" name="tipe_pembayaran" value="20x">5 Tahun dengan 20x Cicilan bunga 0% tiap 3 bulan</h4></td>
				</tr>
				<tr>
					<td><h4>Sewa</h4></td>
					<td><h4>(Apartement)</h4></td>
				</tr>
				<tr>
					<td><h4><input type="radio" name="tipe_pembayaran" value="sewa">Sewa</h4></td>
				</tr>
			</table>
		 	<button class="tombol_beli">Beli</button>
		 	<br>
		 	<br>
			<?php
			if (isset($_GET['info'])) {
				if ($_GET['info']=="terisi") {
					?>
					<h6>Rumah Sudah Terisi</h6>
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