<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI,PHP_URL_PATH);
$components = explode('/', $path);
$page = $components [2];

// var_dump($pages);
?>
    
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


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
        <li <?= $page == 'home.php' || $page == '' ? 'class ="active"' : '' ?>><a href="home.php">
          <i class="glyphicon glyphicon-home"></i> <span>Beranda</span></a></li>
      </li>
      <?php
              include 'conn.php';
              $barang = mysqli_query($koneksi, "select tbkategori.id_kategori,tbkategori.nama_kategori, GROUP_CONCAT(mbarang.id_barang) as tags 
              from tbkategori left join mbarang on mbarang.id_kategori = tbkategori.id_kategori 
              left join trxin on trxin.kode_barang = mbarang.kode_barang
              where trxin.id_lokasi   = 27 
              group by tbkategori.id_kategori, tbkategori.nama_kategori");
                foreach ($barang as $row){
                  echo "<li class='treeview ";
                    // print_r(in_array($_GET['id_barang'],explode(",",$row['tags'])));
                    if(($page == 'da.php' &&  in_array($_GET['id_barang'],explode(",",$row['tags'])) ) || $page == '' ){
                      echo "active";
                    }
                  
                    echo "'><a href='#'>
                      <i class='glyphicon glyphicon-briefcase'></i> <span>".$row['nama_kategori']."</span>
                    </a>";
                  
                  $items = mysqli_query($koneksi, "select mbarang.id_barang,mbarang.kode_barang 
                  from mbarang left join tbkategori on mbarang.id_kategori = tbkategori.id_kategori
                  left join trxin on trxin.kode_barang = mbarang.kode_barang
                  where trxin.id_lokasi = 27 and tbkategori.id_kategori = ".$row['id_kategori']."
                ");
                // echo $items;
                  if( count(array($items)) > 0){
                    // echo "aaaa";
                    echo '<ul class="treeview-menu">';
                    foreach ($items as $item){
                      echo 
                      "<li ";
                      if (($page == 'da.php'&&$_GET['id_barang']==$item['id_barang']) || $page == '' ){
                        echo 'class ="active" ';
                      }
                      
                      echo "><a href='da.php?id_barang=".$item['id_barang']."'>
                      <span class='glyphicon glyphicon-file'></span> ".$item['kode_barang']."</a></li>";
                    }
                    echo '</ul></li>';
                  }
                    
                }
      ?>
      <li class="treeview <?= $page == 'barang.php' || $page == 'kategori.php' || $page == 'merk.php' || $page == 'lokasi.php' || $page == 'galery.php' ? 'active' : ''  ?>">
          <a href="#">
            <i class="glyphicon glyphicon-briefcase"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $page == 'barang.php' || $page == '' ? 'class ="active"' : '' ?>><a href="barang.php"><a href="barang.php"><i class="glyphicon glyphicon-file"></i> <span>Stock</span></a></li>
            <li <?= $page == 'kategori.php' || $page == '' ? 'class ="active"' : '' ?>><a href="kategori.php"><a href="kategori.php"><i class="glyphicon glyphicon-file"></i> <span>Barang Baru</span></a></li>
            <li <?= $page == 'merk.php' || $page == '' ? 'class ="active"' : '' ?>><a href="merk.php"><a href="merk.php"><i class="glyphicon glyphicon-file"></i> <span>Data Merk</span></a></li>
            <li <?= $page == 'lokasi.php' || $page == '' ? 'class ="active"' : '' ?>><a href="lokasi.php"><a href="lokasi.php"><i class="glyphicon glyphicon-file"></i> <span>Data Lokasi</span></a></li>
            <!-- <li><a href="da.php"><i class="glyphicon glyphicon-file"></i> <span>Detail Peralatan</span></a></li> -->
            <!-- <li><a href="merk.php"><i class="glyphicon glyphicon-file"></i> <span>Data Merk</span></a></li>
            <li><a href="divisi.php"><i class="glyphicon glyphicon-file"></i> <span>Data Divisi</span></a></li>
            <li><a href="lokasi.php"><i class="glyphicon glyphicon-file"></i> <span>Data Lokasi</span></a></li>
            <li><a href="golongan.php"><i class="glyphicon glyphicon-file"></i> <span>Data Jenis</span></a></li> -->
            <li <?= $page == 'galery.php' || $page == '' ? 'class ="active"' : '' ?>><a href="galery.php"><a href="galery.php"><i class="glyphicon glyphicon-file"></i> <span>Data Galery</span></a></li>
            <!-- <li><a href="user.php"><i class="glyphicon glyphicon-file"></i> <span>Data User</span></a></li> -->
          </ul>
      </li>

      <li class="treeview <?= $page == 'keluar2.php' ? 'active' : ''  ?>">
          <a href="#">
            <i class="glyphicon glyphicon-list"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?= $page == 'keluar2.php' || $page == '' ? 'class ="active"' : '' ?>><a href="keluar2.php"><i class="glyphicon glyphicon-share"></i> <span>IN OUT TOOLS</span></a></li>
           <!--  <li><a href="log.php"><i class="glyphicon glyphicon-book"></i> <span>LOG TRANSAKSI</span></a></li> -->
          </ul>
      </li>

            <li class="treeview <?= $page == 'cetak_histori.php' || $page == 'cetak_golongan.php' ? 'active' : ''  ?>">
          <a href="#">
            <i class="glyphicon glyphicon-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <!--  <li><a href="cetak_barang.php"><i class="glyphicon glyphicon-print"></i> <span>Surat Jalan</span></a></li> -->
            <li <?= $page == 'cetak_histori.php' || $page == '' ? 'class ="active"' : '' ?>><a href="cetak_histori.php"><i class="glyphicon glyphicon-print"></i> <span>History Surat Jalan</span></a></li>
             <li <?= $page == 'cetak_golongan.php' || $page == '' ? 'class ="active"' : '' ?>><a href="cetak_golongan.php"><i class="glyphicon glyphicon-print"></i> <span>Data Peralatan</span></a></li>
            <!-- <li><a href="cetak_barang_rusak.php"><i class="glyphicon glyphicon-print"></i> <span>Barang Rusak</span></a></li> -->
          </ul>
      </li>
      <li class="header">BARANG NON KODE</li>
      <li class="treeview">
         <li <?= $page == 'bhp.php' || $page == '' ? 'class ="active"' : '' ?>><a href="bhp.php"><i class="glyphicon glyphicon-list"></i> <span>Barang Konsumebel</span></a></li>
      </li>
            <li class="treeview">
         <li <?= $page == 'bm.php' || $page == '' ? 'class ="active"' : '' ?>><a href="bm.php"><i class="glyphicon glyphicon-download"></i> <span>Barang Masuk</span></a></li>
      </li>
            <li class="treeview">
         <li <?= $page == 'distribusi.php' || $page == '' ? 'class ="active"' : '' ?>><a href="distribusi.php"><i class="glyphicon glyphicon-upload"></i> <span>Distribusi Barang</span></a></li>
      </li>
      <li class="header">BARANG HYBRID</li>
      <li class="treeview">
         <li <?= $page == 'bhy.php' || $page == '' ? 'class ="active"' : '' ?>><a href="bhy.php"><i class="glyphicon glyphicon-list"></i> <span>Barang Hybrid</span></a></li>
      </li>
            <li class="treeview">
         <li <?= $page == 'by.php' || $page == '' ? 'class ="active"' : '' ?>><a href="by.php"><i class="glyphicon glyphicon-download"></i> <span>Barang Hybrid Masuk</span></a></li>
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