<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['nip'];
	$pengguna=mysqli_real_escape_string($koneksi, $_POST['username']);
	$sandi	=md5(mysqli_real_escape_string($koneksi, $_POST['password']));
	$nama	=mysqli_real_escape_string($koneksi, $_POST['nama']);
	$aktif	="Y";

	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', aktif='$aktif' WHERE nip='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/guru/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', aktif='$aktif', foto='$namafile' WHERE nip='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE guru SET username='$pengguna', password='$sandi', nama='$nama', aktif='$aktif' WHERE nip='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE guru SET username='$pengguna', password='$sandi', nama='$nama', aktif='$aktif', foto='$namafile' WHERE nip='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=guru&s=awal');
	}else{
		include "index.php?m=guru&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate, kemungkinan username sudah digunakan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
