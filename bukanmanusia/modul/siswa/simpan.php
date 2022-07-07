<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$profil	=SHA1($_POST['profil']);
	$jk		=$_POST['jk'];
	$idkelas=$_POST['idkelas'];
	$aktif=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];

	if(empty($pengguna) && empty($_POST['password'])){
		$pengguna=$profil; $sandi=($nama);
	}else if(!empty($pengguna) && empty($_POST['password'])){
		$sandi=($nama);
	}else if(empty($pengguna) && !empty($_POST['password'])){
		$pengguna=$profil;
	}
	if(empty($lokasi)){
		$sql="INSERT INTO siswa SET profil='$profil', username='$pengguna', password='$sandi', nama='$nama', jk='$jk', aktif='$aktif', idkelas='$idkelas'";
	}else{
		include "../fungsi/upload.php";
		$folder="../gambar/siswa/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="INSERT INTO siswa SET profil='$profil', username='$pengguna', password='$sandi', nama='$nama', jk='$jk', aktif='$aktif', idkelas='$idkelas', foto='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=siswa&s=awal');
	}else{
		header('Location:index.php?m=siswa&s=awal');
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
