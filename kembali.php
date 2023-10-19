<?php include_once('header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
     <?php $id_lokasi = $_GET['id_lokasi']; ?> 
      <h1>
        <small>Barang kembali</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="kembali.php">Form Barang Kembali</a></li>
      <!--   <li class="active"></li> -->
      </ol>
  </section>

    <section class="content">
          <div class="row">
        <div class="col-xs-12">
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
             <form method="post" action="proses_simpan_kembali.php" id="form-update"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="1">#</th>
                  <th>KODE</th>
                  <th>NAMA ALAT</th>
                   <th>TANGGAL KELUAR</th>
              <!--      <th>TANGGAL KEMBALI</th> -->
                  <!-- <th>KODE</th>
                  <th>NAMA ALAT</th>
                  <th>KETERANGAN</th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                      // lokasi = "SURABAYA"
                          // lokasi='".$lokasi."'
                      include 'conn.php';
                      $id_lokasi = $_GET['id_lokasi'];

                      $barang = mysqli_query($koneksi, "SELECT a.*, b.*, c.* 
                        FROM trx a, tbasset b, tbkategori c
                        WHERE b.id_kategori=c.id_kategori and a.id_barang=b.id_barang and a.date_in IS NULL and a.id_lokasi='".$id_lokasi."'");
                      $no=1;
                        foreach ($barang as $row){
                          
                        
            echo "<tr>
            <td>$no</td>
            <td><input type='checkbox' class='check-item' name='id_trx[]' value='".$row['id_trx']."'>&nbsp; &nbsp;".$row['kode_barang']."</td>
            <td>".$row['nama_kategori']."</td>
            <td>".date('d F Y', strtotime($row['date_out']))."</td>
             </tr>";

            $no++;
                    }
                ?>
                </tbody>
                <tfoot>

              </table>
               <button type="submit" class="btn btn-primary" id="btn-update"><i class='fa fa-reply'> Warehouse</i></button>
               <a href='keluar.php' class="btn btn-primary">Back</a>
               <a href="javascript:pilihsemua()" class="btn btn-success">Check All</a>
               <a href="javascript:bersihkan()" class="btn btn-warning">Uncheck All</a>
                <button type="submit" class="btn btn-primary" id="btn-update"><i class="fa fa-paper-plane-o"> &nbsp;Next Project</i></button>
            </form>          
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
            <!-- <a href="javascript:pilihsemua()">Check All</a>&nbsp;&nbsp;
            <a href="javascript:bersihkan()">Uncheck All</a> -->

      <!-- /.row -->
    </section>
  
  </div>
  <!-- /.content-wrapper -->

<?php include_once('footer.php');?>

<script>
function pilihsemua()
{
    var id_trx = document.getElementsByName("id_trx[]");
    var jml=id_trx.length;
    var b=0;
    for (b=0;b<jml;b++)
    {
        id_trx[b].checked=true;
        
    }
}

function bersihkan()
{
    var id_trx = document.getElementsByName("id_trx[]");
    var jml=id_trx.length;
    var b=0;
    for (b=0;b<jml;b++)
    {
        id_trx[b].checked=false;
        
    }
}
</script>

