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
        <li><a href="?m=kandidat"><i class="fa fa-laptop"></i> Kandidat</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit Kandidat</h3>
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
			 <!--Mulai buat form-->
			 <form action="?m=kandidat&s=update" method="post" enctype="multipart/form-data">
              <table id="Pemilos1" class="table table-bordered table-hover table-striped">
                <tbody>
					<input type="hidden" name="id" value="<?php echo$r['idkandidat'];?>" />
					<tr>
						<td>Nama Lengkap*</td>
						<td><input type="text" name="nama" placeholder="Nama" size="40" maxlength="50" value="<?php echo$r['nama'];?>" required /></td>
					</tr>
					<tr>
						<td>No Kandidat</td>
						<td><input type="number" name="nokandidat" placeholder="No Kandidat" size="10" maxlength="2px" value="<?php echo$r['nokandidat'];?>" /></td>
					</tr>
					<tr>
						<td>Jumlah Suara</td>
						<td><input type="number" name="jsuara" placeholder="Jsuara" size="10" maxlength="10px"/><small> Kosongkan jika tak diubah</small></td>
					</tr>
					<tr>
						<td>Visi</td>
						<td><textarea name="visi" placeholder="Visi" cols="50" rows="4"><?php echo$r['visi'];?></textarea></td>
					</tr>
					<tr>
						<td>Misi</td>
						<td><textarea name="misi" placeholder="Misi" cols="50" rows="8"><?php echo$r['misi'];?></textarea></td>
					</tr>
					<tr>
						<td>Ganti Foto</td>
						<td><input type="file" name="foto" accept="image/*" /><small>Kosongkan jika foto tak diganti</small></td>
					</tr>
					<tr>
						<td colspan=3>
						<input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
						<input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
						<a href="?m=kandidat" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
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
