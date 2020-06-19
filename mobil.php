<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else {
	if(isset( $_REQUEST['aksi'])){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'add':
				include 'mobilAdd.php';
				break;
			case 'edit':
				include 'mobilEdit.php';
				break;
			case 'delete':
				include 'mobilDelete.php';
				break;
		}
	} 
	else {
		echo '
			<div class="container">
			<div class="col-md-8">
				<h3 style="margin-bottom: -20px;">Daftar Mobil</h3>
					<a href="./admin.php?hlm=mobil&aksi=add" class="btn btn-success btn-s pull-right">Tambah Mobil</a><br>

				<table class="table table-bordered">
						<thead>
						<tr class="info">
						<th width="5%">No</th>
						<th width="20%">Merk</th>
						<th width="10%">Tahun</th>
						<th width="15%">Plat</th>
						<th width="15%">Status</th>
						<th width="30%">Aksi</th>
						</tr>
						</thead>
<tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM mobil ");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				
				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '
				
				   <tr>
						<td>'.$no.'</td>
						<td>'.$row['merk'].'</td>
						<td>'.$row['tahun'].'</td>
						<td>'.$row['plat'].'</td>
				<td>';
						if($row['status'] == 1){
							echo 'Tersedia';
							}
							else{
							echo 'Disewa';
}
						echo'</td>
				<td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus Mobil ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=mobil&aksi=edit&id_mobil='.$row['id_mobil'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=mobil&aksi=delete&submit=yes&id_mobil='.$row['id_mobil'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=mobil&aksi=add">Tambah Mobil baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
