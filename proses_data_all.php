<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");
?>

<h3>Data Alat</h3>
		
<table border="1" cellpadding="5">
	<tr>
                  <!-- <th><input type="checkbox" id="check-all" required="required"></th> -->
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama Alat</th>
                  <th>Tanggal Masuk</th>
                  <th>Lokasi</th>
                  <th>Kondisi</th>
                  <th>Created_by</th>
                  <th>Created_at</th>
                </tr>
                </thead>
                <tbody>
                <?php
                      include '../conn.php';
                     
                      $sql = mysqli_query($koneksi, "SELECT a.* , b.*, c.*, a.created_at as waktu, a.created_by as pengisi
                                                        FROM tbasset a, tblokasi b, tbkategori c
                                                        WHERE a.id_kategori=c.id_kategori and a.id_lokasi=b.id_lokasi order by a.id_barang desc");
                        $no=1;
                        foreach ($sql as $row){
                          
                        
            echo "<tr>
            
            <td>$no</td>
            <td>".$row['kode_barang']."</td>
            <td>".$row['nama_kategori']."</td>
            <td>".date('d F Y', strtotime($row['tgl_masuk']))."</td>
            <td>".$row['nama_lokasi']."</td>
            <td>".$row['kondisi']."</td>
             </tr>";

            $no++;
                    }
                ?>
</table>
