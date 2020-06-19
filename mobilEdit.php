<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else {
	if(isset( $_REQUEST['submit'])){
		$id_mobil = $_REQUEST['id_mobil'];
		$merk = $_REQUEST['txtMerk'];
		$tahun = $_REQUEST['numTahun'];
		$plat = $_REQUEST['txtPlat'];
		$sql = mysqli_query($koneksi, "UPDATE mobil SET
				merk='$merk', tahun='$tahun',plat='$plat' WHERE
				id_mobil='$id_mobil'");
				
if($sql == true){
	header('Location: ./admin.php?hlm=mobil');
	die();
}
else{
	echo 'ERROR! Periksa penulisan querynya.';
}
}

else{
	$id_mobil = $_REQUEST['id_mobil'];
	$sql = mysqli_query($koneksi, "SELECT * FROM mobil WHERE
						id_mobil='$id_mobil'");
while($row = mysqli_fetch_array($sql)){
?>
<h2>Edit Data Master Mobil</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
<div class="form-group">
<label for="mobil" class="col-sm-2 control-label">Merk Mobil</label>
<div class="col-sm-4">
<input type="hidden" name="id_mobil" value="<?php echo
$row['id_mobil']; ?>">
<input type="text" class="form-control" id="merk" value="<?php echo
$row['merk']; ?>" name="txtMerk" placeholder="Merk Mobil" required>
</div>
</div>
<div class="form-group">
<label for="tahun" class="col-sm-2 control-label">Tahun</label>
<div class="col-sm-2">
<input type="number" class="form-control" id="tahun" value="<?php
echo $row['tahun']; ?>" name="numTahun" placeholder="Tahun"
required>
</div>
</div>
<div class="form-group">
<label for="plat" class="col-sm-2 control-label">Plat Mobil</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="plat" value="<?php echo
$row['plat']; ?>" name="txtPlat" placeholder="Plat Mobil" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit" class="btn btnsuccess">Update</button>
<a href="./admin.php?hlm=mobil" class="btn btn-danger">Batal</a>
</div>
</div>
</form>
<?php
}
}
}
?>