<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Login Siswa Pemilos
        <small>Pemilihan Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=kandidat"><i class="fa fa-graduation-cap"></i> Kandidat</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pasangan Calon</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$sql="SELECT * FROM kandidat ORDER BY idkandidat";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
    echo'          <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No U</th>
                  <th>Nama</th>
                </tr>
                </thead>
                <tbody>
         ';       
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
    echo'          <table id="Pemilos1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No U</th>
                  <th>Nama</th>
                </tr>
                </thead>
                <tbody>
        ';        
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>".$r['nokandidat']."</td>";
		echo "<td><a href='?m=kandidat&s=detail&idp=".$r['idkandidat']."'>".$r['nama']."</a></td>";
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No U</th>
                  <th>Nama</th>
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
