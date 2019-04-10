<?php

include "function/config.php";
include "function/Database.php";
	require('repoHelper/fpdf/fpdf.php');
		require('repoHelper/fpdf/rotation.php');


		$db = new Database();
		


class PDF extends PDF_Rotate
{
function Header()
{
	//Put the watermark
	//$this->SetFont('Arial','B',50);
	//$this->SetTextColor(255,192,203);
	//$this->RotatedText(65,190,'A p p r o v e d',45);
}
function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat='Blood Bank Managemant System';				

		
		
		$pdf->Image('image/blood1.jpg',10,9,17);
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',14);
		$pdf->Write(5, $iubat);
		$pdf->Ln();
		$pdf-> Cell(55);
        $pdf->SetFont('Times','',10);
        $pdf->Write(5, '');
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4, '4 Embankment Drive Road (off Dhaka-Ashulia Road), Sector 10, Uttara Model Town, Dhaka 1230, Bangladesh');
				$pdf->Ln();
		$pdf-> Cell(22);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4,'Phone: 896 3523-27, 0174 014933, 892 3469-70, 891 8412, Fax: 892 2625, Email: info@medical.com Web:www.madical.com');
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf-> Cell(85);
		$pdf->SetFont('Times','U',10);
		$pdf->Write(5, 'Donation List');
		$pdf->Ln();

		$pdf->Ln(2);			


$pdf-> Cell(5);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(8,6,'SL',1);
		$pdf->Cell(22,6,' User Id',1);
		$pdf->Cell(22,6,' Name',1);
		$pdf->Cell(20,6,' Blood Group',1);
		$pdf->Cell(10,6,' Unit',1);
		$pdf->Cell(20,6,' Donation-Date',1);
		$pdf->Cell(20,6,' Recipient-Address',1);
		$pdf->Cell(20,6,'Confirmed_By',1);
		//$pdf->Cell(26,6,'Username',1);
		// $pdf->Cell(26,6,'Photo',1);
		
		//$pdf->Cell(22,6,'Picture',1);
		$pdf->Ln();

					$sql ="SELECT * from donation_tb ";
					$qry = $db->select($sql);
					
 
					$sl=1;
					while($rec = $qry->fetch_assoc())
						

                     {
                        

						$pdf-> Cell(5);
						$pdf->SetFont('Times','',8);
						$pdf->Cell(8,6,$sl,1);


						$pdf->Cell(22,6,$rec['user_id'],1);

					  if($rec['type']=="Donor"){
					    $sql2="SELECT name FROM donor_tb WHERE username='$rec[user_id]' ";
					  }else{
					    $sql2="SELECT bank_name FROM blood_bank_tb WHERE bank_id='$rec[user_id]' ";
					  }
					  $readMax2=$db->select($sql2);
					  if($readMax2){
					  while($count2 = $readMax2->fetch_assoc()){ 

					     if($rec['type']=="Donor"){ 
					  $pdf->Cell(22,6,$count2['name'],1);
					  }else{ 
					  $pdf->Cell(22,6,$count2['bank_name'],1);
					 
					   } }  } else{ 

					 $pdf->Cell(22,6,"Not Found",1);
					  } 


						$pdf->Cell(20,6,$rec['bl_group'],1);
						$pdf->Cell(10,6,$rec['unit'],1);
						$pdf->Cell(20,6,$rec['donation_date'],1);
						$pdf->Cell(20,6,$rec['recipient_address'],1);
						$pdf->Cell(20,6,$rec['confirmed_by'],1);
					
						
						// $image1=$rec['img'];
						// $pdf->Cell( 20, 20, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(),10, 6), 0, 0, 'L', false);

						$sl++;
						$pdf->Ln();
						}      
                

		
		$pdf->Ln();
		$pdf->Ln();	
		
		$pdf->Output();



?>

