<?php
	include "../sambungan.php";
	$id		=$_GET['idpemilihan'];
	$idk	=$_GET['idkandidat'];
	$delete="DELETE FROM datapemilihan WHERE idpemilihan='$id'";
	$hapus	= mysqli_query($koneksi,$delete);
	if($hapus){
		header("Location: ?m=admin&s=suaramasuk");
		$edit="UPDATE kandidat SET jumlahsuara=jumlahsuara-1 WHERE idkandidat='$idk'";
		$update=mysqli_query($koneksi,$edit);
	}else{
		echo 'Suara GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
?>
