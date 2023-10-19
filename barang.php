<?php include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

  <section class="content-header">
      <h1>
        Table
        <small>Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="barang.php">Table Barang</a></li>
      <!--   <li class="active"></li> -->
      </ol>
  </section>  

  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="">
            
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                 <a href="input_jenis.php" class="btn btn-block btn-primary btn-sm">Tambah Stock</a> 
              </h3>
               <h3 class="box-title">
                 <a href="proses.php" class="btn btn-block btn-primary btn-sm">Export Excel</a> 
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                 <!--  <th>Kode Barang</th> -->
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                 <!--  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                  <th>Gambar</th> -->
                  <!-- <th>Gambar</th> -->
                <!--   <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $barang = mysqli_query($koneksi, "select *, count(mbarang.id_kategori) as jumlah 
                      from mbarang 
                      left join tbkategori on mbarang.id_kategori = tbkategori.id_kategori 
                      left join trxin on trxin.kode_barang = mbarang.kode_barang
                      where trxin.id_lokasi   = 27 and tbkategori.nama_kategori is not null
                      GROUP BY mbarang.id_kategori");
                        $no=1;
                        foreach ($barang as $row){
                          
                        //   SELECT a.*, b.*, COUNT(a.id_kategori)as jumlah 
                        // FROM tbasset a, tbkategori b
                        // WHERE a.id_kategori=b.id_kategori
                        // GROUP BY a.id_kategori

            echo "<tr>
            <td>$no</td>
            <td><a href='detail.php?id_kategori=".$row['id_kategori']."'><span class='glyphicon glyphicon-file'></span> ".$row['nama_kategori']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['satuan']."</td>

             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


      <!-- BARANG KONSUMABLE -->

      <div class="row">
        <div class="col-xs-12">
          <div class="">
            
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                 <!--  <th>Kode Barang</th> -->
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Lokasi</th>
                 <!--  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                  <th>Gambar</th> -->
                  <!-- <th>Gambar</th> -->
                <!--   <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $barang = mysqli_query($koneksi, "select a.*, sum(b.jumlah) as total, b.id_lokasi, c.nama_lokasi 
                      from mbarang a left join trxin b on a.kode_barang = b.kode_barang
                      left join tblokasi c on b.id_lokasi = c.id_lokasi
                      where a.kode_barang like 'K%' or a.kode_barang like 'H%'
                      group by b.id_lokasi");
                        $no=1;
                        foreach ($barang as $row){
                          
                        //   SELECT a.*, b.*, COUNT(a.id_kategori)as jumlah 
                        // FROM tbasset a, tbkategori b
                        // WHERE a.id_kategori=b.id_kategori
                        // GROUP BY a.id_kategori

                      echo "<tr>
                      <td>$no</td>
                      <td>".$row['nama_barang']."</td>
                      <td>".$row['total']."</td>
                      <td>".$row['satuan']."</td>
                      <td>".$row['nama_lokasi']."</td>

                       </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
            <a href="#top">Ke Atas!<a>

      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('footer.php');?>
