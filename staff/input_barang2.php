<?php
  include_once('header.php');
  include "../conn.php";

  $kode = $_POST['kode']; 
  // untuk pengkodean
  $no = mysqli_query($koneksi, "SELECT  max(kode_barang) as kode_barang FROM tbasset WHERE kode_barang LIKE '%$kode%'");
  // untuk nama kategoti
  $nama = mysqli_query($koneksi, "SELECT  * FROM tbkategori WHERE kode LIKE '%$kode%'");

  $nm_kategori = mysqli_fetch_array($nama);
  $nm = $nm_kategori ['nama_kategori'];
  $id_kategori = $nm_kategori ['id_kategori'];

  $kd_barang = mysqli_fetch_array($no);
  $kodee = $kd_barang ['kode_barang'];

  $urut =  substr($kodee, 8,3);
  $nourut = (int) $urut;
  $nourut++;

  $format = "DABN"."-".$kode."-".sprintf("%03s", $nourut);
?>


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
        <li><a href="input_barang.php">Form Kategori</a></li>
        <li><a href="input_barang2.php">Form Barang</a></li>
      <!--   <li class="active"></li> -->
      </ol>
  </section>  

  <section class="content">
     <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="proses_simpan_barang.php" enctype="multipart/form-data">
              
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Barang</label>

                  <input type="text" name="kode_barang" class="form-control" id="exampleInputEmail1" value="<?php echo $format;?>"  readonly="readonly">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input type="text"class="form-control" id="exampleInputEmail1" value="<?php echo $nm;?>" readonly="readonly">
                  <input type="hidden" name="id_kategori" class="form-control" id="exampleInputEmail1" value="<?php echo $id_kategori;?>" readonly="readonly">
                </div>

                <div class="form-group">
                <label>Merk</label>
                <select class="form-control select2" name="id_merk" style="width: 100%;" >
                    <option selected="selected" value="">--Data Merk--</option>
                    <option value="-"> - </option>

                   <?php
                       include "../conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select * from tbmerk";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['id_merk'];?>"><?php echo $row['nama_merk'];?></option>
                      <?php 
                      }
                      ?>
                </select>
                
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Lokasi</label>
                  <input type="text"  class="form-control" id="exampleInputEmail1" value="SURABAYA" readonly="readonly">
                  <input type="hidden" name="id_lokasi" class="form-control" id="exampleInputEmail1" value="27" readonly="readonly">
                </div>

                 <div class="form-group">
                <label>Kondisi</label>

                  <br/>
                 <input type="radio" name="kondisi"
                     <?php if (isset($kondisi) && $kondisi=="baik") echo "checked";?>
                     value="baik">Baik<br>
                 <input type="radio" name="kondisi"
                     <?php if (isset($kondisi) && $kondisi=="rusak") echo "checked";?>
                        value="rusak">Rusak
                </div>     

              <div class="form-group">
                  <label>Keterangan</label>
              <form>
                    <textarea id="editor1" name="keterangan" rows="10" cols="80">
                                            
                    </textarea>
              </form>
              </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="gambar" id="exampleInputFile">
              </div> 
       
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                <a href="page_staff.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
    </div>
  <!-- /.content-wrapper -->

<?php include_once('footer.php'); ?>