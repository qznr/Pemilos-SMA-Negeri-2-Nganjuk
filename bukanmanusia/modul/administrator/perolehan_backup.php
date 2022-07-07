<?php include "atas.php"; ?>
<meta http-equiv="refresh" content="3" > 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Pemilos
        <small>Pemilihan Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=admin"><i class="fa fa-laptop"></i> Administrator</a></li>
        <li class="active">Perolehan</li>
      </ol>
    </section>

<?php
include_once "../sambungan.php";
$sql="SELECT * FROM kandidat ORDER BY nokandidat";
$query=mysqli_query($koneksi,$sql);
$sqljs="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
$queryjs=mysqli_query($koneksi,$sqljs);
$rjs=mysqli_fetch_array($queryjs);

while($r=mysqli_fetch_array($query))
if($rjs['jsuara'] > 0) {		  
echo '        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">';
echo "<h3>".$r['nokandidat']."</h3>";
echo "<h2>".round(($r['jumlahsuara']/$rjs['jsuara']*100),2,PHP_ROUND_HALF_EVEN)."%</h2>";
echo $r['jumlahsuara']." suara<br><b>";
echo $r['nama']."</b>";
echo '            </div>
            <div class="icon">
              <img src="../gambar/kandidat/'.$r['foto'].'" height="100px"/>
            </div>';
        echo '  </div>
        </div>';
} else {
echo '        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">';
echo "<h3>".$r['nokandidat']."</h3>";
echo "<h2>Belum ada suara masuk!</h2>";
echo $r['nama']."</b>";
echo '            </div>
            <div class="icon">
              <img src="../gambar/kandidat/'.$r['foto'].'" height="100px"/>
            </div>';
        echo '  </div>
        </div>';
}
?>        
    </div>
<?php include "bawah.php"; ?>