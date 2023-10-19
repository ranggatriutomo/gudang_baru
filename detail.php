<?php include_once('header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

  <section class="content-header">
    <?php $id_kategori = $_GET['id_kategori']; ?>
      <h1>
         <!-- <?php echo $id_kategori; ?> -->
        <small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="kembali.php">Form Detail Alat</a></li>
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
                      
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <form method="post" action="multiple_update.php" id="form-update"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th><input type="checkbox" id="check-all" required="required"></th> -->
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama Alat</th>
                  <th>Tanggal Masuk</th>
                  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Created_by</th>
                  <th>Created_at</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                      include 'conn.php';


                      $barang = mysqli_query($koneksi, "SELECT a.* , b.*, c.*,d.*
                                                        FROM mbarang a, tblokasi b, tbkategori c, trxin d
                                                        WHERE a.id_kategori=c.id_kategori and a.kode_barang = d.kode_barang and d.id_lokasi=b.id_lokasi and a.id_kategori='".$id_kategori."'");
                      $no=1;
                        foreach ($barang as $row){
                          // date('d-m-Y', strtotime($key->updated_at));
                        
            echo "<tr>
            <td>$no</td>
            <td><a href='da.php?id_barang=".$row['id_barang']."'><span class='glyphicon glyphicon-file'></span> ".$row['kode_barang']."</td>
            <td>".$row['nama_kategori']."</td>
            <td>".date('d F Y', strtotime($row['tgl_trxin']))."</td>
            <td>".$row['nama_lokasi']."</td>
            <td>".$row['kondisi']."</td>
            <td>".$row['created_by']."</td>
            <td>".$row['created_at']."</td>
            <td> 
            
            <a href='update_barang.php?id_barang=".$row['id_barang']." type='button' class='btn btn-block btn-warning btn-sm'>Edit</a>
            </td>
             </tr>";

            $no++;

                    }
                ?>
                </tbody>
                <tfoot>
                	<!-- hapus barang -->
                	<!-- <a href='hapusBarang.php?id_barang=".$row['id_barang']." type='button' class='btn small-btn-danger'><i class='fa fa-eraser'></i></a> -->

              </table>
               <a href='barang.php' class="btn btn-primary">Kembali</a>
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

<?php include_once('footer.php')?>


