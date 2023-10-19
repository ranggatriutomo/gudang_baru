<?php include_once('header.php');?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

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
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="proses_simpan_kategori.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                 <input type="text" name="nama_kategori" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" id="exampleInputEmail1" placeholder="Nama Barang" required="required">
                  <input type="hidden" name="created_by" value="<?php echo $_SESSION['username']; ?>" class="form-control"> 
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode</label>
                 <input type="text" name="kode" class="form-control" id="kode" onkeyup ="this.value = this.value.toUpperCase()" maxlength="5" minlength="1" autocomplete="off" required placeholder="Kode">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis</label>
                  <select class="form-control select2" name="golongan_id" style="width: 100%;" required="required">
                    <option selected="selected" value="">--Data Jenis--</option>

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select * from golongan";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['golongan_id'];?>"><?php echo $row['nama_gol'];?></option>
                      <?php 
                      }
                      ?>
                </select>
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>

       
       <div class="col-md-6">
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
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Kode Barang</th>
                  <th>Jenis</th>
                  <th>Created By</th>
                  <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $kategori = mysqli_query($koneksi, "SELECT a.*, b.* 
                        from tbkategori a, golongan b
                        where a.golongan_id = b.golongan_id ORDER BY a.id_kategori DESC");
                        $no=1;
                        foreach ($kategori as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_kategori']."</td>
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

