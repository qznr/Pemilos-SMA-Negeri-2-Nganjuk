<?php
	include "sesi.php";
	include "../sambungan.php";
	$tipe	="Siswa";
	$kandidat=mysqli_real_escape_string($koneksi, $_GET['id']);
	$get="SELECT * FROM datapemilihan WHERE tipe='$tipe', idpemilih='$pemilih'";
	
	$idpemilih=$_SESSION['idskasis'];
	$sqlpilih="SELECT * FROM datapemilihan WHERE idpemilih='$idpemilih'";
	$querypilih=mysqli_query($koneksi,$sqlpilih);
	$ada=mysqli_num_rows($querypilih);
	
        if($_GET['token'] != $_SESSION['form_token']){ //Sesi token udah "expired"
            echo "<strong>What did you do?</strong>"; 
        } else if ($ada>=1){ //Biasanya client ngelag trs ngevote lagi, padahal masih loading...
			echo "<strong>Sabar dek :)</strong>"; 
		} else {
			header('Location:index.php');
			$sql="INSERT INTO datapemilihan SET tipe='$tipe', idpemilih='$idpemilih', idkandidat='$kandidat'";
			$simpan=mysqli_query($koneksi,$sql);
			$edit="UPDATE kandidat SET jumlahsuara=jumlahsuara+1 WHERE idkandidat='$kandidat'";
			$update=mysqli_query($koneksi,$edit);
			//echo "berhasil";
		}
?>