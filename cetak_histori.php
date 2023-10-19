<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

  <section class="content-header">
      <h1>
        Data
        <small>Histori Surat Jalan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="cetak_barang.php">Surat Jalan</a></li>
        
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
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <!--  <th>#</th> -->
                  <th>ID</th>
                  <th>Kode Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal Keluar</th>
                  <th>Lokasi</th>
                  <th>Projek</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $id_lokasi = isset($_POST['id_lokasi']) ? $_POST['id_lokasi'] : '';

                      $barang = mysqli_query($koneksi, "select * from trxout");
                        $no=1;
                        foreach ($barang as $row){
                          
                        
            echo "<tr>
            
            <td>".$row['id_trx']."</td>
            <td>".$row['kode_barang']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['tgl_trxout']."</td>
            <td>".$row['id_lokasi']."</td>
            <td>".$row['project']."</td>
            <td>".$row['keterangan']."</td>
            <td><a href='surat_jalan.php?project=".$row['project']."' target='_newtab'>
            <i class='fa fa-print'></i></a></td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
      <!-- /.row -->
    </section>

    </div>
  <!-- /.content-wrapper -->
<?php include_once('footer.php');?>

