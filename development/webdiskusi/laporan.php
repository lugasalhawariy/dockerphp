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
$pdf->Cell(190,7,'PROGRAM STUDI TEKNIK INFORMATIKA',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR STATUS PEMROGRAMAN WEB DINAMIS',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NAMA',1,0);
$pdf->Cell(100,6,'ARGUMEN',1,0);
$pdf->Cell(50,6,'REFERENSI',1,1);
$pdf->SetFont('Arial','',10);
include 'function.php';
$statusku = mysqli_query($koneksi, "SELECT * FROM statusku JOIN user ON user.id_user = statusku.id_user");
while ($row = mysqli_fetch_array($statusku)){
    $pdf->Cell(20,6,$row['username'],1,0);
    $pdf->Cell(100,6,$row['argumen'],1,0);
    $pdf->Cell(50,6,$row['sumber'],1,1);
}
$pdf->Output();
?>