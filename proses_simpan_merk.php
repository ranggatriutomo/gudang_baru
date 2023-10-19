<?php
// Load file koneksi.php
include "conn.php";

// Ambil Data yang Dikirim dari Form
$nama_merk = $_POST['nama_merk'];

  // Proses simpan ke Database
  $query = "INSERT INTO tbmerk VALUES('".$id_merk."', '".$nama_merk."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: merk.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='merk.php'>Kembali Ke Form</a>";
  }

?>