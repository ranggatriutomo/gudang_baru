<?php
// Load file koneksi.php
include "conn.php";

           
//proses
    // var_dump($_POST['tkode_barang']);
    // die();
    $tkode_barang = $_POST['tkode_barang'];
    $tjumlah = $_POST['tjumlah'];
    $tgl_trxout = $_POST['tgl_trxout'];
    $id_lokasi = $_POST['id_lokasi'];
    $project = $_POST['project'];
    $created_by = $_POST['created_by'];
    $keterangan = $_POST['tketerangan'];

    $i = 0;
    foreach ($tkode_barang as $item){

     $query = "INSERT INTO trxout (kode_barang, jumlah, tgl_trxout, id_lokasi, project, created_by, keterangan) 
     VALUES('".$tkode_barang[$i]."', '".$tjumlah[$i]."', '".$tgl_trxout."', '".$id_lokasi."', '".$project."','".$created_by."','".$keterangan[$i]."')";
     $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
   
     if($sql){ // Cek jika proses simpan ke database sukses atau tidak
       // Jika Sukses, Lakukan :
       header("location: keluar2.php"); // Redirect ke halaman index.php
     }else{
       // Jika Gagal, Lakukan :
       echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
       echo "<br><a href='keluar.php'>Kembali Ke Form</a>";
     }
   
   
   
   $i++;
   }

?>