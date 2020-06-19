<?php

if(empty($_SESSION['id_user'])){
$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login
terlebih dahulu.';
header('Location: ./');
die();
}
else{
?>

<html>

<head>
<link href="css/bootstrap.css" rel="stylesheet"/>
</head>

<body onload="window.print()">
<div class="container">

<?php

$id_transaksi = $_REQUEST['id_transaksi'];
$id_user = $_SESSION['id_user'];

$sql = mysqli_query($koneksi, "SELECT a.no_nota, a.tanggal_transaksi,
					a.nama_pelanggan, a.no_ktp, a.alamat, a.biaya, b.merk, b.plat FROM
					transaksi a, mobil b where a.id_mobil=b.id_mobil and
					a.id_transaksi='$id_transaksi'");					
list($no_nota, $tanggal, $nama_cust, $no_ktp, $alamat, $biaya,
$merk, $plat) = mysqli_fetch_array($sql);

echo '
			<center><h3>Rental Mobil Wijaya</h3></center><hr/>
			<h4>Nota Nomor : <b>'.$no_nota.'</b></h4>
			<table class="table table-bordered">
<thead>
			<tr class="info">
			<th width="22%">Tanggal</th>
			<td width="2%">:</td>
			<td width="75%">'.date("d M Y", strtotime($tanggal)).'</td>
</tr>
			<tr class="info">
			<th>Jenis Mobil</th>
			<td>:</td>
			<td>'.$merk.'</td>
</tr>
			<tr class="info">
			<th>No. Plat Mobil</th>
			<td>:</td>
			<td>'.$plat.'</td>
</tr>
			<tr class="info">
			<th>Nama Pelanggan</th>
			<td>:</td>
			<td>'.$nama_cust.'</td>
</tr>
			<tr class="info">
			<th>No KTP</th>
			<td>:</td>
			<td>'.$no_ktp.'</td>
</tr>
			<tr class="info">
			<th>Alamat</th>
			<td>:</td>
			<td>'.$alamat.'</td>
</tr>
			<tr class="info">
			<th>Biaya Sewa</th>
			<td>:</td>
			<td>Rp'.number_format($biaya).'</td>
</tr>
</thead>
</table>
		<div style="margin: 0 0 50px 75%;">
		<p style="margin-bottom: 60px;">Petugas Rental</p>
<p>';

$sql = mysqli_query($koneksi, "SELECT nama FROM user WHERE
				id_user='$id_user'");
list($nama) = mysqli_fetch_array($sql);

echo "<b><u>$nama</u></b>";
echo '</p>
</div>
<center>----------------- Terima Kasih ---------------- </center>
</div>
</body>
</html>';
}
?>