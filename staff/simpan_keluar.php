<?php
// Load file koneksi.php
include "../conn.php";
// Ambil data NIS yang dikirim oleh index.php melalui URL
$id_barang = $_POST['id_barang'];
$id_lokasi = $_POST['id_lokasi'];


// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$query2 = "UPDATE tbasset SET id_lokasi='".$id_lokasi."' WHERE id_barang='".$id_barang."'";
$sql2 = mysqli_query($koneksi, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: page_trx.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='barang.php'>Kembali</a>";
}
?>