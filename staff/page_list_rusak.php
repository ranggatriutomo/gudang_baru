<?php include_once('header.php');?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Table
        <small>Barang Rusak</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="page_list_rusak.php">Table Barang Rusak</a></li>
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
                <!--  <a href="input_barang.php" class="btn btn-block btn-primary btn-sm">Tambah Stock</a>  -->
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Kode Barang</th>
                  <!-- <th>Jumlah</th> -->
                 <!--  <th>Merk</th> -->
                  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
<!--                   <th>Gambar</th>
                   <th>Gambar</th> --> 
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody>
                <?php
                      include '../conn.php';
                      $barang = mysqli_query($koneksi, "SELECT a.*, b.*, c.*
                                                        FROM tbasset a, tbkategori b, tblokasi c 
                                                        WHERE a.id_kategori=b.id_kategori and a.id_lokasi=c.id_lokasi and kondisi = 'rusak' GROUP BY a.id_kategori");
                        $no=1;
                        foreach ($barang as $row){
                          

            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_kategori']."</td>
            <td>".$row['kode_barang']."</td>
            <td>".$row['nama_lokasi']."</td>
            <td>".$row['kondisi']."</td>
            <td>".$row['keterangan']."</td>
            <td> 
            <a href='update_barang.php?id_barang=".$row['id_barang']." type='button' class='btn small-btn-danger'><i class='fa fa-pencil'></i></a>
            </td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
            </form>

            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
            <!-- <a href="#top">Ke Atas!<a> -->

      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include_once('footer.php');?>

