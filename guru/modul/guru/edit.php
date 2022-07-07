<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adminiptrator Pemilos
        <small>Pemilihan Ketua dan Wakil OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=guru"><i class="fa fa-laptop"></i> Guru</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit Guru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_SESSION['idgkasis'];
include "../sambungan.php";
$sql="SELECT * FROM guru WHERE nip='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=guru&s=update" method="post" enctype="multipart/form-data">
              <table id="Pemilos1" class="table table-bordered table-hover table-striped">
                <tbody>
					<input type="hidden" name="nip" value="<?php echo$_SESSION['idgkasis'];?>" readonly />
					<tr>
						<td width=150>Username</td>
						<td><?php echo$r['username'];?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" id="password" placeholder="Kosongkan jika tak diubah" size="25px" maxlength="32px" /> <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Tampilkan</td>
					</tr>
					<tr>
						<td>Konfirmasi Password</td>
						<td><input type="password" name="cpassword" id="cpassword" placeholder="Kosongkan jika tak diubah" size="25px" maxlength="32px" /> <input type="checkbox" onchange="document.getElementById('cpassword').type = this.checked ? 'text' : 'password'"> Tampilkan</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td><?php echo$r['nama'];?></td>
					</tr>
					<tr>
						<td colspan=3>
						<input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
						<input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
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
