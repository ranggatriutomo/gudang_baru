<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Peralatan.xls");
?>

<h3>Data Peralatan</h3>
		
<table border="1" cellpadding="5">
	<tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Kode Barang</th>
                  <th>Jenis</th>
<!--                   <th>Created By</th>
                  <th>Created At</th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                      include '../conn.php';
                      $kategori = mysqli_query($koneksi, "SELECT a.*, b.*, c.*, count(c.id_kategori) as jumlah
                        from tbkategori a, golongan b, tbasset c
                        where a.golongan_id = b.golongan_id and a.id_kategori = c.id_kategori group by c.id_kategori ORDER BY a.id_kategori DESC");
                        $no=1;
                        foreach ($kategori as $row){
            echo "<tr>
            <td>$no</td>
            <td>".$row['nama_kategori']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['kode']."</td>
            <td>".$row['nama_gol']."</td>
             </tr>";

            $no++;
                    }
                ?>
</table>
