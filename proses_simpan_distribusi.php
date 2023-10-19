<?php
// Load file koneksi.php
include "conn.php";

           
//proses
	// $bhp_id;
    $bhp_id = $_POST['bhp_id'];
    $tgl_distribusi = $_POST['tgl_distribusi'];
    $jumlah = $_POST['jumlah'];
    $id_lokasi = $_POST['id_lokasi'];
// Proses simpan ke Database
  $query = "INSERT INTO distribusi VALUES('".$distribusi_id."', '".$bhp_id."', '".$tgl_distribusi."', '".$jumlah."', '".$id_lokasi."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: distribusi.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='distribusi.php'>Kembali Ke Form</a>";
  }

?>