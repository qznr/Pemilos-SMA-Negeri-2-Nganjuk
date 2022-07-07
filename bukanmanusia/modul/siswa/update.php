<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id=mysqli_real_escape_string($koneksi, $_POST['profil']);
	$pengguna=mysqli_real_escape_string($koneksi, $_POST['username']);
	$sandi	=md5(mysqli_real_escape_string($koneksi, $_POST['password']));
	$nama	=mysqli_real_escape_string($koneksi, $_POST['nama']);
	$jk		=mysqli_real_escape_string($koneksi, $_POST['jk']);
	$idkelas=mysqli_real_escape_string($koneksi, $_POST['kelas']);
	$aktif	=mysqli_real_escape_string($koneksi, $_POST['aktif']);

if(empty($_POST['password'])){
			$sql="UPDATE siswa SET username='$pengguna', nama='$nama', jk='$jk', idkelas='$idkelas', aktif='$aktif' WHERE profil='$id'";
	}else{
			$sql="UPDATE siswa SET username='$pengguna', nama='$nama', jk='$jk', idkelas='$idkelas', password='$sandi', aktif='$aktif' WHERE profil='$id'";
	}
$simpan=mysqli_query($koneksi,$sql);
if($simpan){
		include "tampil.php";
		echo '<script language="JavaScript">';
			echo 'alert("Berhasil.")';
		echo '</script>';
	}else{
		include "edit.php";
		echo '<script language="JavaScript">';
			echo 'alert("Gagal.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
	echo "Kau temukan celah, Laporkan ke admin!";
}
?>
