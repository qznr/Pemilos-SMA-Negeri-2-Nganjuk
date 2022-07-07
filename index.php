<html>
	<head>
		<title>Pemilos | SMAN 2 Nganjuk</title>
		<link rel="shortcut icon" href="gambar/logokecil.png">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/zero.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" /> 
		<script src="assets/js/jquery.2.1.1.min.js"></script>
		<!-- <script src="assets/js/bootstrap.js"></script> -->
		<script src="assets/js/zero.js"></script>
	</head>
	<body id="home" class="content danger">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed">
			<div class="container">
				<!-- Header -->
				<div class="navbar-header">
					<a href="." class="navbar-brand">
						<img class="logo" src="gambar/logokecil.png"/>
						<h1>Pemilos</h1>
						<h2>SMAN 2 Nganjuk</h2>
					</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#zero-menu" aria-expanded="true" id="toggle-button">
						<span class="sr-only">Menu Utama</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Menu Navigation -->
				<div class="navbar-collapse collapse" id="zero-menu" aria-expanded="true">
					<ul class="nav navbar-right">
						<li>
							<a href="#home" rel="page-scroll">Beranda</a>
						</li>
						<li>
							<a href="#login" rel="page-scroll" >Login</a>
						</li>
						<li>
							<a href="#kandidat" rel="page-scroll" >Kandidat</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Cover -->
		<div class="cover">
			<div class="cover-overlay">
				<div class="col-lg-7 col-sm-7 col-xs-12 box-title">
					<h1>Pemilos<span class="color-title"> SMADA</span></h1>
					<h2>Pemilihan Ketua dan Wakil Ketua OSIS SMAN 2 Nganjuk (SMADA)</h2>
				</div>
			</div>
		</div>		
		<!-- LOGIN -->
		<div class="row content" id="login">
			<div class="col-lg-12 danger text-center zero-panel">
				<div class="col-lg-12 zero-panel-content">
					<h1><span style="font-weight:bold;"> LOGIN </span></h1>
					<p>Silakan login untuk memberikan suara.</p>
				</div>
				<br>
				<ul class="list-inline" id="chart-skill">
					<li><a href="siswa/" target="_blank">
						<div class="easy-pie-chart percentage" data-percent="100" data-color="#50d379">
							<span class="percent">Login Siswa</span>
						</div></a>
					</li>
					<li><a href="guru/" target="_blank">
						<div class="easy-pie-chart percentage" data-percent="100" data-color="#F7F66B">
							<span class="percent">Login Guru</span>
						</div></a>
					</li>
				</ul>
			</div>
		</div>
		<!-- SUARA MASUK -->
		<div class="row content" id="suara">
			<div class="col-lg-12 danger text-center zero-panel">
				<div class="col-lg-12 zero-panel-content">
					<h1 id="title-about"> TOTAL SUARA MASUK </h1>
						<?php
						include_once "sambungan.php";
						$sqlk="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
						$queryjs=mysqli_query($koneksi,$sqlk);

						$querytss = $koneksi->prepare("SELECT * FROM siswa");
						$querytss->execute();
						$querytss->store_result();

						$jmls = $querytss->num_rows;			
						$querytss->close();	

						$querytgg = $koneksi->prepare("SELECT * FROM guru");
						$querytgg->execute();
						$querytgg->store_result();

						$jmlg = $querytgg->num_rows;			
						$querytgg->close();

						$jmlt = $jmls+$jmlg;
						$rps=mysqli_fetch_array($queryjs);
						$persentase = round((($rps['jsuara']/($jmlt))*100),2,PHP_ROUND_HALF_EVEN);

						if ($persentase <= 100) {
							echo "<h2>".$persentase."% | ".$rps['jsuara']." Suara masuk dari ".$jmlt." pemilih </h2>";
						} else {
							echo "<h2>Suara masuk sedang diverifikasi.</h2>";
						}
						?>
				</div>
			</div>
		</div>
		<!-- KANDIDAT -->
		<div class="row content" id="kandidat">
			<div class="col-lg-12 col-xs-12 danger text-center zero-panel">
				<div class="col-md-8 zero-panel-content">
					<h1 id="title-about"> KANDIDAT KETUA DAN WAKIL KETUA OSIS </h1>
						<?php
						include_once "sambungan.php";
						$sqljs="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
						$queryjs=mysqli_query($koneksi,$sqljs);
						$rjs=mysqli_fetch_array($queryjs);

						$sql="SELECT * FROM kandidat ORDER BY nokandidat";
						$query=mysqli_query($koneksi,$sql);
						while ($r=mysqli_fetch_array($query))
						if($persentase > 100){ // Jika persentase suara > 100
							echo '	<div class="col-lg-4 text-justify col-sm-12" id="text-about-left">	<center>';
							echo "		<h3>No. ".$r['nokandidat']." - ".$r['nama']."</h3>";
							echo "			<h2>Suara masuk sedang diverifikasi</h2>";
							echo '				<img src="gambar/kandidat/'.$r['foto'].'" class="img-circle" height="150px" alt id="img-about'.$r['nokandidat'].'">';
							echo '																		</center>
											<b>VISI:</b><br/>
											<center>'.$r['visi'].'</center>
											<b>MISI:</b><br/>
											'.$r['misi'].'
									</div>';
						} else if ($rjs['jsuara'] > 0) { // Suara masuk > 0
							echo '	<div class="col-lg-4 text-justify col-sm-12" id="text-about-left">	<center>';
							echo "		<h3>No. ".$r['nokandidat']." - ".$r['nama']."</h3>";
							echo "			<h2>".round(($r['jumlahsuara']/$rjs['jsuara']*100),2,PHP_ROUND_HALF_EVEN)."%</h2>";
							echo				$r['jumlahsuara']." suara<br><b>";
							echo '				<img src="gambar/kandidat/'.$r['foto'].'" class="img-circle" height="150px" alt id="img-about'.$r['nokandidat'].'">';
							echo '																		</center>
											<b>VISI:</b><br/>
											<center>'.$r['visi'].'</center>
											<b>MISI:</b><br/>
											'.$r['misi'].'
									</div>';
						} else { // Jika belum ada suara masuk
							echo '	<div class="col-lg-4 text-justify col-sm-12" id="text-about-left">	<center>';
							echo "		<h3>No. ".$r['nokandidat']." - ".$r['nama']."</h3>";
							echo "			<h2>Belum ada suara masuk!</h2>";
							echo '				<img src="gambar/kandidat/'.$r['foto'].'" class="img-circle" height="150px" alt id="img-about'.$r['nokandidat'].'">';
							echo '																		</center>
											<b>VISI:</b><br/>
											<center>'.$r['visi'].'</center>
											<b>MISI:</b><br/>
											'.$r['misi'].'
									</div>';
						}	
						?>
				</div>
			</div>
		</div>
		<!-- FOOTER -->
		<footer class="primary text-center">
			<div class="row">
				<div class="col-md-4">
					<h3>Pemilos by</h3>
					<p>MPK © 2021 <a href="https://www.instagram.com/mpksman2ngk/" target="_blank">Official IG MPK</a><i> Website by <a href="https://twitter.com/qznr_" target="_blank"> Moch. Gustav Ali R.</a></i> <!-- Jangan dihapus, tolong hargai saya --></p>
				</div>
				<div class="col-md-4">
					<h3>TEMUKAN SMADA</h3>
						<a href="https://https://www.facebook.com/sman2nganjuk/" target="_blank" class="btn btn-xs btn-outline"><i class="fa fa-facebook fa-2x"></i></a>
						<a href="https://www.instagram.com/smada_nganjuk_official/" target="_blank" class="btn btn-xs btn-outline"><i class="fa fa-instagram fa-2x"></i></a>
				</div>
				<div class="col-md-4">
					<h3>LOKASI</h3>
					<p>Jalan Anjuk ladang No.09 Ploso Nganjuk-64417</p>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="assets/js/jquery.easypiechart.min.js"></script>
		<script>
			var img = ['gambar/Smadadepan.jpg'];
			$(".cover").zeroSlide(img, 5000);

			// SKILL CHART
			var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
			$('.easy-pie-chart.percentage').each(function(){
				$(this).easyPieChart({
					barColor: $(this).data('color'),
					trackColor: '#DDD',
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: 30,
					animate: oldie ? false : 1000,
					size:264
				}).css('color', $(this).data('color'));
			});
		</script>
	</body>
</html>
