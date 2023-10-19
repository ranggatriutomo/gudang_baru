<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

  <section class="content-header">
      <h1>
        Data
        <small>Peralatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="cetak_barang.php">Data Peralatan</a></li>
        
      <!--   <li class="active"></li> -->
      </ol>
  </section>  

    <section class="content">
     <div class="row">
       
        </div>


      <div class="row">
        <div class="col-xs-12">
          <div class="">
            
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                      
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <!--  <th>#</th> -->
                  <th>Jenis</th>
                  <th>Nama Alat</th>
                  <th width="14">Jumlah</th>
                  <th>Satuan</th>

                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $id_golongan = isset($_POST['id_golongan']) ? $_POST['id_golongan'] : '';

                      $barang = mysqli_query($koneksi, "SELECT b.nama_kategori as nama_peralatan, COUNT(a.id_kategori) as stok, c.nama_gol, a.satuan
                      FROM mbarang a, tbkategori b, golongan c 
                      WHERE a.id_kategori=b.id_kategori and b.golongan_id=c.golongan_id 
                      GROUP BY a.id_kategori
                      UNION ALL
                      SELECT b.nama_barang as nama_peralatan, b.stok, c.nama_gol, b.satuan
                      FROM mbarang b, golongan c
                      WHERE b.golongan_id=c.golongan_id 
                      ORDER BY nama_gol, nama_peralatan ASC");
                        $no=1;
                        foreach ($barang as $row){
                          
                        
            echo "<tr>
            
            <td>".$row['nama_gol']."</td>
            <td>".$row['nama_peralatan']."</td>
            <td>".$row['stok']."</td>
            <td>".$row['satuan']."</td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
              <a href="javascript:void(0);"
              onclick="window.open('data_peralatan.php?#=#','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no' )", class="btn btn-primary "><i class='fa fa-print'> CETAK</i></a>
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

