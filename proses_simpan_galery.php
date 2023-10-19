<?php
// Load file koneksi.php
include "conn.php";


 if (isset($_POST['simpan'])) {
  //buat folder bernama gambar
  $tempdir = "images/"; 
        if (!file_exists($tempdir))
        mkdir($tempdir,0755); 
        //gambar akan di simpan di folder gambar
        $target_path = $tempdir . basename($_FILES['file']['name']);

        //nama gambar
        $nama_gambar=$_FILES['file']['name'];
        //ukuran gambar
        $ukuran_gambar = $_FILES['file']['size']; 

        $fileinfo = @getimagesize($_FILES["filegambar"]["tmp_name"]);
        //lebar gambar
        //$width = $fileinfo[0];
        //tinggi gambar
        //$height = $fileinfo[1]; 
        if($ukuran_gambar > 901920){ 
          echo  ("<script LANGUAGE='JavaScript'>
          window.alert(' Gambar Tidak Tersimpan, Ukuran Gambar Melebihi 80kb');
          window.location.href='galery.php';
          </script>");
        }//else if ($width > "480" || $height > "640") {
         //    echo 'Ukuran gambar harus 480x640';
        //}
        else{
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                
                //$sql=mysql_query("INSERT INTO produk(NamaProduk,Gambar) VALUES('".$_POST['nama']."', '".$nama_gambar."')");
               $query = "INSERT INTO galery VALUES( '".$galery_id."',  2 , '".$_POST['id_barang']."', '".$nama_gambar."' )";
                $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

                echo  ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Insert');
    window.location.href='galery.php';
    </script>");
            } else {
                                echo  ("<script LANGUAGE='JavaScript'>
    window.alert('Data Tidak Tersimpan');
    window.location.href='galery.php';
    </script>");
            }
        } 
 }
?>