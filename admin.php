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
	<?php
	include 'koneksi.php';
	$id = $_SESSION['id'];
	$data = mysqli_query($koneksi,"select * from admin where id_admin = '$id'");
	$data = mysqli_fetch_array($data);
	  ?>
	<div class="main">
		<h2 class="judul_menu">Hello <?php echo $data['nama']; ?></h2>
		<?php 
		if (isset($_GET['info'])) {
			if ($_GET['info']=='berhasil') {
				?>
				<div class="kotak_beli" style="padding: 10;margin-top: 15px;margin-left: 20px"><h4>Pengisian kode Pembayaran berhasil</h4></div>
				<?php 
			}
		}
		 ?>
		<div class="tab">
		  <button class="tablinks" onclick="openTab(event, 'pembeli')" id="defaultOpen"><h3>Info Pembeli</h3></button>
		  <button class="tablinks" onclick="openTab(event, 'pembelian')"><h3>Pembelian</h3></button>
		  <button class="tablinks" onclick="openTab(event, 'pembayaran')"><h3>Pembayaran</h3></button>
		  <button class="tablinks" onclick="openTab(event, 'history')"><h3>History</h3></button>
		</div>

		<div id="pembeli" class="tabcontent">
		  <h3>Info Pembeli</h3>
		  	<?php 
		  	$pembeli = mysqli_query($koneksi,"SELECT * FROM customer ORDER BY nama ASC");
		  	$jmlh_pembeli = mysqli_num_rows($pembeli);
		  	$no=1;
		  	if ($jmlh_pembeli != 0) {
		  		?>
		  <table style="margin-left: 10px;">
		  	<tr style="background: #191919; text-align: left;">
		  		<td><h4>NO</h4></td>
		  		<td><h4>ID PEMBELI</h4></td>
		  		<td><h4>NAMA</h4></td>
		  		<td><h4>ALAMAT</h4></td>
		  		<td><h4>NO HP</h4></td>
		  		<td width="300"><h4>EMAIL</h4></td>
		  	</tr>
		  	<?php 
		  	while ($data_pembeli = mysqli_fetch_array($pembeli)) {
		  	 ?>
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><h4><?php echo $data_pembeli['id_customer'] ; ?></h4></td>
		  		<td width="330"><h4><?php echo ucwords($data_pembeli['nama']); ?></h4></td>
		  		<td width="260"><h4><?php echo $data_pembeli['alamat']; ?></h4></td>
		  		<td width="180"><h4><?php echo $data_pembeli['no_hp']; ?></h4></td>
		  		<td width="200"><h4><?php echo $data_pembeli['email'] ?></h4></td>
		  		<?php $no++; ?>
		  	</tr>
		  		<?php 
		  	}
		  	 ?>
		  </table>
		  	<?php 
		  	}
		  	else{
		  		?>
		  		<h3>Belum ada pembeli</h3>
		  	<?php 
		  	}
		  	 ?>
		</div>

		<div id="pembelian" class="tabcontent">
		  <h3>Pembelian</h3>
		  	<?php 
		  	$pembelian = mysqli_query($koneksi,"SELECT transaksi.*,customer.nama FROM transaksi INNER JOIN customer ON transaksi.id_customer = customer.id_customer ORDER BY tgl_pembelian DESC");
		  	$jmlh_pembelian = mysqli_num_rows($pembelian);
		  	$no=1;
		  	if ($jmlh_pembelian != 0) {
		  		?>
		  <table style="margin-left: 10px;">
		  	<tr style="font-size: 10px; background: #191919; text-align: left;">
		  		<td><h4>NO</h4></td>
		  		<td><h4>ID TRANSAKSI</h4></td>
		  		<td width="1000"><h4>NAMA PEMBELI</h4></td>
		  		<td><h4>TIPE</h4></td>
		  		<td><h4>LOKASI</h4></td>
		  		<td><h4>PEMBAYARAN</h4></td>
		  		<td><h4>TANGGAL PEMBELIAN</h4></td>
		  		<td><h4>STATUS</h4></td>
		  		<td><h4>TANGGAL PELUNASAN</h4></td>
		  	</tr>
		  	<?php 
		  	while ($data_pembelian = mysqli_fetch_array($pembelian)) {
		  	 ?>
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><h4><?php echo $data_pembelian['id_transaksi']; ?></h4></td>
		  		<td><h4><?php echo ucwords($data_pembelian['nama']); ?></h4></td>
		  		<td><h4><?php echo strtoupper($data_pembelian['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo $data_pembelian['nomor']; ?></h4></td>
		  		<td><h4><?php echo ucwords($data_pembelian['tipe_pembayaran']); ?></h4></td>
		  		<td><h4><?php echo $data_pembelian['tgl_pembelian']; ?></h4></td>
		  		<td><h4><?php echo $data_pembelian['status_pembayaran']; ?></h4></td>
		  		<td><h4><?php echo $data_pembelian['tgl_lunas']; ?></h4></td>
		  		<?php $no++; ?>
		  	</tr>
		  		<?php 
		  	}
		  	 ?>
		  </table>
		  	<?php 
		  	}
		  	else{
		  		?>
		  		<h3>Belum ada Pembelian</h3>
		  	<?php 
		  	}
		  	 ?>
		</div>

		<div id="pembayaran" class="tabcontent">
		  <h3>Pembayaran</h3>
		  	<?php 
		  	$cash = mysqli_query($koneksi,"SELECT * FROM ((cash INNER JOIN transaksi ON cash.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) ORDER BY transaksi.tgl_pembelian ASC");
		  	$jmlh_cash = mysqli_num_rows($cash);
		  	$cicilan = mysqli_query($koneksi,"SELECT * FROM ((cicilan INNER JOIN transaksi ON cicilan.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) ORDER BY transaksi.tgl_pembelian ASC");
		  	$jmlh_cicilan = mysqli_num_rows($cicilan);
		  	$sewa = mysqli_query($koneksi,"SELECT * FROM ((sewa INNER JOIN transaksi ON sewa.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) ORDER BY transaksi.tgl_pembelian ASC");
		  	$jmlh_sewa = mysqli_num_rows($sewa);
		  	$no=1;
		  	if ($jmlh_sewa!=0 or $jmlh_cicilan!=0 or $jmlh_cash!=0) {
		  		?>
		  <table style="margin-left: 10px;">
		  	<tr style="font-size: 10px; background: #191919; text-align: left;">
		  		<td><h4>NO</h4></td>
		  		<td><h4>ID PEMBAYARAN</h4></td>
		  		<td width="400"><h4>NAMA PEMBELI</h4></td>
		  		<td><h4>TIPE</h4></td>
		  		<td><h4>LOKASI</h4></td>
		  		<td><h4>PEMBAYARAN</h4></td>
		  		<td><h4>TANGGAL PEMBELIAN</h4></td>
		  		<td colspan="2"><h4>KODE PEMBAYARAN</h4></td>
		  	</tr>
		  	<?php 
		  	while ($data_cash = mysqli_fetch_array($cash)) {
		  	 if ($data_cash['kode_pembayaran']==null){
				?>		  	 	
		  	 <form method="POST" action="process_input_kode_bayar.php?tipe=cash">
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><input class="form_submit" type="text" name="id_pembayaran" value="<?=$data_cash['id_cash']?>"></td>
		  		<td><h4><?php echo ucwords($data_cash['nama']); ?></h4></td>
		  		<td><h4><?php echo strtoupper($data_cash['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo $data_cash['nomor']; ?></h4></td>
		  		<td><h4><?php echo ucwords($data_cash['tipe_pembayaran']); ?></h4></td>
		  		<td><h4><?php echo $data_cash['tgl_pembelian']; ?></h4></td>
		  		<td width="200"><h4><input type="text" name="kode_pembayaran" class="form_submit"></h4></td>
		  		<td width="50"><input type="SUBMIT" name="SUBMIT" class="submit" value="SUBMIT"></td>
		  		<?php $no++; ?>
		  		</form>
		  		<?php 
		  		} ?>
		  	</tr>
		  		<?php 
		  	}
		  	while ($data_cicilan = mysqli_fetch_array($cicilan)) {
		  	 if ($data_cicilan['kode_pembayaran']==null){
				?>	
		  	<form method="POST" action="process_input_kode_bayar.php?tipe=cicilan">
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><input class="form_submit" type="text" name="id_pembayaran" value="<?=$data_cicilan['id_cicilan']?>"></td>
		  		<td><h4><?php echo ucwords($data_cicilan['nama']); ?></h4></td>
		  		<td><h4><?php echo strtoupper($data_cicilan['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo $data_cicilan['nomor']; ?></h4></td>
		  		<td><h4><?php echo ucwords($data_cicilan['tipe_pembayaran']." ".$data_cicilan['jumlah_cicilan']."/".$data_cicilan['total_cicilan']); ?></h4></td>
		  		<td><h4><?php echo $data_cicilan['tgl_pembelian']; ?></h4></td>
		  		<td width="200"><h4><input type="text" name="kode_pembayaran" class="form_submit"></h4></td>
		  		<td width="50"><input type="SUBMIT" name="SUBMIT" class="submit" value="SUBMIT"></td>
		  		<?php 
		  		$no++; 
		  		?>
		  		</form>
		  		<?php 
		  		} ?>
		  	</tr>
		  		<?php 
		  	}
		  	while ($data_sewa = mysqli_fetch_array($sewa)) {
		  		if ($data_sewa['kode_pembayaran']==null){
		  	 ?>
		  	<form method="POST" action="process_input_kode_bayar.php?tipe=sewa">
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><input class="form_submit" type="text" name="id_pembayaran" value="<?=$data_sewa['id_sewa']?>"></td>
		  		<td><h4><?php echo ucwords($data_sewa['nama']); ?></h4></td>
		  		<td><h4><?php echo strtoupper($data_sewa['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo $data_sewa['nomor']; ?></h4></td>
		  		<td><h4><?php echo ucwords($data_sewa['tipe_pembayaran']." ke ".$data_sewa['total_sewa']);?></h4></td>
		  		<td><h4><?php echo $data_sewa['tgl_pembelian']; ?></h4></td>
		  		<td width="200"><h4><input type="text" name="kode_pembayaran" class="form_submit"></h4></td>
		  		<td width="50"><input type="SUBMIT" name="SUBMIT" class="submit" value="SUBMIT"></td>
		  		<?php 
		  		$no++; 
		  		?>
		  		</form>
		  		<?php 
		  		} ?>
		  	</tr>
		  		<?php 
		  	}
		  	 ?>
		  </table>
		  	<?php 
		  	}
		  	else{
		  		?>
		  		<h3>Belum ada Pembelian</h3>
		  	<?php 
		  	}
		  	 ?>
		</div>

		<div id="history" class="tabcontent">
		  <h3>History</h3>
		  <?php 
		  	$id=$_SESSION['id'];
		  	$cash = mysqli_query($koneksi,"SELECT * FROM ((cash INNER JOIN transaksi ON cash.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) ORDER BY cash.tgl_pembayaran DESC");
		  	$jmlh_cash = mysqli_num_rows($cash);
		  	$cicilan = mysqli_query($koneksi,"SELECT * FROM ((cicilan INNER JOIN transaksi ON cicilan.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) ORDER BY cicilan.tgl_pembayaran DESC");
		  	$jmlh_cicilan = mysqli_num_rows($cicilan);
		  	$sewa = mysqli_query($koneksi,"SELECT * FROM ((sewa INNER JOIN transaksi ON sewa.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) ORDER BY sewa.tgl_pembayaran DESC");
		  	$jmlh_sewa = mysqli_num_rows($sewa);
		  	if ($jmlh_cash !=0 OR $jmlh_cicilan!=0 OR $jmlh_sewa!=0) {
		  	 ?>
		  <table>
		  	<tr style="background: #191919; text-align: left;">
		  		<td><h4>NO</h4></td>
		  		<td width="200"><h4>ID PEMBAYARAN</h4></td>
		  		<td><h4>TIPE</h4></td>
		  		<td><h4>PEMBAYARAN</h4></td>
		  		<td><h4>LOKASI</h4></td>
		  		<td><h4>HARGA</h4></td>
		  		<td><h4>TANGGAL PEMBAYARAN</h4></td>
		  	</tr>
		  	<?php 
		  	$no=1;
		  	while ($data_cash = mysqli_fetch_array($cash)) {
		  		if ($data_cash['kode_bukti_pembayaran']!=NULL) {
		  		?>
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><h4><?php echo $data_cash['id_cash']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo strtoupper($data_cash['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo ucwords($data_cash['tipe_pembayaran']); ?></h4></td>
		  		<td><h4 align="center"><?php echo $data_cash['nomor']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo "Rp. ".ucwords($data_cash['harga'].",-"); ?></h4></td>
		  		<td><h4><?php echo $data_cash['tgl_pembelian']; ?></h4></td>
		  		<?php $no++; ?>
		  	</tr>
		  		<?php 
		  		}
		  	}
		  	while ($data_cicilan = mysqli_fetch_array($cicilan)) {
		  		if ($data_cicilan['kode_bukti_pembayaran']!=NULL) {
		  		?>
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><h4><?php echo $data_cicilan['id_cicilan']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo strtoupper($data_cicilan['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo ucwords($data_cicilan['tipe_pembayaran']." ".$data_cicilan['jumlah_cicilan']."/".$data_cicilan['total_cicilan']); ?></h4></td>
		  		<td><h4 align="center"><?php echo $data_cicilan['nomor']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo "Rp. ".ucwords($data_cicilan['harga_cicilan'].",-"); ?></h4></td>
		  		<td><h4><?php echo $data_cicilan['tgl_pembayaran']; ?></h4></td>
		  		<?php $no++; ?>
		  	</tr>
		  		<?php
		  		} 
		  	}
		  	while ($data_sewa = mysqli_fetch_array($sewa)) {
		  		if ($data_sewa['kode_bukti_pembayaran']!=NULL) {
		  		?>
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><h4><?php echo $data_sewa['id_sewa']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo strtoupper($data_sewa['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo ucwords($data_sewa['tipe_pembayaran']." ke ".$data_sewa['total_sewa']); ?></h4></td>
		  		<td><h4 align="center"><?php echo $data_sewa['nomor']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo "Rp. ".ucwords($data_sewa['harga_sewa'].",-"); ?></h4></td>
		  		<td><h4><?php echo $data_sewa['tgl_pembayaran']; ?></h4></td>
		  		<?php $no++; ?>
		  	</tr>
		  		<?php
		  		} 
		  	}
		  	 ?>
		  </table>
		<?php 
		  }
		  else{
		  	?>
		  		<h3>Belum ada Pembelian</h3>
		  	<?php
		  }
	  		 ?>
		</div>
	</div>
</body>
</html>

<script>
function openTab(evt, option) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(option).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>