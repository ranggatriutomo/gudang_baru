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
   <form role="form" method="post"  action="proses_keluar2.php" enctype="multipart/form-data">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <label>Lokasi Tujuan</label>
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
                
              <div class="form-group">
                <label>Nama Alat</label>
                <select class="form-control select2" id="kode" style="width: 100%;" required="required">
    

                   <?php
                       include "conn.php";
                       if (!$koneksi){
                          die("Koneksi database gagal:".mysqli_connect_error());
                       }
                      
                        $sql="select a.* 
                        from mbarang a";

                        $hasil=mysqli_query($koneksi,$sql);
                        $no=0;
                        while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                       ?>
                        <option value="<?php echo $row['kode_barang'];?>"><?php echo $row['nama_barang'] ; str_repeat('&nbsp;', 2); echo" -- "; echo $row['kode_barang'] ; ?></option>
                      <?php 
                      }
                      ?>
                </select>
              </div>
              
              <a href="#" id="add-items" class="btn btn-info">Tambah</a>

            </div>
            
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12">
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Berat</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="items-list">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" name="submit" class="btn btn-info" value="Simpan"> </input>
         
           
          </div>
          </div>
 
          <!-- /.box -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </form>

        </div>



      </section>

   
  </div>
  <!-- /.content-wrapper -->
   
<script>
  $(document).ready(function () {
    $('#add-items').click(function(e) {
      e.preventDefault()
      $.get('keluar2json.php?kode_barang=' + $('#kode').val() , function(data) {
        console.log(data);
        var newRow = $('<tr class='+ data.kode_barang +'>');
        var cols = "";
        if ($('#items-list').find('.' + $('#kode').val()).length == 0) {

        cols += '<td>'+ data.kode_barang +'<input type="hidden" name="tkode_barang[]" value="'+ data.kode_barang +'"/></td>';
        cols += '<td>'+ data.nama_barang +'</td>';
        cols += '<td><input type="number" name="tjumlah[]" value="" required="required"/></td>';
        cols += '<td>'+ data.satuan +'</td>';
        cols += '<td>'+ data.berat +'</td>';
        cols += '<td><input type="text" name="tketerangan[]" value=""/></td>';
        cols += '<td><a href="#" class="delrow"><i class="fa fa-trash"></i></a></td>';

        newRow.append(cols);
        $("#items-list").append(newRow);
        $('#myTable').slideDown();
        
        } else {
                alert('barang tersebut sudah dimasukkan')
              }
      });
    });

    $('#myTable').on('click', '.delrow', function(e) {
        var lenRow = $('#myTable tbody tr').length;
          e.preventDefault();
          if (lenRow == 1 || lenRow <= 1) {
              $(this).parents('tr').remove();
              $('#myTable').slideUp();
              $('.btn-submit').hide();
          } else {
              $(this).parents('tr').remove();
          }
        });

      });
</script>


 <?php include_once('footer.php')?>