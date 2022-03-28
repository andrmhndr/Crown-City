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
	$data = mysqli_query($koneksi,"select * from customer where id_customer = '$id'");
	$data = mysqli_fetch_array($data); 
	 ?>
	<div class="main">
		<h1 class="judul_menu">Hello <?php echo $data['nama']; ?></h1>
		<a class="beli" href="beli.php">Beli</a>
		<?php 
		if (isset($_GET['info'])) {
			if ($_GET['info']=='berhasil') {
				?>
				<div class="kotak_beli" style="padding: 10;margin-top: 15px;margin-left: 20px"><h4>Pembelian Berhasil, sedang menunggu konfirmasi admin</h4></div>
				<?php 
			}
		}
		 ?>
		<div class="tab">
		  <button class="tablinks" onclick="openTab(event, 'rumah')" id="defaultOpen"><h3>Info Rumah</h3></button>
		  <button class="tablinks" onclick="openTab(event, 'pembayaran')"><h3>Pembayaran</h3></button>
		  <button class="tablinks" onclick="openTab(event, 'history')"><h3>History</h3></button>
		</div>

		<div id="rumah" class="tabcontent">
		  <h3>Info Rumah</h3>
		  	<?php 
		  	$id=$_SESSION['id'];
		  	$transaksi = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_customer = '$id' ORDER BY tgl_pembelian DESC");
		  	$jmlh_transaksi = mysqli_num_rows($transaksi);
		  	if ($jmlh_transaksi !=0 ) {
		  	 ?>
		  <table>
		  	<tr style="background: #191919; text-align: left;">
		  		<td><h4>NO</h4></td>
		  		<td width="200"><h4>ID TRANSAKSI</h4></td>
		  		<td><h4>TIPE</h4></td>
		  		<td><h4>PEMBAYARAN</h4></td>
		  		<td><h4>LOKASI</h4></td>
		  		<td><h4>TANGGAL PEMBELIAN</h4></td>
		  		<td><h4>STATUS</h4></td>
		  		<td><h4>TANGGAL LUNAS</h4></td>
		  	</tr>
		  	<?php 
		  	$no=1;
		  	while ($data_transaksi = mysqli_fetch_array($transaksi)) {
		  		?>
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><h4><?php echo $data_transaksi['id_transaksi']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo strtoupper($data_transaksi['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo ucwords($data_transaksi['tipe_pembayaran']); ?></h4></td>
		  		<td><h4 align="center"><?php echo $data_transaksi['nomor']; ?></h4></td>
		  		<td><h4><?php echo $data_transaksi['tgl_pembelian']; ?></h4></td>
		  		<td><h4 style="margin-right: 30px;"><?php echo ucwords($data_transaksi['status_pembayaran']); ?></h4></td>
		  		<td><h4><?php echo $data_transaksi['tgl_lunas']; ?></h4></td>
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
		  	$cash = mysqli_query($koneksi,"SELECT * FROM ((cash INNER JOIN transaksi ON cash.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) WHERE customer.id_customer = '$id' ORDER BY transaksi.tgl_pembelian ASC");
		  	$jmlh_cash = mysqli_num_rows($cash);
		  	$cicilan = mysqli_query($koneksi,"SELECT * FROM ((cicilan INNER JOIN transaksi ON cicilan.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) WHERE customer.id_customer = '$id' ORDER BY transaksi.tgl_pembelian ASC");
		  	$jmlh_cicilan = mysqli_num_rows($cicilan);
		  	$sewa = mysqli_query($koneksi,"SELECT * FROM ((sewa INNER JOIN transaksi ON sewa.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) WHERE customer.id_customer = '$id' ORDER BY transaksi.tgl_pembelian ASC");
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
		  		<td><h4>PEMBAYARAN</h4></td>
		  		<td><h4>LOKASI</h4></td>
		  		<td><h4>KODE PEMBAYARAN</h4></td>
		  		<td colspan="2"><h4>BUKTI PEMBAYARAN</h4></td>
		  	</tr>
		  	<?php 
		  	while ($data_cash = mysqli_fetch_array($cash)) {
		  	 if ($data_cash['kode_pembayaran']!=null){
				?>
		  	 <form method="POST" action="process_input_kode_bukti.php?tipe=cash">
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><input class="form_submit" type="text" name="id_pembayaran" value="<?=$data_cash['id_cash']?>"></td>
		  		<td><h4><?php echo ucwords($data_cash['nama']); ?></h4></td>
		  		<td><h4><?php echo strtoupper($data_cash['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo ucwords($data_cash['tipe_pembayaran']); ?></h4></td>
		  		<td><h4><?php echo $data_cash['nomor']; ?></h4></td>
		  		<td><h4><?php echo $data_cash['kode_pembayaran']; ?></h4></td>
		  		<td width="200"><h4><input type="text" name="kode_bukti_pembayaran" class="form_submit"></h4></td>
		  		<td width="50"><input type="SUBMIT" name="SUBMIT" class="submit" value="SUBMIT"></td>
		  		<?php $no++; ?>
		  		</form>
		  		<?php 
		  		} ?>
		  	</tr>
		  		<?php 
		  	}
		  	while ($data_cicilan = mysqli_fetch_array($cicilan)) {
		  	 if ($data_cicilan['kode_bukti_pembayaran']==NULL AND $data_cicilan['kode_pembayaran']!=NULL AND $data_cicilan['tgl_pembayaran']==NULL){
				?>	
		  	<form method="POST" action="process_input_kode_bukti.php?tipe=cicilan">
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><input class="form_submit" type="text" name="id_pembayaran" value="<?=$data_cicilan['id_cicilan']?>"></td>
		  		<td><h4><?php echo ucwords($data_cicilan['nama']); ?></h4></td>
		  		<td><h4><?php echo strtoupper($data_cicilan['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo ucwords($data_cicilan['tipe_pembayaran']." ".$data_cicilan['jumlah_cicilan']."/".$data_cicilan['total_cicilan']); ?></h4></td>
		  		<td><h4><?php echo $data_cicilan['nomor']; ?></h4></td>
		  		<td><h4><?php echo $data_cicilan['kode_pembayaran']; ?></h4></td>
		  		<td width="200"><h4><input type="text" name="kode_bukti_pembayaran" class="form_submit"></h4></td>
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
		  		if ($data_sewa['kode_bukti_pembayaran']==null AND $data_sewa['kode_pembayaran']!=NULL){
		  	 ?>
		  	<form method="POST" action="process_input_kode_bukti.php?tipe=sewa">
		  	<tr <?php if ($no%2 != 0) {?> style="background: #323232;" <?php } ?>>
		  		<td><h4><?php echo $no; ?></h4></td>
		  		<td><input class="form_submit" type="text" name="id_pembayaran" value="<?=$data_sewa['id_sewa']?>"></td>
		  		<td><h4><?php echo ucwords($data_sewa['nama']); ?></h4></td>
		  		<td><h4><?php echo strtoupper($data_sewa['id_perumahan']); ?></h4></td>
		  		<td><h4><?php echo ucwords($data_sewa['tipe_pembayaran']." ke ".$data_sewa['total_sewa']);?></h4></td>
		  		<td><h4><?php echo $data_sewa['nomor']; ?></h4></td>
		  		<td><h4><?php echo $data_sewa['kode_pembayaran']; ?></h4></td>
		  		<td width="200"><h4><input type="text" name="kode_bukti_pembayaran" class="form_submit"></h4></td>
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
		  		<h3>Belum ada Pembayaran</h3>
		  	<?php 
		  	}
		  	 ?>
		</div>

		<div id="history" class="tabcontent">
		  <h3>History</h3>
		  	<?php 
		  	$id=$_SESSION['id'];
		  	$cash = mysqli_query($koneksi,"SELECT * FROM ((cash INNER JOIN transaksi ON cash.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) WHERE customer.id_customer = '$id' ORDER BY cash.tgl_pembayaran DESC");
		  	$jmlh_cash = mysqli_num_rows($cash);
		  	$cicilan = mysqli_query($koneksi,"SELECT * FROM ((cicilan INNER JOIN transaksi ON cicilan.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) WHERE customer.id_customer = '$id' ORDER BY cicilan.tgl_pembayaran DESC");
		  	$jmlh_cicilan = mysqli_num_rows($cicilan);
		  	$sewa = mysqli_query($koneksi,"SELECT * FROM ((sewa INNER JOIN transaksi ON sewa.id_transaksi = transaksi.id_transaksi) INNER JOIN customer ON transaksi.id_customer = customer.id_customer) WHERE customer.id_customer = '$id' ORDER BY sewa.tgl_pembayaran DESC");
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