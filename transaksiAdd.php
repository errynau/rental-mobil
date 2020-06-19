<?php

if(empty($_SESSION['id_user'])){
$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login
terlebih dahulu.';
header('Location: ./');
die();
}

else{
	if(isset($_REQUEST['submit'])){
		$no_nota = $_REQUEST['no_nota'];
		$nama_cust = $_REQUEST['txtCustomer'];
		$no_ktp = $_REQUEST['numKTP'];
		$alamat = $_REQUEST['txtAlamat'];
		$biaya = $_REQUEST['numBiaya'];
		$id_user = $_SESSION['id_user'];
		$id_mobil = $_REQUEST['cobMerk'];
		
$sql = mysqli_query($koneksi, "INSERT INTO
		transaksi(no_nota, tanggal_transaksi, nama_pelanggan, no_ktp, alamat, biaya,
		id_user, id_mobil)
		VALUES('$no_nota', now(), '$nama_cust', '$no_ktp',
		'$alamat', '$biaya', '$id_user', '$id_mobil')");
		
if($sql == true){
header('Location: admin.php?hlm=transaksi');
die();
}

else{
echo 'ERROR! Periksa penulisan querynya.';
}
}
?>

		<h2>Tambah Transaksi Baru</h2>
<hr>
		<form method="post" action="" class="form-horizontal" role="form">
		<div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">No. Nota</label>
		<div class="col-sm-3">
<?php
	$sql = mysqli_query($koneksi, "SELECT no_nota FROM transaksi");
	echo '<input type="text" class="form-control" id="no_nota" value="';
	$no_nota = "SMD1";
if(mysqli_num_rows($sql) == 0){
echo $no_nota;
}
$result = mysqli_num_rows($sql);
$counter = 0;
while(list($no_nota) = mysqli_fetch_array($sql)){
if (++$counter == $result) {
$no_nota++;
echo $no_nota;
}
}
echo '"name="no_nota" placeholder="No. Nota" readonly>';
?>
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
echo "<option value='$data[id_mobil]'>$data[merk] - $data[tahun] -
$data[plat]</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
<label for="cutomer" class="col-sm-2 control-label">Nama Customer</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="customer"
name="txtCustomer" placeholder="Nama pelanggan" required>
</div>
</div>
<div class="form-group">
<label for="KTP" class="col-sm-2 control-label">No. KTP</label>
<div class="col-sm-3">
<input type="number" class="form-control" id="numKTP" name="numKTP"
placeholder="Isikan No. KTP" required>
</div>
</div>
<div class="form-group">
<label for="alamat" class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-3">
<textarea class="form-control" name="txtAlamat"></textarea>
</div>
</div>
<div class="form-group">
<label for="biaya" class="col-sm-2 control-label">Biaya Sewa</label>
<div class="col-sm-3">
<input type="number" class="form-control" id="numBiaya"
name="numBiaya" placeholder="Isi dengan angka" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit" class="btn btnsuccess">Simpan</button>
<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
</div>
</div>
</form>
<form>
	<div class="form-group">
	<label for="harga" class="col-sm-offset-2 control-label">Harga</label>
	<div class="col-sm-3">
		<input type="disable" class="form-control" id="total">
	</div>
	</form>
<?php
}
?>