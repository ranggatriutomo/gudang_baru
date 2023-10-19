<?php include_once('header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 4200px; min-height: 293px;">

    <section class="content-header">
      <h1>
        Table
        <small>Merk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="merk.php">Table Merk</a></li>
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
            <form role="form" method="post" action="proses_simpan_merk.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Merk</label>
                 <input type="text" name="nama_merk" class="form-control" autocomplete="off" id="exampleInputEmail1" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nama Merk" required="required">
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
                  <th>Nama Merk</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $kategori = mysqli_query($koneksi, "SELECT * from tbmerk");
                        $no=1;
                        foreach ($kategori as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_merk']."</td>
            
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

