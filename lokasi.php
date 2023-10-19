<?php include_once('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

    <section class="content-header">
      <h1>
        Table
        <small>lokasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="lokasi.php">Table lokasi</a></li>
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
            <form role="form" method="post" action="proses_simpan_lokasi.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lokasi</label>
                 <input type="text" name="nama_lokasi" class="form-control" onkeyup ="this.value = this.value.toUpperCase()" autocomplete="off" id="exampleInputEmail1" placeholder="Nama Lokasi" required="required">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Lokasi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $lokasi = mysqli_query($koneksi, "SELECT * from tblokasi");
                        $no=1;
                        foreach ($lokasi as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_lokasi']."</td>
            <td> 
               <a href='hapusLokasi.php?id_lokasi=".$row['id_lokasi']." type='button' class='btn small-btn-danger'><i class='fa fa-eraser'></i></a>
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

<?php include_once('footer.php'); ?>

