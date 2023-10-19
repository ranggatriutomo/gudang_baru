<?php include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Form
        <small>Update Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="barang.php">Table Barang</a></li>
        <li><a href="input_barang2.php">Form Update Barang</a></li>
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
              include "../conn.php";
              
              // Ambil data NIS yang dikirim oleh index.php melalui URL
              $bhp_id = $_GET['bhp_id'];
              
              // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
              $query = "SELECT * FROM bhp WHERE bhp_id='".$bhp_id."'";
              $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
              $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
            ?>
            <!-- form start -->
            <form role="form" method="post"  action="proses_ubahBhp.php?bhp_id=<?php echo $bhp_id; ?>" enctype="multipart/form-data">
              
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input type="text" name="nama_barang" required="required" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="exampleInputEmail1" value="<?php echo $data['nama_barang']; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Satuan</label>
                  <input type="text" name="satuan" required="required" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="exampleInputEmail1" value="<?php echo $data['satuan']; ?>" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis</label>
                  <select class="form-control select2" name="golongan_id" style="width: 100%;" required="required">
                    <option selected="selected" value="">--Data Jenis--</option>

                   <?php
                       include "../conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select * from golongan";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        if ($data['golongan_id']==$row['golongan_id']) {
                               $select="selected";
                              }else{
                               $select="";
                              }
                              echo "<option value=".$row['golongan_id']." $select>".$row['nama_gol']."</option>";
                      }
                      ?>
                </select>
                </div>
     
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                <a href="bhp.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
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

