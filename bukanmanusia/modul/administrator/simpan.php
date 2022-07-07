<?php
include "sesi.php";
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$pengguna	=$_POST['username'];
	$sandi		=md5(trim($_POST['password']));
	$nama		=$_POST['nama'];
	$jabatan	=$_POST['jabatan'];
	$hp			=$_POST['hp'];
	$surel		=$_POST['surel'];
	$aktif		=$_POST['aktif'];
	$lokasi		=$_FILES['foto']['tmp_name'];
	$namafile	=$_FILES['foto']['name'];
	
	if(empty($lokasi)){
		$sql="INSERT INTO pengguna SET idpengguna='', username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', aktif='$aktif'";
	}else{
		include "../fungsi/upload.php";
		$folder="../gambar/pengguna/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="INSERT INTO pengguna SET idpengguna='', username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', aktif='$aktif', foto='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:?m=admin&s=awal');
	}else{
		include "?m=admin&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
