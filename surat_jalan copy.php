<?php
    include 'conn.php';
    $id_lokasi = $_GET['id_lokasi'];
     $barang = mysqli_query($koneksi, "SELECT nama_lokasi FROM tblokasi WHERE id_lokasi= '$id_lokasi'");
     $row=mysqli_fetch_array($barang);
     $a=$row ['nama_lokasi'];

    
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Surat Jalan <?=$a?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
   <style type="text/css">

td.right {
  text-align: right;
  font-size: 12px;
}

td {
  text-align: left;
  font-size: 12px;
}
th {
  text-align: left;
}

    body {
  background: rgb(255, 255, 255); 
}
page {
  position: relative;
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;  
}


header,
footer {
  position: absolute;
  left: 0,5;
  right: 0;
  background-color: rgb(255, 255, 255);
  padding-right: 1.5cm;
  padding-left: 1.5cm;
}
header:after{
  content: "";
}
footer:after{
  content: "";
}

header {
  top: 0;
  padding-top: 5mm;
  padding-bottom: 3mm;
}
footer {
  bottom: 0;
  color: #000;
  padding-top: 3mm;
  padding-bottom: 5mm;
}

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
  header,
  footer {
    position: fixed;
    left: 0.5;
    right: 0;
    background-color: rgb(255, 255, 255);
    padding-right: 1.5cm;
    padding-left: 1.5cm;
  }
}

  </style>
</head>

<body>
  <img src="kop.jpg"><br>    
<table border="0" align="center" width="80%">
  <tr>
    <td>Tanggal : <?= date('d F Y', strtotime(date('d-m-Y'))); ?> </td> 
    <td></td> 
    <td>No.Surat Jalan : </td>
  </tr>
  <tr> 
    <td>Project : </td> 
    <td></td> 
    <td>No.Pol : </td>
  </tr>
  <tr> 
    <td>Kepada :</td> 
    <td></td> 
    <td>Kendaraan : Truck</td>
  </tr>
  <tr>
    <td>Tujuan : <?= strtolower($a);?></td> 
    <td></td> 
    <td>Pengiriman Via : </td> 
  </tr>
</table>



  <table class="table1" align="center" style="width:600px">
    <thead>
      <tr>
        <th width="10">No.</th>
        <th>Jenis</th>
        <th width="300">Nama Alat</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th width="10">Cheklist</th>
      </tr>
    </thead>
    <tbody>
   <?php
    include 'conn.php';
    $id_lokasi = $_GET['id_lokasi'];

    $barang = mysqli_query($koneksi, "SELECT b.nama_kategori as nama_peralatan, COUNT(a.id_kategori) as jumlah, c.nama_gol, a.satuan
                                      FROM tbasset a, tbkategori b, golongan c 
                                      WHERE a.id_kategori=b.id_kategori and b.golongan_id=c.golongan_id and a.id_lokasi = '$id_lokasi'
                                      GROUP BY a.id_kategori
                                      UNION ALL
                                      SELECT b.nama_barang as nama_peralatan, sum(a.jumlah) as jumlah, c.nama_gol, b.satuan
                                      FROM bhp b, distribusi a, golongan c
                                      WHERE a.bhp_id=b.bhp_id and b.golongan_id=c.golongan_id and a.id_lokasi = '$id_lokasi'
                                      GROUP BY b.nama_barang
                                      ORDER BY nama_gol, nama_peralatan ASC");
      $no=1;
      foreach ($barang as $row){
                      
                    
        echo "<tr>
        <td>$no</td>
        <td>".strtolower($row['nama_gol'])."</td>
        <td>".strtolower($row['nama_peralatan'])."</td>
        <td class='right'>".strtolower($row['jumlah'])."</td>
        <td>".strtolower($row['satuan'])."</td>
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