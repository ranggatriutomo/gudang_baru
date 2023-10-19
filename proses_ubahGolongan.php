<?php
// Load file koneksi.php
include "conn.php";

// Ambil Data yang Dikirim dari Form
$golongan_id = $_GET['golongan_id'];
$nama_gol = $_POST['nama_gol'];


  // Proses simpan ke Database
  $query = "UPDATE golongan SET nama_gol='".$nama_gol."' WHERE  golongan_id='".$golongan_id."'";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: golongan.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='user.php'>Kembali Ke Form</a>";
  }

?>