<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id		=mysqli_real_escape_string($koneksi, $_SESSION['idgkasis']);
	$sandi	=md5(mysqli_real_escape_string($koneksi, $_POST['password']));

if($_POST['password'] !=$_POST['cpassword']){
			$simpan=null;
	}else if(empty($_POST['password'])){
			$sql="UPDATE guru SET aktif='Y' WHERE nip='$id'";
			$simpan=mysqli_query($koneksi,$sql);
	}else{
			$sql="UPDATE guru SET password='$sandi' WHERE nip='$id'";
			$simpan=mysqli_query($koneksi,$sql);
	}

if(empty($simpan)){
		include "edit.php";
		echo '<script language="JavaScript">';
			echo 'alert("Password dan Konfirmasi Password tidak sesuai!!")';
		echo '</script>';
	}else{
		include "profil.php";
		echo '<script language="JavaScript">';
			echo 'alert("Data Berhasil diupdate.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
