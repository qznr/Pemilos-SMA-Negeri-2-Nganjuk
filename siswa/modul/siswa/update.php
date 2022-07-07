<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id		=mysqli_real_escape_string($koneksi, $_SESSION['idskasis']);
	$sandi	=md5(mysqli_real_escape_string($koneksi, $_POST['password']));
	$jk		=mysqli_real_escape_string($koneksi, $_POST['jk']);

if($_POST['password'] !=$_POST['cpassword']){
			$simpan=null;
	}else if(empty($_POST['password'])){
			$sql="UPDATE siswa SET jk='$jk' WHERE profil='$id'";
			$simpan=mysqli_query($koneksi,$sql);
	}else{
			$sql="UPDATE siswa SET password='$sandi', jk='$jk' WHERE profil='$id'";
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
	echo "Kau temukan celah, Laporkan ke admin!";
}
?>
