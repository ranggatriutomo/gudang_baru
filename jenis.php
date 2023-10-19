<?php include_once('conn.php');

if (isset($_POST['input'])){


	$input= $_POST['input'];

	$barang = "SELECT * 
               FROM tbkategori 
               WHERE nama_kategori LIKE '{$input}%'";

    $result = mysqli_query($koneksi,$barang);

    if(mysqli_num_rows($result)>0){ ?>

    	<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th>Nama Kategori</th>
    				<th>Kode</th>
    				<th>Kategori</th>
    			</tr>

    		</thead>
    		<tbody>
    			<?php

    				while ( $row = mysqli_fetch_assoc($result)) {
    					$nama_kategori = $row['nama_kategori'];
    					$kode = $row['kode'];
    					$golongan_id = $row['golongan_id'];
    				
    					?>

    					<tr>
    						<td><?php echo $nama_kategori; ?></td>
    						<td><?php echo $kode; ?></td>
    						<td><?php echo $golongan_id; ?></td>
    					</tr>



    					<?php

    				}

    			?>
    		</tbody>


    	</table>

    	<?php
    }else{
    	echo "<h6 class='text-danger text-center'>No data Found current(array)</h6>";
    }
}
?>

