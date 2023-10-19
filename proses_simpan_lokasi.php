<?php
// Load file koneksi.php
include "conn.php";

// Ambil Data yang Dikirim dari Form
$nama_lokasi = $_POST['nama_lokasi'];

  // Proses simpan ke Database
  $query = "INSERT INTO tblokasi VALUES('".$id_lokasi."', '".$nama_lokasi."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: lokasi.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='lokasi.php'>Kembali Ke Form</a>";
  }

?>