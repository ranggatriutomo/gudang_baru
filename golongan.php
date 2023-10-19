<?php include_once('header.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Table
        <small>Jenis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="kategori.php">Table Jenis</a></li>
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
            <form role="form" method="post" action="proses_simpan_golongan.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Klasifikasi</label>
                 <input type="text" name="nama_gol" class="form-control" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" id="exampleInputEmail1" placeholder="Jenis" required="required">
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $divisi = mysqli_query($koneksi, "SELECT * from golongan ORDER BY golongan_id DESC");
                        $no=1;
                        foreach ($divisi as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_gol']."</td>
            <td> 
            <a href='update_golongan.php?golongan_id=".$row['golongan_id']." type='button' class='btn small-btn-danger'><i class='fa fa-pencil'></i></a>
            <a href='hapusGolongan.php?golongan_id=".$row['golongan_id']." type='button' class='btn small-btn-danger'><i class='fa fa-eraser'></i></a>
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

 <?php include_once('footer.php')?>


