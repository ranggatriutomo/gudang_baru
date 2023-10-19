<?php include_once('header.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        Data
        <small>Galery</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="galery.php">Data Galery</a></li>
      <!--   <li class="active"></li> -->
      </ol>
  </section>  

  <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">
        
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <table id="example2" class="table table-bordered table-striped"> -->
                <tbody>
                <?php
                      include '../conn.php';
                      $batas = 10;
                      $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                      $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                      $previous = $halaman - 1;
                      $next = $halaman + 1;

                      $kategori = mysqli_query($koneksi, "SELECT a.*, c.* 
                      from tbasset a, galery c
                      where  a.id_barang = c.id_barang
                      limit $halaman_awal,$batas");
                      // limit $halaman_awal, $batas");

                      $kategori2 = mysqli_query($koneksi, "SELECT a.*, c.* 
                      from tbasset a, galery c
                      where  a.id_barang = c.id_barang");

                      $jumlah_data = mysqli_num_rows($kategori2);
                      // print_r($jumlah_data);
                      $total_halaman = ceil($jumlah_data / $batas);
                      $nomor = $halaman_awal + 1;

                        $no=1;
                        foreach ($kategori as $row){  
                              echo "
                                    <div class='col-md-3'>
                                      <center>
                                        <img src='../images/".$row['image']."' width='150' height='150'><br><br>
                                        <div class='btn-group'>
                                          <button type='button' class='btn btn-info'>".$row['kode_barang']."</button>
                                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                                            <span class='caret'></span>
                                            <span class='sr-only'>Toggle Dropdown</span>
                                          </button>
                                          <ul class='dropdown-menu' role='menu'>
                                            <li><a href='hapusGalery.php?galery_id=".$row['galery_id']."' style='visibility: hidden'>Delete</a></li>
                                          </ul>
                                        </div>
                                        <br><br>
                                        
                                      </center>
                                    </div>
                                    ";

                                    $no++;
                            }
                  ?>                  
                  
                </tbody>
         <div>
             <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                	// print_r($total_halaman);
                  ?> 
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                  <?php
                }
                ?>        
                <li class="page-item">
                  <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
              </ul>
            </nav>
            <a href="../index.php" class="btn btn-primary btn-block"><b>Back</b></a>
          </div>

              <!-- </table> -->

            </div>
            </div>

  </section>
  </div>
    

      
  
  <!-- /.content-wrapper -->

  <?php include_once('footer.php')?>
