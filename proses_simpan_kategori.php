<?php
// Load file koneksi.php
include "conn.php";

           
//proses

    $nama_kategori = $_POST['nama_kategori'];
    $kode = $_POST['kode'];
    $golongan_id = $_POST['golongan_id'];
    $created_by = $_POST['created_by'];


$cekdulu= "SELECT * FROM tbkategori WHERE nama_kategori='$nama_kategori' or kode='$kode'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysqli_query($koneksi, $cekdulu); 

if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    echo "<script>alert('Nama Barang atau Kode Sudah Digunakan');history.go(-1) </script>";
} 
  else { 
          $query = "INSERT INTO tbkategori(nama_kategori, kode, golongan_id, created_by) VALUES('".$nama_kategori."', '".$kode."', '".$golongan_id."', '".$created_by."')";
            $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

          if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
                     // header("location: kategori.php"); // Redirect ke halaman index.php
             echo "<script> 
             window.location='kategori.php'</script>";
          }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='kategori.php'>Kembali Ke Form</a>";
          }
 
} 

?>