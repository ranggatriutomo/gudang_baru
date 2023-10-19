<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
     <?php $id_lokasi = $_GET['id_lokasi']; ?> 
      <h1>
         <?php echo $id_lokasi; ?>
        <small>Barang kembali</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="kembali.php">Form Barang Kembali</a></li>
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
                  <th>Cheklist</th>
                  <th>#</th>
                  <th>KODE</th>
                  <th>NAMA ALAT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      // lokasi = "SURABAYA"
                          // lokasi='".$lokasi."'
                      include '../conn.php';
                      $id_lokasi = $_GET['id_lokasi'];

                      $barang = mysqli_query($koneksi, "SELECT a.*, b.* 
                        FROM tbasset a, tbkategori b 
                        WHERE a.id_kategori=b.id_kategori and id_lokasi='".$id_lokasi."'");
                      $no=1;
                        foreach ($barang as $row){
                          
                        
            echo "<tr>
            <td><input type='checkbox' class='check-item' name='id_barang[]' value='".$row['id_barang']."'></td>
            <td>$no</td>
            <td>".$row['kode_barang']."</td>
            <td>".$row['nama_kategori']."</td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
               <button type="submit" class="btn btn-primary" id="btn-update">Submit</button>
               <a href='page_trx.php' class="btn btn-primary">Kembali</a>
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

