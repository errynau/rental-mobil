<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} 
else{
if(isset($_REQUEST['submit'])){
    $id_user = $_REQUEST['id_user'];
    $sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id_user'");
		if($sql == true){
			header("Location: ./admin.php?hlm=user");
			die();
		}
    }
}
?>
