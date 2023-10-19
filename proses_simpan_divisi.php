<?php
// Load file koneksi.php
include "conn.php";

           
//proses
	// $bhp_id;
    $nama_divisi = $_POST['nama_divisi'];



$cekdulu= "SELECT * FROM divisi WHERE nama_divisi='$nama_divisi'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysqli_query($koneksi, $cekdulu); 

if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    echo "<script>alert('Nama Barang atau Kode Sudah Digunakan');history.go(-1) </script>";
} 
  else { 
          $query = "INSERT INTO divisi VALUES('".$divisi_id."', '".$nama_divisi."')";
            $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

          if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
                     // header("location: kategori.php"); // Redirect ke halaman index.php
             echo "<script> 
             window.location='divisi.php'</script>";
          }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='divisi.php'>Kembali Ke Form</a>";
          }
 
} 

?>