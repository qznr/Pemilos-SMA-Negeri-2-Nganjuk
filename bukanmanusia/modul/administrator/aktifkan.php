<?php
	include "../sambungan.php";
	$aktifkan 	= "UPDATE siswa t1, guru t2 SET t1.aktif='Y', t2.aktif='Y'";
	$aktif 		= mysqli_query($koneksi,$aktifkan);

	if($aktif){
		header("Location: ?m=admin&s=perolehan");
	}else{
		echo 'Gagal Diaktifkan';
		echo '<a href="index.php">Kembali</a>';
	}
?>
