<?php
session_start();
include 'config.php';
require('fpdf.php');

$kodetr=$_POST['kode'];

$query = mysqli_query($conn,"select * from tblmaster where kodetr='$kodetr'");
$master = mysqli_fetch_assoc($query);

$pdf=new fpdf('P','mm','A4');
$pdf->Addpage();
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'Nota Pembelian',0,1,'C');
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'PT. New Town',0,1,'C');
$pdf->cell(10,7,'',0,1);

$pdf->setfont('Arial','B',10);
 $pdf->cell(70,6,'Kode : '.$master['kodetr'],0,1);
 $pdf->cell(70,6,'Tanggal Transaksi : '.$master['tanggal'],0,1);
 $pdf->cell(70,6,'Supplier : '.$master['supplier'],0,1);
 $pdf->cell(70,6,'Alamat : '.$master['alamat'],0,1);
 $pdf->cell(70,6,'Telepon : '.$master['telpon'],0,1);
$pdf->setfont('Arial','',10);

$pdf->setfont('Arial','B',12);
 $pdf->cell(20,6,'Kode',1,0,'C');
 $pdf->cell(50,6,'Nama Barang',1,0,'C');
 $pdf->cell(50,6,'Satuan',1,0,'C');
 $pdf->cell(30,6,'Jumlah',1,0,'C');
 $pdf->cell(30,6,'Harga Satuan',1,1,'C');
$pdf->setfont('Arial','',10);

$tbbarang=mysqli_query($conn, "select * from tbldetail where kodetr='$kodetr'");
while($row = mysqli_fetch_array($tbbarang)){
 $pdf->cell(20,6,$row['kode'],1,0);
 $pdf->cell(50,6,$row['nama'],1,0);
 $pdf->cell(50,6,$row['satuan'],1,0);
 $pdf->cell(30,6,$row['jumlah'],1,0);
 $pdf->cell(30,6,"Rp. ".$row['harga'].",-",1,1);
}


$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'',0,1);
$pdf->Cell(70,6,'Diskon  :  '.$master	['diskon']." %" ,0,1);
$pdf->Cell(70,6,'Total Transaksi Pembelian  :  Rp. '.$master['total'].",-" ,0,1);


$pdf->output();
?>