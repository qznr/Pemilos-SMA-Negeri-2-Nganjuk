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
	
	if($_POST['jsuara']==''){ // isset($jsuara) when $jsuara='' is true instead of false for some reason
		$jsuara=null;
	}

	if(isset($jsuara)){
		if(empty($lokasi)){
			$sql="UPDATE kandidat SET nama='$nama', nokandidat='$nokandidat', jumlahsuara='$jsuara', visi='$visi', misi='$misi' WHERE idkandidat='$nokandidat'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/kandidat/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE kandidat SET nama='$nama', nokandidat='$nokandidat', jumlahsuara='$jsuara', visi='$visi', misi='$misi', foto='$namafile' WHERE idkandidat='$nokandidat'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE kandidat SET  nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi' WHERE idkandidat='$nokandidat'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/kandidat/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE kandidat SET nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi', foto='$namafile' WHERE idkandidat='$nokandidat'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=kandidat&s=awal');
	}else{
		header('Location:index.php?m=kandidat&s=awal');
		echo '<script language="JavaScript">';
			echo 'alert("Data gagal diupdate.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
