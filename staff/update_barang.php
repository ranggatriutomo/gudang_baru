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
              $id_barang = $_GET['id_barang'];
              
              // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
              $query = "SELECT a.*, b.* 
                        FROM tbasset a, tbkategori b 
                        WHERE a.id_kategori=b.id_kategori and a.id_barang='".$id_barang."'";
              $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
              $row = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
            ?>
            <!-- form start -->
            <form role="form" method="post"  action="proses_ubah_barang.php?id_barang=<?php echo $id_barang; ?>" enctype="multipart/form-data">
              
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Barang</label>
                  <input type="text" name="kode_barang" class="form-control" id="exampleInputEmail1" value="<?php echo $row['kode_barang']; ?>"  readonly="readonly">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['nama_kategori']; ?>"  readonly>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Merk</label>
                  <input type="text" name="merk" class="form-control" id="exampleInputEmail1" value="<?php echo $row['id_merk']; ?>" readonly>
                </div>   
                

                
                 <div class="form-group">
                <label>Kondisi</label>

                  <br/>
                    <?php
                      if($row['kondisi'] == "baik"){
                        echo "<input type='radio' name='kondisi' value='kondisi' checked='checked'> baik <br>";
                        echo "<input type='radio' name='kondisi' value='rusak'> rusak";
                      }else{
                        echo "<input type='radio' name='kondisi' value='baik'> baik <br>";
                        echo "<input type='radio' name='kondisi' value='rusak' checked='checked'> rusak";
                      }
                      ?>

               
                </div>     

              <div class="form-group">
                  <label>Keterangan</label>
              <form>
                    <textarea id="editor1" name="keterangan" value="<?php echo $row['keterangan']; ?>" rows="10" cols="80">
                                            
                    </textarea>
              </form>
              </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                  <input type="file" name="gambar" id="exampleInputFile">
              </div> 
       
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                <a href="page_list_rusak.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
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

