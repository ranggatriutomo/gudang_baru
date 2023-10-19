<?php
// Load file koneksi.php
include "conn.php";
// Ambil data NIS yang dikirim oleh index.php melalui URL
$id_trx = $_POST['id_trx'];

if ($id_trx == "") { //proses mengingatkan data sudah ada
    echo "<script>alert('Data Kosong');history.go(-1) </script>";

   }else { 

foreach ($id_trx as $item){

$query2 = "UPDATE trx SET date_in = curdate() WHERE id_trx='".$item."'";
$sql2 = mysqli_query($koneksi, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: keluar.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
}
}
?>