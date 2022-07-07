<?php include "atas.php";?>
<meta http-equiv="refresh" content="30" > 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/styleperolehan.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perolehan Suara
        <small>Pemilihan Ketua dan Wakil Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=admin"><i class="fa fa-laptop"></i> Administrator</a></li>
        <li class="active">Perolehan</li>
      </ol>
    </section>
	<!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12 bg-light">
            <!-- /.box-header -->
			<div class="box-header"></div>
				<div class="box-body">
					<!-- VARIABLES -->
					<?php
					include_once "../sambungan.php";
					$sqlk="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
					$queryjs=mysqli_query($koneksi,$sqlk);

					$r=mysqli_fetch_array($queryjs);

					$querytss = $koneksi->prepare("SELECT * FROM siswa");
					$querytss->execute();
					$querytss->store_result();

					$jmls = $querytss->num_rows;			
					$querytss->close();	

					$querytgg = $koneksi->prepare("SELECT * FROM guru");
					$querytgg->execute();
					$querytgg->store_result();

					$jmlg = $querytgg->num_rows;
					$jmlt = $jmls + $jmlg;
					$querytgg->close();	
					?>
					<!-- PERSENTASE TOTAL -->		
					<div class="row">
						<div class="col-xs-4">
							<div class="row">
								<div class="col-xs-3 col-md-3 bg-aqua"><center><i class="fa fa-dashboard white-color" style="font-size:4em;" ></i></div>
									<div class="col-xs-8 col-md-8 bg-white padding6" style="font-size:14px; background-color:white" >PERSENTASE PEROLEHAN
										<?php echo "<p><font size='6em'><strong>" .round((($r['jsuara']/($jmlt))*100),2,PHP_ROUND_HALF_EVEN)."%</font></strong></p>"; //Tis' a heresy ?>
									</div>
								</div>
							</div>
					<!-- JUMLAH SUARA -->
					<div class="col-xs-4">
						<div class="row">			
							<div class="col-xs-3 bg-green"><center><i class="fa fa-users white-color" style="font-size:4em;"></i></div>
								<div class="col-xs-8 padding8" style="font-size:14px; background-color:white">JUMLAH PEMILIH			
										<?php echo "<p><font size='6em'><strong>".($jmls+$jmlg)."</font></strong></p>";?>
								</div>
							</div>		
						</div>			
					<!-- TOTAL SUARA MASUK -->
					<div class="col-xs-4">
						<div class="row">
							<div class="col-xs-3 bg-red"><center><i class="fa fa-hand-pointer-o white-color" style="font-size:4em;"></i></div>
								<div class="col-xs-8 padding8" style="font-size:14px; background-color:white"> TOTAL SUARA MASUK
									<?php echo "<p><font size='6em'><strong>".$r['jsuara']."</font></strong></p>";?>	
								</div>	
							</div>	
						</div>	
					</div>	
					<!-- SUARA MASUK -->
					<div class="row content">
						<?php
						include_once "../sambungan.php";
						$sql="SELECT * FROM kandidat ORDER BY nokandidat";
						$query=mysqli_query($koneksi,$sql);
						$sqljs="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
						$queryjs=mysqli_query($koneksi,$sqljs);
						$rjs=mysqli_fetch_array($queryjs);

						while($r=mysqli_fetch_array($query))
						if($rjs['jsuara'] > 0) {		  
						echo '	<div class="col-xs-12">
									<!-- small box -->
									<div class="small-box bg-blue">
										<div class="inner">';
						echo "<h3>".$r['nokandidat']."</h3>";
						echo "<h2>".round(($r['jumlahsuara']/$rjs['jsuara']*100),2,PHP_ROUND_HALF_EVEN)."%</h2>";
						echo $r['jumlahsuara']." suara<br>";
						echo "<b>".$r['nama']."</b>";
						echo '			</div>
										<div class="icon">
											<img src="../gambar/kandidat/'.$r['foto'].'" height="100px""/>
										</div>';
						echo '		</div>
								</div>';
						} else {
						echo '	<div class="col-xs-12">
									<!-- small box -->
									<div class="small-box bg-blue">
										<div class="inner">';
						echo "<h3>".$r['nokandidat']."</h3>";
						echo "<h2>Belum ada suara masuk!</h2>";
						echo "<b>".$r['nama']."</b>";
						echo '			</div>
										<div class="icon">
											<img src="../gambar/kandidat/'.$r['foto'].'" height="100px"/>
										</div>';
						echo '		</div>
								</div>';
						} ?> 
					</div>
					<!-- STATUS PEMILIH -->
					<div class="row content">
						<div class="col-lg-6 col-xs-12">
							<div><?php echo '<center><a href="index.php?m=admin&s=aktifkan" onclick="return confirm(\'PEMILIH AKAN DIAKTIFKAN\')"><font size="6em"><strong><i class="fa fa-plus-square"> AKTIFKAN PEMILIH </i></font></strong></a>';?></div>
						</div>
						<div class="col-lg-6 col-xs-12">	
							<div><?php echo '<center><a href="index.php?m=admin&s=nonaktifkan" onclick="return confirm(\'PEMILIH AKAN DINONAKTIFKAN\')"><font size="6em"><strong><i class="fa fa-minus-square"> NONAKTIFKAN PEMILIH </i></font></strong></a>';?></div>	
						</div>
					</div>	
					<!-- PEMILIH YANG SUDAH VOTE-->
					<div class="row content">
							<!-- SISWA YANG SUDAH VOTE -->
							<div class="column">		<center>
								<h2 class="box-title">Siswa Terakhir Yang Memilih</h2> </center>
									<?php
									$sqlts="SELECT * FROM datapemilihan t1, siswa t2 WHERE t1.idpemilih = t2.profil ORDER BY t1.idpemilihan DESC"; //Ambil datatable datapemilihan dan siswa dimana datapemilihan.idpemilih=siswa.profil
									$queryts=mysqli_query($koneksi,$sqlts);
									echo "<ol>" ;
									while($m=mysqli_fetch_assoc($queryts)){
										echo "<li>".$m['nama']." - ".$m['idkelas']." - ".$m['waktu']."</li>";
									}	echo "</ol>"; ?>
							</div>
							<!-- GURU YANG SUDAH VOTE -->
							<div class="column">		<center>
								<h2 class="box-title">Guru Terakhir Yang Memilih</h2> </center>
									<?php
									$sqltg="SELECT * FROM datapemilihan t1, guru t2 WHERE t1.idpemilih = t2.nip ORDER BY t1.idpemilihan DESC"; 
									$querytg=mysqli_query($koneksi,$sqltg);
									echo "<ol>" ;
									while($m=mysqli_fetch_assoc($querytg)){
										echo "<li>".$m['nama']." - ".$m['waktu']."</li>";
									}	echo "</ol>"; ?>
							</div>
					</div>
					<!-- PEMILIH YANG BELUM VOTE -->
					<div class="row content">
							<!-- SISWA YANG BELUM VOTE -->
							<div class="column">		<center>
								<h2> Siswa Yang Belum Memilih </h2> </center>
								<?php
								$sqlbs="SELECT * FROM siswa WHERE profil NOT IN (SELECT idpemilih FROM datapemilihan) ORDER BY siswa.idkelas ASC, nama ASC";
								$querybs=mysqli_query($koneksi,$sqlbs);
								echo "<ol>";		
								while($m=mysqli_fetch_array($querybs)){	
									echo "<li>".$m['nama']." - ".$m['idkelas']."</li>";
								}	echo "</ol>"; ?>	
							</div>
							<!-- GURU YANG BELUM VOTE -->
							<div class="column">		<center> 
								<h2> Guru Yang Belum Memilih </h2> </center>
								<?php
								$sqltg="SELECT * FROM guru WHERE nip NOT IN (SELECT idpemilih FROM datapemilihan) ORDER BY nama";
								$querytg=mysqli_query($koneksi,$sqltg);
								echo "<ol>";		
								while($g=mysqli_fetch_array($querytg)){
									echo "<li>".$g['nama']."</li>";
								}	echo "</ol>"; ?>	
							</div>
					</div>
					<!-- RESET SUARA MASUK -->
					<div>						
						<?php echo '<a href="index.php?m=admin&s=reset" onclick="return confirm(\'SUARA MASUK AKAN DIRESET\')"><i class="fa fa-remove"> RESET SUARA MASUK </i></a>'; ?>
					</div>
				<!-- /.box-body -->
				</div>
			<!-- /.box-header -->
			</div>
        <!-- /.col -->
        </div>
      <!-- /.row -->
	  </div>
    </section>
<?php include "bawah.php"; ?>