<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Data
        <small>All Item</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="cetak_barang.php">Data All Item</a></li>
        
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
                <a href="proses_data_all.php" class="btn btn-block btn-primary btn-sm">Export Excel</a> 
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
            <div class="box-body">
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
                </tr>
                </thead>
                <tbody>
                <?php
                      include '../conn.php';
                     
                      $sql = mysqli_query($koneksi, "SELECT a.* , b.*, c.*, a.created_at as waktu, a.created_by as pengisi
                                                        FROM tbasset a, tblokasi b, tbkategori c
                                                        WHERE a.id_kategori=c.id_kategori and a.id_lokasi=b.id_lokasi order by a.id_barang desc");
                        $no=1;
                        foreach ($sql as $row){
                          
                        
            echo "<tr>
            
            <td>$no</td>
            <td><a href='da.php?id_barang=".$row['id_barang']."'><span class='glyphicon glyphicon-file'></span> ".$row['kode_barang']."</td>
            <td>".$row['nama_kategori']."</td>
            <td>".date('d F Y', strtotime($row['tgl_masuk']))."</td>
            <td>".$row['nama_lokasi']."</td>
            <td>".$row['kondisi']."</td>
            <td>".$row['pengisi']."</td>
            <td>".date('d F Y', strtotime($row['waktu']))."</td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
              <a href="javascript:window.history.go(-1);" class="btn btn-primary btn-block"><b>Back</b></a>
             <!--  <a href="javascript:void(0);"
              onclick="window.open('../surat_jalan.php?id_lokasi=<?php echo $id_lokasi;?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no' )", class="btn btn-primary "><i class='fa fa-print'> CETAK PDF</i></a> -->
            </div>
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

