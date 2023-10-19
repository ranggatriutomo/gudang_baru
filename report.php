<?php
define('FPDF_FONTPATH','fpdf17/font/');
require('fpdf17/fpdf.php');
 
class PDF extends FPDF
{
    //Page header
    function Header()
    {
        //Logo
        $this->Image('logo.jpg',10,13);
        //Arial bold 15
        $this->SetFont('Arial','',12);
        //pindah ke posisi ke tengah untuk membuat judul
        $this->Cell(80);
        //judul
        $this->Image('kop.jpg',5,5);
        // $this->Cell(30,17,'Laporan Peralatan',0,0,'C');
       //pindah baris
        $this->Ln(40);
        //buat garis horisontal
        // $this->Line(10,25,200,25);
        $this->Cell(190,7,'Tanggal :',0,1,'L');
        $this->Cell(190,7,'Tujuan :',0,1,'L');
    }
 
    //Page Content
    function Content()
    {
        include 'conn.php';
        $lokasi   = $_GET['id_lokasi'];

        $this->SetFont('Arial','',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $this->Cell(10,7,'',0,1);
 
        $this->SetFont('Times','',12);
        // for($i=1; $i<=40; $i++)
        $this->SetFillColor(192,192,192);
        $this->SetFont('Arial','B',10);
        $this->Cell(10,6,'NO',1,0,'C');
        // $this->Cell(50,6,'NAMA BARANG',1,0);
        // $this->Cell(50,6,'JUMLAH',1,0);
        $this->Cell(75,6,'NAMA BARANG',1,0);
        $this->Cell(75,6,'JUMLAH',1,1,'C');
         
        $this->SetFont('Arial','',10);


        $barang = mysqli_query($koneksi, "SELECT a.*, COUNT(a.id_kategori)as jumlah, b.* 
                        FROM tbasset a, tbkategori b 
                        WHERE a.id_kategori=b.id_kategori and a.id_lokasi='".$id_lokasi."'  
                        GROUP BY a.id_kategori");
        $no=1;
        while ($row = mysqli_fetch_array($barang)){
        $this->Cell(10,6,$no,1,0,'C');
        // $this->Cell(50,6,$row['nama_barang'],1,0);
        // $this->Cell(50,6,$row['jumlah'],1,0);
        $this->Cell(75,6,$row['nama_kategori'],1,0);
        $this->Cell(75,6,$row['jumlah'],1,1,'C'); 

        $no++;

        }
        
    }
 
    //Page footer
    function Footer()
    {
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-15);
        //buat garis horizontal
        $this->Line(10,$this->GetY(),200,$this->GetY());
        //Arial italic 9
        $this->SetFont('Arial','I',9);
        //nomor halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
    }
}
 
//contoh pemanggilan class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>