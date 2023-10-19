<?php 

  require('fpdf.php');             
  $pdf=new FPDF('P','cm','Legal');


 $pdf->AddPage();
 $pdf->SetFont('Arial','B',14);  
 $pdf->Image('logo.jpg',1,1,2,2);      
 $pdf->SetX(3);      
                                               $pdf->MultiCell(19.5,0.5,'SMKN 1 Percobaan',0,'L');  
                                                                                                              $pdf->SetX(3);   
                                                                                                                        $pdf->MultiCell(19.5,0.5,'Pemerintah Kota Beta',0,'L');                         $pdf->SetFont('Arial','B',10);             $pdf->SetX(3);             $pdf->MultiCell(19.5,0.5,'JL. Mengkubumi No. 1, Telpon : 0411400000',0,'L');                         $pdf->SetX(3);             $pdf->MultiCell(19.5,0.5,'website : www.imuh46.blogspot.com email : imuh46@gmail.com',0,'L');                         $pdf->Line(1,3.1,20.5,3.1);             $pdf->SetLineWidth(0.1);             $pdf->Line(1,3.2,20.5,3.2);                         $pdf->SetLineWidth(0);             $pdf->Ln();         $pdf->Output();         ?>

Mine coins - make money: http://bit.ly/money_crypto


?>