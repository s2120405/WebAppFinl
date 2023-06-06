<?php
include_once 'classes/rentClass.php';
include 'config/config1.php';
require('fpdf/fpdf.php');

$rentals = new Rental();

class PDF extends FPDF
{
//Page header
function Header(){
	 
	//Arial 12
	$this->SetFont('Arial','',12);
	//Background color
	$this->SetFillColor(200,220,255);
	//Title
	$this->Cell(0,6,"Item List",0,1,'L',1);
	$this->SetFont('Arial','BIU',10);
	$this->Cell(0,6,"Date Generated ".date("Y-m-d h:i:s A")." ",0,1,'L',1);
	$this->SetFont('Arial','',12);
    
   
    //Line break
    $this->Ln(4);
}
function BasicTable($header){
    //Header
    foreach($header as $col)
        $this->Cell(47,7,$col,0,0,'C');
	$this->Ln();
}
//Page footer
function Footer(){
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
// Default Header
//$header=array('Nbr','Name','Access Level','E-Mail');
//$pdf->BasicTable($header);
// Custom Header
$pdf->Cell(10,12,"ID",1,0,'C');
$pdf->Cell(50,12,"Item(s)",1,0,'C');
$pdf->Cell(46,12,"Quantity",1,0,'C');
$pdf->Cell(46,12,"Amount",1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$count = 1;

 // Replace with the actual customer ID
 if($rentals->list_rental() != false){
    foreach($rentals->list_rental() as $value){
       extract($value);

        $pdf->Cell(10, 12, "  " . $rental_id, 0, 0, 'L');
        $pdf->Cell(50, 12, $item_name, 0, 0, 'L');
        $pdf->Cell(50, 12, $item_qty, 0, 0, 'L');
        $pdf->Cell(40, 12, $rent_price, 0, 0, 'L');
        $pdf->Ln(6);
        $count++;
    }
}


$pdf->SetFont('Arial','I',12);
$pdf->Cell(176,12,"--Nothing Follows--",0,0,'C');
$pdf->Output();
?>