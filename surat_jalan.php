<?php
    include 'conn.php';
    $project = $_GET['project'];
     $barang = mysqli_query($koneksi, "select a.nama_barang, b.jumlah, a.satuan, a.berat * b.jumlah as berat, b.keterangan,
     b.project, c.nama_lokasi
     from mbarang a left join trxout b on a.kode_barang = b.kode_barang
     left join tblokasi c on b.id_lokasi = c.id_lokasi
     left join tbkategori d on a.id_kategori = d.id_kategori
     where b.project = '$project'");
     $row=mysqli_fetch_array($barang);

     $hproject=$row ['project'];
     $hlokasi=$row ['nama_lokasi'];

    
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Surat Jalan <?=$a?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
body {
      background-color: white;
    }

    body,
    div,
    table,
    tdead,
    tbody,
    tfoot,
    tr,
    td,
    td,
    p {
      font-family: "Calibri";
      font-size: 11px;
    }

    .table-bordered td {
      text-align: left;
      align: right;
    }

    td {
      text-align: left;
      font-size: 12px;
    }
  </style>


</head>

  <body  class="A4-landscape">
  <div class="container-header">
    <div class="container-logo">
      <img src="kop-dabn.jpeg">
    </div>
  </div>

  <table style="text-align : left; width : 100%">
    <tr>
      <td >Tanggal : <?= date('d F Y', strtotime(date('d-m-Y'))); ?> </td> 
      <td></td> 
      <td>No.Surat Jalan : </td>
    </tr>
    <tr> 
      <td>Project : <?= $hproject;?></td> 
      <td></td> 
      <td>No.Pol : </td>
    </tr>
    <tr> 
      <td>Kepada :</td> 
      <td></td> 
      <td>Kendaraan : Truck</td>
    </tr>
    <tr>
      <td>Tujuan : <?= $hlokasi;?></td> 
      <td></td> 
      <td>Pengiriman Via : </td> 
    </tr>
  </table>



    <table class="table1" style="text-align : left; width : 100%">
      <thead>
        <tr>
          <th width="10">No.</th>
          <th>Nama Alat</th>
          <th width="12">Jumlah</th>
          <th>Satuan</th>
          <th>Berat</th>
          <th>Keterangan</th>
          <th width="10">Cheklist</th>
        </tr>
      </thead>
      <tbody>
    <?php
      include 'conn.php';
      $project = $_GET['project'];

      $barang = mysqli_query($koneksi, "select a.nama_barang, b.jumlah, a.satuan, a.berat * b.jumlah as berat, b.keterangan
        from mbarang a left join trxout b on a.kode_barang = b.kode_barang
        left join tblokasi c on b.id_lokasi = c.id_lokasi
        left join tbkategori d on a.id_kategori = d.id_kategori
        where b.project = '$project'");
        $no=1;
        foreach ($barang as $row){
                        
                      
          echo "<tr>
          <td>$no</td>
          <td>".strtolower($row['nama_barang'])."</td>
          <td>".strtolower($row['jumlah'])."</td>
          <td style='text-align: center;'>".strtolower($row['satuan'])."</td>
          <td style='text-align: center;'>".strtolower($row['berat'])."</td>
          <td style='text-align: center;'>".strtolower($row['keterangan'])."</td>
          <td></td>
          </tr>";

          $no++;
                  }
              ?>
      </tbody>
    </table>
      
    
  </body>

  <footer>
    
  </footer>
</html>
 
<script type="text/javascript">
  window.print();
</script>