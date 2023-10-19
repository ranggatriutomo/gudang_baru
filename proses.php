<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");
?>

<h3>Data Alat</h3>
		
<table border="1" cellpadding="5">
	 <tr>
                  <th>#</th>
                 <!--  <th>Kode Barang</th> -->
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                 <!--  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                  <th>Gambar</th> -->
                  <!-- <th>Gambar</th> -->
                <!--   <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                      include 'conn.php';
                      $barang = mysqli_query($koneksi, "select *, count(tbasset.id_kategori) as jumlah from tbasset 
left join tbkategori on tbasset.id_kategori = tbkategori.id_kategori
                        GROUP BY tbasset.id_kategori");
                        $no=1;
                        foreach ($barang as $row){
                          
                        //   SELECT a.*, b.*, COUNT(a.id_kategori)as jumlah 
                        // FROM tbasset a, tbkategori b
                        // WHERE a.id_kategori=b.id_kategori
                        // GROUP BY a.id_kategori

            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_kategori']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['satuan']."</td>

             </tr>";

            $no++;
                    }
                ?>
</table>
