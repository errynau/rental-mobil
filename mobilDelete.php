<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else{
if(isset($_REQUEST['submit'])){
    $id_mobil = $_REQUEST['id_mobil'];
    $sql = mysqli_query($koneksi, "DELETE FROM mobil WHERE id_mobil='$id_mobil'");
		if($sql == true){
			header("Location: ./admin.php?hlm=mobil");
			die();
		}
    }
}
?>
