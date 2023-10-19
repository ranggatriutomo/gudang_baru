<?php
// Load file koneksi.php
include "conn.php";

           
//proses
	// $kode_barang;
    $id_trx = $_POST['id_trx'];
    $kode_barang = $_POST['kode_barang'];
    $jumlah = $_POST['jumlah'];
    $tgl_trxin = $_POST['tgl_trxin'];
    $id_lokasi = $_POST['id_lokasi'];    
// Proses simpan ke Database
  $query = "INSERT INTO trxin VALUES( ".$id_trx.", '".$kode_barang."', '".$jumlah."', '".$tgl_trxin."', '".$id_lokasi."')";
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