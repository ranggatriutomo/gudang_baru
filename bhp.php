<?php include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

    <section class="content-header">
      <h1>
        Table
        <small>Barang Habis Pakai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Table Barang Habis Pakai</a></li>
      <!--   <li class="active"></li> -->
      </ol>
    </section>  

    <section class="content">

       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action= "proses_simpan_bhp.php" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  
                  <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select max(id_barang) + 1 as totkode
                        from mbarang;";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <input type="hidden" name="id_barang" value="<?php echo $row['totkode'];?>" class="form-control" readonly="readonly"></input>
                      <?php 
                      }
                  ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Barang</label>
                  <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="select case 
                        when count(kode_barang) < 10 then CONCAT('K00',count(kode_barang)+1) 
                        when count(kode_barang) < 100 then CONCAT('K0',count(kode_barang)+1) 
                        ELSE
                        CONCAT('K',count(kode_barang)+1) 
                        end as maxkode
                        from mbarang 
                        where kode_barang like 'K%';";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <input type="text" name="kode_barang" value="<?php echo $row['maxkode'];?>" class="form-control" readonly="readonly"></input>
                      <?php 
                      }
                  ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                 <input type="text" name="nama_barang" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" id="exampleInputEmail1" placeholder="Nama Barang" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Berat (Kg) / Satuan</label>
                 <input type="text" name="berat" class="form-control" required placeholder="Berat Satuan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Satuan</label>
                 <input type="text" name="satuan" class="form-control"  onkeyup ="this.value = this.value.toUpperCase()" autocomplete="off" required placeholder="Satuan">
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
                <div class="form-group">
                  <label for="exampleInputEmail1">Merk</label>
                  <select class="form-control select2" name="id_merk" style="width: 100%;" required="required">
                    <option selected="selected" value="">--Pilih Merk--</option>

                   <?php
                       include "conn.php";
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
                  <label for="exampleInputEmail1">Spesifikasi</label>
                 <textarea name="spek" class="form-control"  onkeyup ="this.value = this.value.toUpperCase()" autocomplete="off" required placeholder="Spesifikasi"></textarea>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                <input type="button" onclick="location.href='bm.php';" class="btn btn-primary" value="Barang Masuk" />
              </div>
            </form>
          </div>
          </div>

       
       <div class="col-md-12">
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Stock</th>
                  <th>Berat Total (Kg)</th>
                  <th>Satuan</th>
                  <th>Jenis</th>
                  <th>Merk</th>
                  <th>Lokasi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $bhp = mysqli_query($koneksi, "SELECT a.*,b.*,c.*,d.*,e.*,b.berat * d.jumlah as total_berat
                      from mbarang b, golongan a, tblokasi c, trxin d, tbmerk e 
                      where a.golongan_id=b.golongan_id and d.kode_barang = b.kode_barang and d.id_lokasi = c.id_lokasi and b.id_merk = e.id_merk 
                      and b.kode_barang like 'K%'
                      order by b.kode_barang DESC;");
                        $no=1;
                        foreach ($bhp as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['kode_barang']."</td>
            <td>".$row['nama_barang']."</td>
            <td>".$row['jumlah']."</td>
            <td>".number_format($row['total_berat'],2)."</td>
            <td>".$row['satuan']."</td>
            <td>".$row['nama_gol']."</td>
            <td>".$row['nama_merk']."</td>
            <td>".$row['nama_lokasi']."</td>
            <td> 
            <a href='update_bhp.php?kode_barang=".$row['kode_barang']." type='button' class='btn small-btn-danger'><i class='fa fa-pencil'></i></a>
            <a href='hapusBhp.php?kode_barang=".$row['kode_barang']." type='button' class='btn small-btn-danger'><i class='fa fa-eraser'></i></a>
            </td>

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
         <!-- /.col -->
      </div>
    </section>
   
    
  </div>
  <!-- /.content-wrapper -->
<?php include_once('footer.php');?>

