<?php
// Load file koneksi.php
include "conn.php";

           
//proses

    $nama_gol = $_POST['nama_gol'];

// Proses simpan ke Database
  $query = "INSERT INTO golongan VALUES('".$distribusi_id."', '".$nama_gol."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: golongan.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='distribusi.php'>Kembali Ke Form</a>";
  }

?>