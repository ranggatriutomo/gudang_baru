<?php include_once('header.php')?>
<!--  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

  <section class="content-header">
      <h1>
        Form
        <small>Alat keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="keluar.php">Form Alat Keluar</a></li>
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
            
              <div class="box-body">
                
              <form role="form" method="post"  action="proses_keluar.php" enctype="multipart/form-data">
              
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="1">No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Lokasi</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Berat</th>
                  <th>Keterangan</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                    
                      $sql = mysqli_query($koneksi, "select kode_barang, id_barang, nama_barang, id_lokasi, nama_lokasi, satuan,berat, sum(total) as totalall from 
                      ( SELECT d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi,a.berat, sum(d.jumlah) as total, a.satuan
                      FROM mbarang a left join trxin d on a.kode_barang = d.kode_barang
                      left join tblokasi b on d.id_lokasi = b.id_lokasi
                      left join tbkategori c on a.id_kategori = c.id_kategori
                      group by d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi, a.satuan, a.berat
                      UNION ALL
                      SELECT d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi,a.berat, sum(d.jumlah)*-1 as total, a.satuan
                      FROM mbarang a left join trxout d on a.kode_barang = d.kode_barang
                      left join tblokasi b on d.id_lokasi = b.id_lokasi
                      left join tbkategori c on a.id_kategori = c.id_kategori
                      group by d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi, a.satuan) x
                      where kode_barang like 'K%' OR kode_barang like 'H%'
                      GROUP BY kode_barang, id_barang, nama_barang, id_lokasi, nama_lokasi, satuan, berat
                      UNION 
                      select mbarang.kode_barang, mbarang.id_barang, mbarang.nama_barang, trxin.id_lokasi, tblokasi.nama_lokasi, mbarang.satuan, mbarang.berat, sum(total) as totalall from 
                      ( SELECT d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi,sum(d.jumlah) as total, a.satuan, a.berat
                      FROM mbarang a left join trxin d on a.kode_barang = d.kode_barang
                      left join tblokasi b on d.id_lokasi = b.id_lokasi
                      left join tbkategori c on a.id_kategori = c.id_kategori
                      group by d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi, a.satuan,a.berat
                      UNION ALL
                      SELECT d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi,sum(d.jumlah)*-1 as total, a.satuan,a.berat
                      FROM mbarang a left join trxout d on a.kode_barang = d.kode_barang
                      left join tblokasi b on d.id_lokasi = b.id_lokasi
                      left join tbkategori c on a.id_kategori = c.id_kategori
                      group by d.kode_barang,a.id_barang,a.nama_barang,b.id_lokasi, b.nama_lokasi, a.satuan, a.berat) x
                      left join mbarang on mbarang.kode_barang = x.kode_barang
                      left join trxin on trxin.kode_barang = mbarang.kode_barang
                      left join tblokasi on tblokasi.id_lokasi = trxin.id_lokasi
                      WHERE x.kode_barang not like 'K%'
                      GROUP BY mbarang.kode_barang, mbarang.id_barang, mbarang.nama_barang, trxin.id_lokasi, tblokasi.nama_lokasi, mbarang.satuan, mbarang.berat");
                        $no=1;
                        foreach ($sql as $row){
                        echo "<tr>
                        <td>$no</td>";
                        if($row['totalall']>0){
                        echo "<td><input type='checkbox' class='check-item' name='kode_barang[]' value='".$row['kode_barang']."'>&nbsp; &nbsp;".$row['kode_barang']."</td>";
                        }else{
                          echo "<td><input type='checkbox' class='check-item' name='kode_barang[]' value='".$row['kode_barang']."' readonly='readonly'>&nbsp; &nbsp;".$row['kode_barang']."</td>";
                        } 
                        echo "<td>".$row['nama_barang']."</td>
                        <td><input type='hidden' name='id_lokasi[]' value='".$row['id_lokasi']."'> ".$row['nama_lokasi']."</td>
                        ";
                        if($row['totalall']>1){
                          echo "<td><input type='text' name='totalall[]' value='".$row['totalall']."'> </td>";
                          }else{
                            echo "<td><input type='text' value='".$row['totalall']."' readonly='readonly'> 
                            <input type='hidden' name='totalall[]' value='".$row['totalall']."' ></td>";
                          }
                        echo "
                        <td>".$row['satuan']." </td>
                        <td>".$row['berat']." </td>
                        <td><input type='text' name='keterangan[]'></td>
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
             <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control select2" name="id_lokasi" style="width: 100%;" id="form_prov" required="required">
                    <option selected="selected" value="">--Pilih Gudang--</option>

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                       //Perintah sql untuk menampilkan semua data pada tabel jurusan
                        $sql="SELECT * FROM tblokasi";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['id_lokasi'];?>"><?php echo $row['nama_lokasi'] ;?></option>
                      <?php 
                      }
                      ?>
                </select>    
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Project</label>
                   <input type="text" name="project" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" id="exampleInputEmail1" placeholder="Nama Project" required="required">
                   <input type="hidden" name="created_by" value="<?php echo $_SESSION['username']; ?>" class="form-control"> 
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Keluar</label>
                 <input type="date" name="tgl_trxout" class="form-control" autocomplete="off" required >
                </div>

            <!-- /.box-body -->
          
          <!-- /.box -->
        </div>
         
        <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
        </div>

        </form>
        </div>
        


      </section>

   
  </div>
  <!-- /.content-wrapper -->
   

 <?php include_once('footer.php')?>