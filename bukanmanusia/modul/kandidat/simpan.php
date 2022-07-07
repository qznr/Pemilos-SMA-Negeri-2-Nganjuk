<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$nama		=mysqli_real_escape_string($koneksi, $_POST['nama']);
	$nokandidat	=mysqli_real_escape_string($koneksi, $_POST['nokandidat']);
	$jsuara		=mysqli_real_escape_string($koneksi, $_POST['jsuara']);
	$visi		=mysqli_real_escape_string($koneksi, $_POST['visi']);
	$misi		=mysqli_real_escape_string($koneksi, $_POST['misi']);
	$lokasi		=$_FILES['foto']['tmp_name'];
	$namafile	=$_FILES['foto']['name'];

	if(empty($jsuara)){
		if(empty($lokasi)){
			$sql="INSERT INTO kandidat SET idkandidat='$nokandidat', nama='$nama', jumlahsuara=0, nokandidat='$nokandidat', visi='$visi', misi='$misi', foto='0.jpg'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/kandidat/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="INSERT INTO kandidat SET idkandidat='$nokandidat', nama='$nama', jumlahsuara=0 nokandidat='$nokandidat', visi='$visi', misi='$misi', foto='$namafile'";
		}
	}else{
		if(empty($lokasi)){
			$sql="INSERT INTO kandidat SET idkandidat='$nokandidat', nama='$nama', jumlahsuara='$jsuara', nokandidat='$nokandidat', visi='$visi', misi='$misi', foto='0.jpg'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/kandidat/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="INSERT INTO kandidat SET idkandidat='$nokandidat', nama='$nama', jumlahsuara='$jsuara', nokandidat='$nokandidat', visi='$visi', misi='$misi', foto='$namafile'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=kandidat&s=awal');
	}else{
		header('Location:index.php?m=kandidat&s=awal');
		echo '<script language="JavaScript">';
			echo 'alert("Data gagal ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
