<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

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
                <label>Nama Barang</label>
                <select class="form-control select2" name="bhp_id" style="width: 100%;" id="bhp_id"  required="required" onchange="isi_otomatis()">
                    <option selected="selected" value="">--Data Barang--</option>

                   <?php
                       include "../conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select * from bhp";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['bhp_id'];?>"<?php
                          ?>><?php echo $row['nama_barang'] ;?></option>
                      <?php 
                      }
                      ?>
                </select>
                </div>
                               

                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Masuk</label>
                 <input type="date" name="tgl_bm" class="form-control" autocomplete="off" required >
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
            <div class="table-responsive">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Tanggal Barang Masuk</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include '../conn.php';
                      $a = mysqli_query($koneksi, "SELECT a.nama_barang, b.tgl_bm, b.jumlah, a.satuan
                        from bhp a, bm b
                        where a.bhp_id=b.bhp_id
                        order by bm_id DESC");
                        $no=1;
                        foreach ($a as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_barang']."</td>
            <td>".date('d F Y', strtotime($row['tgl_bm']))."</td>
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

