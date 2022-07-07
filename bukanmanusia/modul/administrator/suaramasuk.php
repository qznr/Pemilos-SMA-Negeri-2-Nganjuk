<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Pemilos
        <small>Pemilihan Ketua dan Wakil Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=admin"><i class="fa fa-laptop"></i> Administrator</a></li>
        <li class="active">Data Suara Masuk</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Suara Masuk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="Pemilos1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Pemilihan</th>
                  <th>Tipe</th>
                  <th>Nama</th>
                  <th>ID Kandidat</th>
                  <th>Waktu</th>
                </tr>
                </thead>
                <tbody>
                
<?php
include "../sambungan.php";
$sql="SELECT nip, nama, idpemilihan, tipe, idkandidat, waktu FROM guru, datapemilihan WHERE nip = idpemilih UNION SELECT profil, nama, idpemilihan, tipe, idkandidat, waktu FROM siswa, datapemilihan WHERE profil = idpemilih ORDER BY idpemilihan";
$query=mysqli_query($koneksi,$sql);

if(mysqli_num_rows($query)==0){
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
	$no=1;

	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>$no</td>";
		echo "<td>".$r['idpemilihan']."</td>";
		echo "<td>".$r['tipe']."</td>";
		echo "<td>".$r['nama']."</td>";
		echo "<td>".$r['idkandidat']."</td>";
		echo "<td>".$r['waktu']."</td>";
		echo '<td> <a href="index.php?m=admin&s=hapussuara&idpemilihan='.$r['idpemilihan'].'&idkandidat='.$r['idkandidat'].'" onclick="return confirm(\'Yakin Akan dihapus?\')">Hapus</a></td>';
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>ID Pemilihan</th>
                  <th>Tipe</th>
                  <th>Nama</th>
                  <th>ID Kandidat</th>
                  <th>Waktu</th>
                </tr>
                </tfoot>
              </table>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<?php include "bawah.php"; ?>
