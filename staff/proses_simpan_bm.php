<?php
// Load file koneksi.php
include "../conn.php";

           
//proses
	// $bhp_id;
    $bhp_id = $_POST['bhp_id'];
    $jumlah = $_POST['jumlah'];
    $tgl_bm = $_POST['tgl_bm'];
// Proses simpan ke Database
  $query = "INSERT INTO bm VALUES('".$bm_id."', '".$bhp_id."', '".$jumlah."', '".$tgl_bm."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: bm.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='distribusi.php'>Kembali Ke Form</a>";
  }

?>