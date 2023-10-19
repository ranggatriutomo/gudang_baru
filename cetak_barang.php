<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Data
        <small>Surat Jalan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="cetak_barang.php">Surat Jalan</a></li>
        
      <!--   <li class="active"></li> -->
      </ol>
  </section>  

    <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="#" enctype="multipart/form-data">
              <div class="box-body">
                   
                <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control select2" name="id_lokasi" style="width: 100%;" required="required">
                    <option selected="selected" value="">--Data Lokasi--</option>

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="SELECT DISTINCT a.id_lokasi, b.nama_lokasi 
                              from tbasset a, tblokasi b
                              where a.id_lokasi=b.id_lokasi and a.id_lokasi != 27";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['id_lokasi'];?>"><?php echo $row['nama_lokasi'];?></option>
                      <?php 
                      }
                      ?>
                </select>
                
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
              </div>
            </form>
          </div>
          </div>
        </div>


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
                  <th>Jenis</th>
                  <th>Nama Alat</th>
                  <th width="14">Jumlah</th>
                  <th>Satuan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $id_lokasi = isset($_POST['id_lokasi']) ? $_POST['id_lokasi'] : '';

                      $barang = mysqli_query($koneksi, "SELECT b.nama_kategori as nama_peralatan, COUNT(a.id_kategori) as jumlah, c.nama_gol, a.satuan
                                                        FROM tbasset a, tbkategori b, golongan c 
                                                        WHERE a.id_kategori=b.id_kategori and b.golongan_id=c.golongan_id and a.id_lokasi = '$id_lokasi' 
                                                        GROUP BY a.id_kategori
                                                        UNION ALL
                                                        SELECT b.nama_barang as nama_peralatan, sum(a.jumlah) as jumlah, c.nama_gol, b.satuan
                                                        FROM bhp b, distribusi a, golongan c
                                                        WHERE a.bhp_id=b.bhp_id and b.golongan_id=c.golongan_id and a.id_lokasi = '$id_lokasi'
                                                        GROUP BY b.nama_barang
                                                        ORDER BY nama_gol, nama_peralatan ASC");
                        $no=1;
                        foreach ($barang as $row){
                          
                        
            echo "<tr>
            
            <td>".$row['nama_gol']."</td>
            <td>".$row['nama_peralatan']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['satuan']."</td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
              <a href="javascript:void(0);"
              onclick="window.open('surat_jalan.php?id_lokasi=<?php echo $id_lokasi;?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no' )", class="btn btn-primary "><i class='fa fa-print'> CETAK</i></a> 
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

