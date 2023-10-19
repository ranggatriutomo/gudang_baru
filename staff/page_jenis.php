<?php include_once('header.php');?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Table
        <small>Barang Baru</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="kategori.php">Table Barang Baru</a></li>
      <!--   <li class="active"></li> -->
      </ol>
    </section>  

    <section class="content">

       <div class="row">
      
       <div class="col-md-12">
          <div class="">
          </div>
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="proses.php" class="btn btn-block btn-primary btn-sm">Export Excel</a> 
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Kode Barang</th>
                  <th>Jenis</th>
                  <th>Created By</th>
                  <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include '../conn.php';
                      $kategori = mysqli_query($koneksi, "SELECT a.*, b.*, c.*, count(c.id_kategori) as jumlah
                        from tbkategori a, golongan b, tbasset c
                        where a.golongan_id = b.golongan_id and a.id_kategori = c.id_kategori group by c.id_kategori ORDER BY a.id_kategori DESC");
                        $no=1;
                        foreach ($kategori as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_kategori']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['kode']."</td>
            <td>".$row['nama_gol']."</td>
            <td>".$row['created_by']."</td>
            <td>".$row['created_at']."</td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
              <a href="javascript:window.history.go(-1);" class="btn btn-primary btn-block"><b>Back</b></a>
            </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- /.col -->
      </div>
    </section>
   
    
  </div>
  <!-- /.content-wrapper -->

<?php include_once('footer.php');?>

