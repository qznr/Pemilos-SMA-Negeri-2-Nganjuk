<?php
	include "../sambungan.php";
	$nonaktifkan 	= "UPDATE siswa t1, guru t2 SET t1.aktif='T', t2.aktif='T'";
	$nonaktif 		= mysqli_query($koneksi,$nonaktifkan);

	if($nonaktif){
		header("Location: ?m=admin&s=perolehan");
	}else{
		echo 'Gagal Dinonaktifkan';
		echo '<a href="index.php">Kembali</a>';
	}
?>