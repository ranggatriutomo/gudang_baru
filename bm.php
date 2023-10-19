<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

  <section class="content-header">
      <h1>
        Form
        <small>Barang Masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="keluar.php">Form Barang Masuk</a></li>
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
 <!-- form start -->
            <form role="form" method="post"  action="proses_simpan_bm.php" enctype="multipart/form-data">
              <div class="box-body">

              <div class="form-group">
              
              
              <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select count(id_trx) + 1 as maxid
                        from trxin;";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <input type="hidden" name="id_trx" value="<?php echo $row['maxid'];?>" class="form-control"></input>
                      <?php 
                      }
                  ?>

              <div class="form-group">
                
                <label>Nama Barang</label>
                <select class="form-control select2" name="kode_barang" style="width: 100%;" id="kode_barang"  required="required" onchange="isi_otomatis()">
                    <option selected="selected" value="">--Data Barang--</option>

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select * from mbarang where kode_barang like 'K%'";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['kode_barang'];?>"<?php
                          ?>><?php echo $row['nama_barang'] ;?></option>
                      <?php 
                      }
                      ?>
                </select>
              </div>
                               

                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Masuk</label>
                 <input type="date" name="tgl_trxin" class="form-control" autocomplete="off" required >
                </div>
                <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control select2" name="id_lokasi" style="width: 100%;" id="id_lokasi"  required="required" onchange="isi_otomatis()">
                    <option selected="selected" value="">--Pilih Lokasi--</option>

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select * from tblokasi";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['id_lokasi'];?>"<?php
                          ?>><?php echo $row['nama_lokasi'] ;?></option>
                      <?php 
                      }
                      ?>
                </select>
              </div>
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Jumlah</label>
                 <input type="number" name="jumlah" class="form-control" autocomplete="off" required placeholder="Jumlah" col="3">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Sisah Stok</label>
                 <input type="number" class="form-control" autocomplete="off" id="stok" readonly="readonly">
                </div>
              </div>
              
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
          </div>

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
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Tanggal Barang Masuk</th>
                  <th>Lokasi</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $a = mysqli_query($koneksi, "SELECT a.nama_barang, b.tgl_trxin, b.jumlah, a.satuan, c.nama_lokasi
                        from mbarang a, trxin b, tblokasi c
                        where a.kode_barang=b.kode_barang and b.id_lokasi = c.id_lokasi and a.kode_barang like 'K%'
                        order by id_trx DESC");
                        $no=1;
                        foreach ($a as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_barang']."</td>
            <td>".date('d F Y', strtotime($row['tgl_trxin']))."</td>
            <td>".$row['nama_lokasi']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['satuan']."</td>
            
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

        </div>



      </section>

   
  </div>
  <!-- /.content-wrapper -->


<?php include_once('footer.php');?>

