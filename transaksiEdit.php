<?php
if(empty($_SESSION['id_user'])){
$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login
terlebih dahulu.';
header('Location: ./');
die();
}
else{
	if(isset($_REQUEST['submit'])){
		$id_transaksi = $_REQUEST['id_transaksi'];
		$nama_cust = $_REQUEST['txtCustomer'];
		$no_ktp = $_REQUEST['numKTP'];
		$alamat = $_REQUEST['txtAlamat'];
		$biaya = $_REQUEST['numBiaya'];
		$id_user = $_SESSION['id_user'];
		$id_mobil = $_REQUEST['cobMerk'];
		
$sql = mysqli_query($koneksi, "UPDATE transaksi SET
			nama_pelanggan='$nama_cust', no_ktp='$no_ktp', alamat='$alamat',
			biaya='$biaya', id_user='$id_user', id_mobil='$id_mobil' WHERE
			id_transaksi='$id_transaksi'");
if($sql == true){
header('Location: ./admin.php?hlm=transaksi');
die();
}
else{
echo 'ERROR! Periksa penulisan querynya.';
} }

else{
$id_transaksi = $_REQUEST['id_transaksi'];
$sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE
id_transaksi='$id_transaksi'");
while($row = mysqli_fetch_array($sql)){
?>
		<h2>Edit Data Transaksi</h2>
<hr>
		<form method="post" action="" class="form-horizontal" role="form">
<div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">No. Nota</label>
<div class="col-sm-3">
		<input type="text" class="form-control" id="no_nota" value="<?php
		echo $row['no_nota']; ?>"name="no_nota" placeholder="No. Nota"
readonly>
</div>
</div>
<div class="form-group">
<label for="merk" class="col-sm-2 control-label">Merk Mobil</label>
<div class="col-sm-3">
<select name="cobMerk" class="form-control" required>
<option value='+'>-- Pilih Merk Mobil --</option>";
<?php
$sql = mysqli_query($koneksi, "select*from mobil");
while($data = mysqli_fetch_array($sql)){
if($data[id_mobil]==$row[id_mobil]){
echo "<option value='$data[id_mobil]' selected>$data[merk] -
$data[tahun] - $data[plat]</option>";
}
else{
echo "<option value='$data[id_mobil]'>$data[merk] - $data[tahun] -
$data[plat]</option>";
} }
?>
</select>
</div>
</div>
<div class="form-group">
<label for="customer" class="col-sm-2 control-label">Nama Customer</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="customer"
name="txtCustomer" value="<?php echo $row['nama_pelanggan']; ?>"
placeholder="Nama Customer" 
required>
</div>
</div>
<div class="form-group">
<label for="numKTP" class="col-sm-2 control-label">No. KTP</label>
<div class="col-sm-3">
<input type="number" class="form-control" id="numKTP" name="numKTP"
value="<?php echo $row['no_ktp']; ?>" placeholder="No. KTP"
required>
</div>
</div>
<div class="form-group">
<label for="txtAlamat" class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="txtAlamat"
name="txtAlamat" value="<?php echo $row['alamat']; ?>"
placeholder="Alamat Customer" required>
</div>
</div>
<div class="form-group">
<label for="numBiaya" class="col-sm-2 control-label">Biaya Sewa</label>
<div class="col-sm-3">
<input type="number" class="form-control" id="numBiaya"
name="numBiaya" value="<?php echo $row['biaya']; ?>"
placeholder="Biaya Sewa" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit" class="btn btnsuccess">Update</button>
<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
</div>
</div>
</form>
<?php
} } }
?>