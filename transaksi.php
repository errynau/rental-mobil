<?php

if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
		die();
}
	else{
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
			switch($aksi){
				case 'add':
				include 'transaksiAdd.php';
				break;
				case 'edit':
				include 'transaksiEdit.php';
				break;
				case 'delete':
				include 'transaksiDelete.php';
				break;
				case 'print':
				include 'transaksiPrint.php';
				break;
}
}

else{
	echo '
		<div class="container">
			<h3 style="margin-bottom: -20px;">Daftar Transaksi</h3>
			<a href="./admin.php?hlm=transaksi&aksi=add" class="btn btn-success
			btn-s pull-right">Tambah Data Transaksi</a>
			<br/><hr/>
			<table class="table table-bordered">

			<thead>
			<tr class="info">
			<th width="5%">No</th>
			<th width="10%">No. Nota</th>
			<th width="10%">Tanggal</th>
			<th width="20%">Nama Pelanggan</th>
			<th width="20%">Merk</th>
			<th width="10%">Total Bayar</th>
			<th width="20%">Tindakan</th>
</tr>
</thead>
<tbody>';

//skrip untuk menampilkan data dari database
	$sql = mysqli_query($koneksi, "SELECT a.id_transaksi, a.no_nota,
		a.tanggal_transaksi, a.nama_pelanggan, a.biaya, b.merk FROM transaksi a, mobil b
		where a.id_mobil=b.id_mobil and a.id_user=$_SESSION[id_user]");
		
if(mysqli_num_rows($sql) > 0){
$no = 0;
while($row = mysqli_fetch_array($sql)){
$no++;

echo '
	<tr>
		<td>'.$no.'</td>
		<td>'.$row['no_nota'].'</td>
		<td>'.date("d M Y", strtotime($row['tanggal_transaksi'])).'</td>
		<td>'.$row['nama_pelanggan'].'</td>
		<td>'.$row['merk'].'</td>
		<td>Rp'.number_format($row['biaya'],0,",",".").'</td>
		<td>

<script type="text/javascript" language="JavaScript">
function konfirmasi(){tanya = confirm("Anda yakin akan menghapus data ini?");
if (tanya == true)
return true;
else
return false;
}
</script>
	<a href="?hlm=print&id_transaksi='.$row['id_transaksi'].'"
class="btn btn-info btn-s" target="_blank">Cetak Nota</a>
	<a href="?hlm=transaksi&aksi=edit&id_transaksi=
'.$row['id_transaksi'].'" class="btn btn-warning btn-s">Edit</a>
	<a href="?hlm=transaksi&aksi=delete&submit=yes&id_transaksi=
'.$row['id_transaksi'].'" onclick="return konfirmasi()" class="btn
btn-danger btn-s">Hapus</a>
</td>';
}
}

else{
echo '<td colspan="8"><center><p class="add">Tidak ada data untuk
		ditampilkan. <u><a href="?hlm=transaksi&aksi=add">Tambah data Transaksi</a></u> </p></center></td></tr>';
}
echo '
</tbody>
</table>
</div>';
}
}
?>