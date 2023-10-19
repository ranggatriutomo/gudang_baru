<?php include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Form
        <small>Update Jenis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="barang.php">Table Jenis</a></li>
        <li><a href="input_barang2.php">Form Update Jenis</a></li>
      <!--   <li class="active"></li> -->
      </ol>
  </section>  

  <section class="content">
     <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
              <?php
              // Load file koneksi.php
              include "conn.php";
              
              // Ambil data NIS yang dikirim oleh index.php melalui URL
              $golongan_id = $_GET['golongan_id'];
              
              // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
              $query = "SELECT * FROM golongan WHERE golongan_id='".$golongan_id."'";
              $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
              $row = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
            ?>
            <!-- form start -->
            <form role="form" method="post"  action="proses_ubahGolongan.php?golongan_id=<?php echo $golongan_id; ?>" enctype="multipart/form-data">
              
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Klasifikasi</label>
                  <input type="text" name="nama_gol" required="required" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="exampleInputEmail1" value="<?php echo $row['nama_gol']; ?>">
                </div>
     
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                <a href="golongan.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
    </div>
  <!-- /.content-wrapper -->

<?php include_once('footer.php');?>

