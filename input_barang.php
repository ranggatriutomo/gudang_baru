<?php include_once('header.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Form
        <small>Input Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="barang.php">Table Barang</a></li>
        <li><a href="input_barang.php">Form Barang</a></li>
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
            <form role="form" method="post" action="input_barang2.php" enctype="multipart/form-data">
              <div class="box-body">
                
              <div class="form-group">
                <label>Nama Barang</label>
                <select class="form-control select2" name="kode" style="width: 100%;" required="required">
                    <option selected="selected" value="">--Data Barang--</option>
                    
                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select * from tbkategori";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['id_kategori'];?>"><?php echo $row['nama_kategori'];?></option>
                      <?php 
                      }
                      ?>
                </select>
                
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">NEXT</button>
              </div>
            </form>
          </div>
          </div>
        </div>
      </section>
    </div>
  <!-- /.content-wrapper -->

  <?php include_once('footer.php')?>
