<?php
	include "../sambungan.php";
	$reset = "DELETE FROM datapemilihan";
	$hapus = mysqli_query($koneksi,$reset);

	if($hapus){
//		echo 'Suara Berhasil Direset ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=admin&s=perolehan");
		$edit="UPDATE kandidat SET jumlahsuara=0";
		$update=mysqli_query($koneksi,$edit);
	}else{
		echo 'Gagal RESET';
		echo '<a href="index.php">Kembali</a>';
	}
?>
