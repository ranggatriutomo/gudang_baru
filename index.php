<?php include_once('header1.php');

   include "conn.php";
  // $sql = mysqli_query($koneksi, "SELECT a.* , b.*, c.*, count(a.id_barang) as jumlah FROM tbasset a, tblokasi b, tbkategori c WHERE a.id_kategori=c.id_kategori and a.id_lokasi=b.id_lokasi");

  $sql = mysqli_query($koneksi, "SELECT count(id_kategori) as jumlah FROM tbasset");

  $result = mysqli_fetch_array($sql);
  $item = $result ['jumlah'];

  $sql = mysqli_query($koneksi, "SELECT count(id_kategori) as jumlah FROM tbkategori");

  $result = mysqli_fetch_array($sql);
  $type_item = $result ['jumlah'];

  $sql = mysqli_query($koneksi, "SELECT count(galery_id) as jumlah FROM galery");

  $result = mysqli_fetch_array($sql);
  $galery = $result ['jumlah'];

?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $item;?></h3>
                  <p>All Item</p>
                </div>
                <div class="icon">
                  <i class="fa fa-wrench"></i>
                </div>
                <a href="staff/page_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $type_item;?></h3>
                  <p>Type Item</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cogs"></i>
                </div>
                <a href="staff/page_jenis.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>Data Location</p>
                </div>
                <div class="icon">
                  <i class="fa fa-map-signs"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $galery;?></h3>
                  <p>Data Galery</p>
                </div>
                <div class="icon">
                  <i class="fa fa-picture-o"></i>
                </div>
                <a href="staff/page_galery.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include_once('footer1.php');?>

