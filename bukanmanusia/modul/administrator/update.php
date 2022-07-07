<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['id'];
	$pengguna	=mysqli_real_escape_string($koneksi, $_POST['username']);
	$sandi		=md5(mysqli_real_escape_string($koneksi, $_POST['password']));
	$nama		=mysqli_real_escape_string($koneksi, $_POST['nama']);
	$jabatan	=mysqli_real_escape_string($koneksi, $_POST['jabatan']);
	$hp			=mysqli_real_escape_string($koneksi, $_POST['hp']);
	$surel		=mysqli_real_escape_string($koneksi, $_POST['surel']);
	$aktif		=mysqli_real_escape_string($koneksi, $_POST['aktif']);
	$lokasi		=$_FILES['foto']['tmp_name'];
	$namafile	=$_FILES['foto']['name'];
	
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE pengguna SET username='$pengguna', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', aktif='$aktif' WHERE idpengguna='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE pengguna SET username='$pengguna', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', aktif='$aktif', foto='$namafile' WHERE idpengguna='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE pengguna SET username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', aktif='$aktif' WHERE idpengguna='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE pengguna SET username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', aktif='$aktif', foto='$namafile' WHERE idpengguna='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		$_SESSION['userkasis'] 		= $pengguna;
		$_SESSION['namakasis'] 		= $nama;
		$_SESSION['jabatankasis'] 	= $jabatan;
		if(!empty($lokasi)){
			$_SESSION['fotokasis'] 	= $namafile;
		}
		header('Location:index.php?m=admin&s=awal');
	}else{
		echo "gagal alias tidak berhasil";
		include "edit.php";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
