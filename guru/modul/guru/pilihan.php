<?php

 // start session
	include "sesi.php";
	include "../sambungan.php";
	$tipe	="Guru";
	$pemilih=mysqli_real_escape_string($koneksi, $_SESSION['idgkasis']);
	$kandidat=mysqli_real_escape_string($koneksi, $_GET['id']);
	$get="SELECT * FROM datapemilihan WHERE tipe='$tipe', idpemilih='$pemilih'";
	
	$idpemilih=$_SESSION['idgkasis'];
	$sqlpilih="SELECT * FROM datapemilihan WHERE idpemilih='$idpemilih'";
	$querypilih=mysqli_query($koneksi,$sqlpilih);
	$ada=mysqli_num_rows($querypilih);
	
        if($_GET['token'] != $_SESSION['form_token']){
            echo "Anda sudah memilih!";
        } else if ($ada>=1){ //Biasanya client ngelag trs ngevote lagi, padahal masih loading...
			echo "<strong>Anda sudah memilih!</strong>";
		} else {
			header('Location:index.php');
			$sql="INSERT INTO datapemilihan SET tipe='$tipe', idpemilih='$pemilih', idkandidat='$kandidat'";
			$simpan=mysqli_query($koneksi,$sql);
			$edit="UPDATE kandidat SET jumlahsuara=jumlahsuara+1 WHERE idkandidat='$kandidat'";
			$update=mysqli_query($koneksi,$edit);
			//echo "berhasil";
		}
?>
