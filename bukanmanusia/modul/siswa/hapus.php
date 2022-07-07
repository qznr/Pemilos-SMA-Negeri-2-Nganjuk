<?php
if(isset($_GET['profil'])){
	include "../sambungan.php";
	$id=$_GET['profil'];
	$sql   = "SELECT * FROM siswa WHERE profil='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['foto']!=''){
		$foto=$r['foto'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../gambar/siswa/$foto");
	}
	$sql   = "DELETE FROM siswa WHERE profil='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location: ?m=siswa");
	}else{
		include "index.php?m=siswa&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal dihapus.")';
		echo '</script>';
	}
}
?>
