<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string
$pdf->Cell(190,7,'ALAJINU COFFEE',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'19.00 - 23.00',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(190,7,'RIWAYAT DATA PESANAN PELANGGAN',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'ID',1,0,'C');
$pdf->Cell(100,6,'Tanggal',1,0,'C');
$pdf->Cell(50,6,'Jumlah',1,0,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','',10);
include 'koneksi.php';
$pemesanan = mysqli_query($koneksi, "select * from pemesanan");
while ($row = mysqli_fetch_array($pemesanan)){
 $pdf->Cell(20,6,$row['id_pemesanan'],1,0,'C');
 $pdf->Cell(100,6,$row['tanggal_pemesanan'],1,0,'C');
 $pdf->Cell(50,6,$row['total_belanja'],1,0, 'C');
 $pdf->Cell(10,7,'',0,1);
}
$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(300,7,'Yogyakarta,.............,....',0,1,'C');
$pdf->Cell(300,25,'Rizki Rizal Indrawan',0,1,'C');
$pdf->Cell(10,0,'',0,1);
$pdf->Cell(300,-15,'(1900018392)',0,1,'C');
$pdf->Output();
?>