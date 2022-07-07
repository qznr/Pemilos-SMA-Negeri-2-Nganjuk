<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $judul;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- favicon -->
    <link rel="shortcut icon" href="../gambar/logok.png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons https://code.ionicframework.com/ionicons/2.0.1/ -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-green sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="." class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MPK</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>Pemilos</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../gambar/pengguna/<?php echo $_SESSION['fotokasis']; ?>" class="user-image" alt="<?php echo $_SESSION['userkasis']; ?>">
                  <span class="hidden-xs"><?php echo $_SESSION['namakasis']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../gambar/pengguna/<?php echo $_SESSION['fotokasis']; ?>" class="img-circle" alt="<?php echo $_SESSION['userkasis']; ?>">
                    <p>
                      <?php echo $_SESSION['namakasis']; ?>
                      <small><?php echo $_SESSION['jabatankasis']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">SMAN</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">2</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Nganjuk</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?m=admin&s=profil" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../gambar/pengguna/<?php echo $_SESSION['fotokasis']; ?>" class="img-circle" alt="<?php echo $_SESSION['userkasis']; ?>">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['namakasis']; ?></p>
              <a href="?m=admin&s=profil"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <li class="<?php if($aktif=='Beranda') echo 'active';?> treeview">
              <a href=".">
                <i class="fa fa-dashboard"></i> <span>Beranda</span>
              </a>
            </li>
            <li class="<?php if($aktif=='Siswa') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Siswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=siswa"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=siswa&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Guru') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Guru</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=guru"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=guru&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Kandidat') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Kandidat</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=kandidat"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=kandidat&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Admin') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Administrator</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=admin"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=admin&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
                <li><a href="?m=admin&s=perolehan"><i class="fa fa-dashboard"></i> Perolehan</a></li>
                <li><a href="?m=admin&s=suaramasuk"><i class="fa fa-hand-pointer-o"></i> Suara masuk</a></li>
              </ul>
            </li>
            </li>
            <li>
              <a href="logout.php">
                <i class="fa fa-th"></i> <span>Logout</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
