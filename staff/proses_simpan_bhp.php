<?php
// Load file koneksi.php
include "../conn.php";

           
//proses
	// $bhp_id;
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $stok = $_POST[0];
    $golongan_id = $_POST['golongan_id'];


$cekdulu= "SELECT * FROM bhp WHERE nama_barang='$nama_barang'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysqli_query($koneksi, $cekdulu); 

if (mysqli_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    echo "<script>alert('Nama Barang atau Kode Sudah Digunakan');history.go(-1) </script>";
} 
  else { 
          $query = "INSERT INTO bhp VALUES('".$bhp_id."', '".$nama_barang."', '".$stok."', '".$satuan."', '".$golongan_id."')";
            $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

          if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
                     // header("location: kategori.php"); // Redirect ke halaman index.php
             echo "<script> 
             window.location='bhp.php'</script>";
          }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='kategori.php'>Kembali Ke Form</a>";
          }
 
} 

?>