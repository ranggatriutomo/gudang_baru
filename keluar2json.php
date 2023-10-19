<?php 
 include 'conn.php';

 header("Content-Type: application/json");

// $barang = mysqli_query($koneksi, "SELECT a.* , b.*
// 								FROM tbasset a, tbkategori b
// 								WHERE a.id_kategori=b.id_kategori and a.id_barang='".$id_barang."'");

$kode_barang = $_GET['kode_barang'];

  

 $barang = mysqli_query($koneksi, "select  a.kode_barang, a.nama_barang, b.jumlah, a.satuan, a.berat, a.spek
                                  from mbarang a left join trxin b on a.kode_barang = b.kode_barang 
                                  where a.kode_barang='".$kode_barang."'");

  $row = mysqli_fetch_array($barang);
   
  echo json_encode($row);

?>