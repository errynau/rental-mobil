<?php

if(empty($_SESSION['id_user'])){
$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login
terlebih dahulu.';
header('Location: ./');
die();
}

else{
		if(isset($_REQUEST['submit'])){
		$submit = $_REQUEST['submit'];
		$tgl1 = $_REQUEST['tgl1'];
		$tgl2 = $_REQUEST['tgl2'];
		$sql = mysqli_query($koneksi, "select a.no_nota, a.tanggal_transaksi,
						a.nama_pelanggan, a.biaya, b.merk, b.plat from transaksi a, mobil b where
						a.id_mobil=b.id_mobil and a.tanggal_transaksi BETWEEN '$tgl1' AND '$tgl2'");
						
						
if(mysqli_num_rows($sql) > 0){
$no = 0;
echo '<h2>Rekap Laporan Pendapatan <small>
		'.$tgl1.' sampai '.$tgl2.'</small></h2><hr>
		
<div class="col-sm-1">
<a href="?hlm=laporan" id="tombol" class="btn btn-info pullleft">
<span class="glyphicon glyphicon-chevron-left" ariahidden="true">
</span> Kembali</a><br/><br/><br/>
<button id="tombol" onclick="window.print()" class="btn btnwarning">
<span class="glyphicon glyphicon-print" ariahidden="true"></span> Cetak</button>
</div>


<div class="col-sm-11">
	<table class="table table-bordered">
		<thead>
		<tr class="info">
		<th width="5%">No</th>
		<th width="10%">No. Nota</th>
		<th width="10%">Tanggal</th>
		<th width="20%">Nama Pelanggan</th>
		<th width="15%">Jenis Mobil</th>
		<th width="10%">Plat Mobil</th>
		<th width="20%">Biaya</th>
		</tr>
	</thead>
<tbody>';

while($row = mysqli_fetch_array($sql)){
$no++;
echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$row['no_nota'].'</td>
			<td>'.date("d M Y", strtotime($row['tanggal_transaksi'])).'</td>
			<td>'.$row['nama_pelanggan'].'</td>
			<td>'.$row['merk'].'</td>
			<td>'.$row['plat'].'</td>
			<td>Rp'.number_format($row['biaya']).'</td>';
} 
}

echo '
</tbody>
</table>

	<div class="col-sm-6"><table class="table table-bordered">';
		echo '<tr class="info"><th><h4>Jumlah Data</h4></th><th><h4>Jumlah Pendapatan</h4></th></tr>';
		
$sql = mysqli_query($koneksi, "SELECT count(nama_pelanggan), sum(biaya)
				FROM transaksi WHERE tanggal_transaksi BETWEEN '$tgl1' AND '$tgl2'");
				
list($nama, $biaya) = mysqli_fetch_array($sql);{
echo '<tr><td><span class="pull-right"><h4><b>'.$nama.'
data</b></h4></span></td><td><span class="pullright"><h4><b>Rp'.number_format($biaya).'</b></h4></span></td></tr>'
; }
echo '
</table>
</div>
</div>
</div>
</div>';
}

else{
	echo '<h2>Rekap Laporan Pendapatan Hari Ini (<small>
					'.date('d-m-Y').'</small>)</h2><hr>';
?>

<div class="well well-sm noprint">
	<form class="form-inline" role="form" method="post" action="">
<div class="form-group">
	<label class="sr-only" for="tgl1">Mulai</label>
	<input type="date" class="form-control" id="tgl1" name="tgl1"required>
</div>
<div class="form-group">
	<label class="sr-only" for="tgl2">Hingga</label>
	<input type="date" class="form-control" id="tgl2" name="tgl2"required>
</div>
	<button type="submit" name="submit" class="btn btnsuccess">Tampilkan</button>
</form>
</div>

<?php

	echo '<div class="col-sm-6"><table class="table table-bordered">';
	echo '<tr class="info"><th><h4>Jumlah Data</h4></th><th><h4>Jumlah Pendapatan</h4></th></tr>';
	
$tanggal = date('Y-m-d');
	$sql = mysqli_query($koneksi, "SELECT count(nama_pelanggan), sum(biaya)
						FROM transaksi WHERE tanggal_transaksi='$tanggal'");

list($nama, $total) = mysqli_fetch_array($sql);{
		echo '<tr><td><span class="pull-right"><h4><b>'.$nama.'
			data</b></h4></span></td><td><span class="pullright"><h4><b>Rp'.number_format($total).'</b></h4></span></td></tr>'
; }

echo '
</table>
</div>

<div class="col-sm-1">
		<button id="tombol" onclick="window.print()" class="btn btn-warning
			pull-right"><span class="glyphicon glyphicon-print" ariahidden="true"></span> Cetak</button>
</div>
</div>
</div>';
} }
?>