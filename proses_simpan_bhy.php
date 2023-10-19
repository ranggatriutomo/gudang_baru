<?php
// Load file koneksi.php
include "conn.php";

           
//proses
	// $bhp_id;
    $kode_barang = $_POST['kode_barang'];
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $stok = $_POST[0];
    $golongan_id = $_POST['golongan_id'];
    $id_merk = $_POST['id_merk'];
    $spek = $_POST['spek'];
    $berat = $_POST['berat'];


$cekdulu= "SELECT * FROM mbarang WHERE nama_barang='$nama_barang'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysqli_query($koneksi, $cekdulu); 

if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    echo "<script>alert('Nama Barang atau Kode Sudah Digunakan');history.go(-1) </script>";
} 
  else { 
          $query = "INSERT INTO mbarang (id_barang, kode_barang, nama_barang, stok, satuan, berat, golongan_id, id_merk, spek) VALUES('".$id_barang."', '".$kode_barang."', '".$nama_barang."', '".$stok."', '".$satuan."', '".$berat."','".$golongan_id."' , '".$id_merk."', '".$spek."')";
            $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

          if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
                     // header("location: kategori.php"); // Redirect ke halaman index.php
             echo "<script> 
             window.location='bhy.php'</script>";
          }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='kategori.php'>Kembali Ke Form</a>";
          }
 
} 

?>