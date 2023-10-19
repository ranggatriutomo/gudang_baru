<?php
// Load file koneksi.php
include "conn.php";

// Ambil Data yang Dikirim dari Form
$id_barang = $_POST['id_barang'];
$id_lokasi = $_POST['id_lokasi'];
$project = $_POST['project'];
$date_out = $_POST['date_out'];
$created_by = $_POST['created_by'];

foreach ($id_barang as $item){

   $query = "INSERT INTO trx (id_barang, id_lokasi, project, date_out, created_by) VALUES('".$item."', '".$id_lokasi."', '".$project."', '".$date_out."', '".$created_by."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: keluar.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='keluar.php'>Kembali Ke Form</a>";
  }




} 

  // Proses simpan ke Database
 

?>