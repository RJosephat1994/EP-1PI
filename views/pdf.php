<?php


require('../fpdf/fpdf.php');
include_once("../controllers/ProductsPedController.php");
include_once("../models/Cliente.php");
session_start();

$cliente= Cliente::get();

$pdf=new FPDF();
$pdf2=new FPDF();
$pdf->AddPage();
foreach ($cliente as $key) {
  # code...

$pdf->SetFont('Arial','B',18);

$pdf->Cell(40,10,'LA PIZZA LOCA');
$pdf->SetFont('Arial','B',16);
$pdf->Ln();
$pdf->Cell(40,10,'Nombre:'.$key['nombre']);
$pdf->Ln();
$pdf->Cell(40,10,'Direccion: '.$key['direccion']);
$pdf->Ln();
$pdf->Cell(40,10,'Telefono: '.$key['telefono']);
$pdf->Ln();
$pdf->Cell(40,10,'Tu pedido es:');
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,"Producto");
$pdf->Cell(10,10," ");
$pdf->Cell(40,10,"Precio");
$pdf->Cell(1,1," ");
$pdf->Cell(40,10,"Cantidad");
$pdf->Cell(10,10,"Subtotal");

$pdf->Ln();
$i=0;
$total=0;
$arre=array();

$pdf->SetFont('Arial','B',12);
 foreach ($pro as $pr){

$pdf->Cell(40,10,$pr['nombre']);
$pdf->Cell(10,10," ");
$pdf->Cell(40,10,"$".$pr['precio'].".00");
$pdf->Cell(1,1," ");
$pdf->Cell(40,10,$listanorm[$i]);
$pdf->Cell(1,1," ");
$pdf->Cell(40,10,"$".$pr['precio']*$listanorm[$i].".00");
$total=$total+$pr['precio']*$listanorm[$i];
$i=$i+1;
$pdf->Ln();

 }
$pdf->Cell(80,10,"TOTAL: $".$total.".00");

$pdf->Output();
}
?>
