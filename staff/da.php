<?php include_once('header.php');?>
<?php $id_barang = $_GET['id_barang'];?> 
<?php 
 include '../conn.php';

// $barang = mysqli_query($koneksi, "SELECT a.* , b.*
// 								FROM tbasset a, tbkategori b
// 								WHERE a.id_kategori=b.id_kategori and a.id_barang='".$id_barang."'");

 $barang = mysqli_query($koneksi, "SELECT a.* , b.*
								FROM tbasset a, tbkategori b
								WHERE a.id_kategori=b.id_kategori  and a.id_barang='".$id_barang."'");

  $row = mysqli_fetch_array($barang);
   
   $gmbr = $row ['image'] ;
   $nm = $row ['nama_kategori'];
   $kd = $row ['kode_barang'];
   $spec = $row ['keterangan'];

?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Alat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<!--             <li><a href="#">Examples</a></li>
            <li class="active">User profile</li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <!-- <img class="profile-user-img img-responsive img-circle" src="images/Compressor Aqualung 103.jpg" alt="User profile picture"> -->
                  <?php echo "<img class='img-responsive' src='../images/".$gmbr."' alt='Equipment picture'>";?>
                   <!-- <img class='img-responsive' src="images/Compressor Aqualung 103.jpg" alt='Photo'> -->
                  <h3 class="profile-username text-center"><?php echo $kd;?> </h3>
                  <p class="text-muted text-center"><?php echo $nm;?></p>
                  <a href="javascript:window.history.go(-1);" class="btn btn-primary btn-block"><b>Back</b></a>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Specification</a></li>
                  <li><a href="#timeline" data-toggle="tab">History Maintenance</a></li>
                  <li><a href="#settings" data-toggle="tab">Jadwal Preventive</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                    </div><!-- /.post -->
                    <?php echo $spec;?>
                    <!-- Post -->
                    <div class="post clearfix">
     
                    </div><!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="timeline">
                     <!-- Post -->
                    <div class="post">
                    </div><!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      Untuk History Maintenance
                    </div><!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                    </div><!-- /.post -->

                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                     <!-- Post -->
                    <div class="post">
                    </div><!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      Untuk Jadwal Preventive
                    </div><!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                    </div><!-- /.post -->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  <?php include_once('footer.php');?>
 <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>