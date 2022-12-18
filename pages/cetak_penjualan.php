<?php

session_start();
include 'config.php';
require('fpdf.php');

$query_count = mysqli_query($conn,"select sum(total) as total from tblmaster_jual");
$jumlah = mysqli_fetch_assoc($query_count);

$pdf=new fpdf('P','mm','A4');
$pdf->Addpage();
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'Laporan Penjualan',0,1,'C');
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'PT. New Town',0,1,'C');
$pdf->cell(10,7,'',0,1);

$pdf->setfont('Arial','B',12);
 $pdf->cell(20,6,'Kode',1,0,'C');
 $pdf->cell(30,6,'Tanggal',1,0,'C');
 $pdf->cell(50,6,'Customer',1,0,'C');
 $pdf->cell(30,6,'Alamat',1,0,'C');
 $pdf->cell(27,6,'Telpon',1,0,'C');
 $pdf->cell(22,6,'Total',1,0,'C');
 $pdf->cell(18,6,'Diskon',1,1,'C');
$pdf->setfont('Arial','',10);

include('config.php');
$tbbarang=mysqli_query($conn, "select * from tblmaster_jual");
while($row = mysqli_fetch_array($tbbarang)){
 $pdf->cell(20,6,$row['kodetr'],1,0);
 $pdf->cell(30,6,$row['tanggal'],1,0);
 $pdf->cell(50,6,$row['pelanggan'],1,0);
 $pdf->cell(30,6,$row['alamat'],1,0);
 $pdf->cell(27,6,$row['telpon'],1,0);
 $pdf->cell(22,6,"Rp. ".$row['total'].",-",1,0);
 $pdf->cell(18,6,$row['diskon']." %",1,1);
}

$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'',0,1);
$pdf->Cell(70,6,'Total Transaksi Penjualan      : Rp. '.$jumlah['total'].",-",0,1);

$pdf->output();
?>