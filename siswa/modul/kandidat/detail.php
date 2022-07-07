<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Siswa Pemilos
        <small>Pemilihan Ketua dan Wakil Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=kandidat"><i class="fa fa-laptop"></i> Pasangan Calon</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pasangan Calon</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idp'];
include "../sambungan.php";
$sql="SELECT * FROM kandidat WHERE idkandidat='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="Pemilos1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td>Nama Pasangan Calon</td>
						<td><?php echo$r['nama'];?></td>
					</tr>
					<tr>
						<td>No Urut Paslon</td>
						<td><?php echo$r['nokandidat'];?></td>
					</tr>
					<tr>
						<td>Visi</td>
						<td><?php echo$r['visi'];?></td>
					</tr>
					<tr>
						<td>Misi</td>
						<td><?php echo$r['misi'];?></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php 
						if ($r['foto']!=''){
						  echo "<img src=\"../gambar/kandidat/$r[foto]\" width=250 />";  
						}
						else{
						  echo "<img src=\"../gambar/kandidat/0.jpg\">";
						}
?>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=kandidat" class="btn btn-large btn-danger"><i class="fa fa-arrow-left"></i> List</a></td>
					</tr>
                </tbody>
              </table>
			 </form>
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