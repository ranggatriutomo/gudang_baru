<!DOCTYPE html>
<html>
<head>
    <title>Data Peralatan</title>
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
  <p align="center"  font-family: sans-serif><u><font size = "5">List Stock Peralatan Warehouse No.100</font></u></p>
  <table class="table1" align="center" style="width:600px">
    <thead>
      <tr>
        <th width="10">No.</th>
        <th>Jenis</th>
        <th width="300">Nama Alat</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
   <?php
    include 'conn.php';
    // $id_lokasi = $_GET['id_lokasi'];

    $barang = mysqli_query($koneksi, "SELECT b.nama_kategori as nama_peralatan, COUNT(a.id_kategori) as stok, c.nama_gol, a.satuan
                                                        FROM tbasset a, tbkategori b, golongan c 
                                                        WHERE a.id_kategori=b.id_kategori and b.golongan_id=c.golongan_id 
                                                        GROUP BY a.id_kategori
                                                        UNION ALL
                                                        SELECT b.nama_barang as nama_peralatan, b.stok, c.nama_gol, b.satuan
                                                        FROM bhp b, golongan c
                                                        WHERE b.golongan_id=c.golongan_id 
                                                        ORDER BY nama_gol, nama_peralatan ASC");
      $no=1;
      foreach ($barang as $row){
                      
                    
        echo "<tr>
        <td>$no</td>
        <td>".strtolower($row['nama_gol'])."</td>
        <td>".strtolower($row['nama_peralatan'])."</td>
        <td class='right'>".strtolower($row['stok'])."</td>
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