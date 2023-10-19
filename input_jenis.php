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
            <form role="form" method="post" action="pilihjenis.php" enctype="multipart/form-data">
              <div class="box-body">
                
              <div class="form-group">
                <label>Nama Barang</label>
                <select class="form-control select2" name="url" style="width: 100%;" required="required">
                    <option selected="selected" value="">--Pilih Jenis--</option>
                    <option value="bhp.php">Konsumable</option>
                    <option value="input_barang.php">Non Konsumable</option>
                    <option value="bhy.php">Hybrid</option>
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
