<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else {
	if(isset( $_REQUEST['submit'])){
	$merk = $_REQUEST['txtMerk'];
	$tahun = $_REQUEST['numTahun'];
	$plat = $_REQUEST['txtPlat'];
	$sql = mysqli_query($koneksi, "INSERT INTO mobil(merk, tahun, plat,status)
						VALUES('$merk', '$tahun', '$plat', '1')");
						
if($sql == true){
header('Location: ./admin.php?hlm=mobil');
die();
}

else{
echo 'ERROR! Periksa penulisan querynya.';
}
}

else{
?>
		<h2>Tambah Data Master Mobil</h2>
<hr>
		<form method="post" action="" class="form-horizontal" role="form">
		<div class="form-group">
		<label for="merk" class="col-sm-2 control-label">Merk Mobil</label>
		<div class="col-sm-4">
		<input type="text" class="form-control" id="merk" name="txtMerk"
		placeholder="Merk Mobil" required>
</div>
</div>
		<div class="form-group">
		<label for="tahun" class="col-sm-2 control-label">Tahun</label>
		<div class="col-sm-2">
		<input type="number" class="form-control" id="tahun" name="numTahun"
		placeholder="Tahun" required>
</div>
</div>
		<div class="form-group">
		<label for="plat" class="col-sm-2 control-label">Plat Mobil</label>
		<div class="col-sm-3">
		<input type="text" class="form-control" id="plat" name="txtPlat"
		placeholder="No. Plat Mobil" required>
</div>
</div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="submit" class="btn
		btn-success">Simpan</button>
		<a href="./admin.php?hlm=mobil" class="btn btn-danger">Batal</a>
</div>
</div>
</form>
<?php
}
}
?>