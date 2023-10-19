<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="logo.png">
  <title>Inventori</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Bootstrap for treeview  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="dist/bootstrap-treeview.min.css" type="text/css" media="all">
  <script src="dist/bootstrap-treeview.min.js"></script>
  <script src="script/script.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
   
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
            <?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }

  ?>
       
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
         <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><b><?php echo $_SESSION['username']; ?></b></p>
          <a href="#"><?php echo $_SESSION['level']; ?></a>
        </div>
      </div>

      <ul class="sidebar-menu"  data-widget="tree">
      <li class="header">BARANG DENGAN KODE</li>
      <li class="treeview">
        <li><a href="home.php"><i class="glyphicon glyphicon-home"></i> <span>Beranda</span></a></li>
      </li>
      
      <!-- Treeview -->
      


      <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-briefcase"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="barang.php"><i class="glyphicon glyphicon-file"></i> <span>Stock Test</span></a></li>
            <li><a href="kategori.php"><i class="glyphicon glyphicon-file"></i> <span>Barang Baru</span></a></li>
            <li><a href="merk.php"><i class="glyphicon glyphicon-file"></i> <span>Data Merk</span></a></li>
            <li><a href="lokasi.php"><i class="glyphicon glyphicon-file"></i> <span>Data Lokasi</span></a></li>
            <!-- <li><a href="da.php"><i class="glyphicon glyphicon-file"></i> <span>Detail Peralatan</span></a></li> -->
            <!-- <li><a href="merk.php"><i class="glyphicon glyphicon-file"></i> <span>Data Merk</span></a></li>
            <li><a href="divisi.php"><i class="glyphicon glyphicon-file"></i> <span>Data Divisi</span></a></li>
            <li><a href="lokasi.php"><i class="glyphicon glyphicon-file"></i> <span>Data Lokasi</span></a></li>
            <li><a href="golongan.php"><i class="glyphicon glyphicon-file"></i> <span>Data Jenis</span></a></li> -->
            <li><a href="galery.php"><i class="glyphicon glyphicon-file"></i> <span>Data Galery</span></a></li>
            <!-- <li><a href="user.php"><i class="glyphicon glyphicon-file"></i> <span>Data User</span></a></li> -->
          </ul>
      </li>

      <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="keluar.php"><i class="glyphicon glyphicon-share"></i> <span>IN OUT TOOLS</span></a></li>
           <!--  <li><a href="log.php"><i class="glyphicon glyphicon-book"></i> <span>LOG TRANSAKSI</span></a></li> -->
          </ul>
      </li>

            <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cetak_barang.php"><i class="glyphicon glyphicon-print"></i> <span>Surat Jalan</span></a></li>
            <li><a href="cetak_histori.php"><i class="glyphicon glyphicon-print"></i> <span>History Surat Jalan</span></a></li>
            <li><a href="cetak_golongan.php"><i class="glyphicon glyphicon-print"></i> <span>Data Peralatan</span></a></li>
            <!-- <li><a href="cetak_barang_rusak.php"><i class="glyphicon glyphicon-print"></i> <span>Barang Rusak</span></a></li> -->
          </ul>
      </li>
      <li class="header">BARANG NON KODE</li>
      <li class="treeview">
        <li><a href="bhp.php"><i class="glyphicon glyphicon-list"></i> <span>Barang Konsumebel</span></a></li>
      </li>
            <li class="treeview">
        <li><a href="bm.php"><i class="glyphicon glyphicon-download"></i> <span>Barang Masuk</span></a></li>
      </li>
            <li class="treeview">
        <li><a href="distribusi.php"><i class="glyphicon glyphicon-upload"></i> <span>Distribusi Barang</span></a></li>
      </li>
      <li class="header">SETTING</li>
        <li class="treeview">
          <li><a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Pengaturan</span></a></li>
          <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i> <span>Logout</span></a></li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>