<?php
require('fpdf.php');
$pdf=new fpdf('L','mm','A4');
$pdf->Addpage();
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'Laporan Stok',0,1,'C');
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'PT. New Town',0,1,'C');
$pdf->cell(10,7,'',0,1);

$pdf->setfont('Arial','B',12);
 $pdf->cell(20,6,'Kode',1,0);
 $pdf->cell(50,6,'Nama',1,0);
 $pdf->cell(27,6,'Harga Jual',1,0);
 $pdf->cell(25,6,'Harga Beli',1,0);
 $pdf->cell(27,6,'Stok Awal',1,0);
 $pdf->cell(27,6,'Terjual',1,0);
 $pdf->cell(27,6,'Terbeli',1,0);
 $pdf->cell(27,6,'Stok Akhir',1,1);
$pdf->setfont('Arial','',10);

include('config.php');
$tbbarang=mysqli_query($conn, "select a.kode, a.nama, a.satuan, a.hjual, a.hbeli, a.jumlah, (select sum(b.jumlah) from tbldetail_jual b where b.kode=a.kode) as \"Jual\", (select sum(c.jumlah) from tbldetail c where c.kode=a.kode) as \"Beli\" from tbbarang a");

while($row = mysqli_fetch_array($tbbarang)){
 $pdf->cell(20,6,$row['kode'],1,0);
 $pdf->cell(50,6,$row['nama'],1,0);
 $pdf->cell(27,6,$row['hjual'],1,0);
 $pdf->cell(25,6,$row['hbeli'],1,0);
 $pdf->cell(27,6,$row['jumlah'],1,0);
 $pdf->cell(27,6,$row['Jual']." ".$row['satuan'],1,0);
 $pdf->cell(27,6,$row['Beli']." ".$row['satuan'],1,0);
 $pdf->cell(27,6,$row['jumlah']-$row['Jual']+$row['Beli'],1,1);
}

$pdf->output();
?>