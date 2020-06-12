<?php
ob_start();
require_once "library/fpdf/fpdf.php";

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->Image('images/logo_karawang.png', 15, 9, 23, 28); //Logo

$pdf->SetFont('Times', 'B', 15);
$pdf->Cell(5);
$pdf->Cell(180, 4, 'PEMERINTAH KABUPATEN KARAWANG', 0, 1, 'C');
$pdf->Cell(40);
$pdf->SetFont('Times', 'B', 24);
$pdf->Cell(110, 10, 'DINAS PERHUBUNGAN', 0, 1, 'C');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 0, 'Jl. Ir. H. Juanda No. 20 Kotabaru Karawang', 0, 1, 'C');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 10, 'Telp.(0264) 316714 - Fax.(0264) 8386812 Kode Pos 41374', 0, 1, 'C');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 0, 'Website : www.dishub.karawangkab.go.id   Email : dishub@karawangkab.go.id', 0, 1, 'C');

$pdf->SetLineWidth(0.6);
$pdf->Line(10, 38, 200, 38); //Garis 1
$pdf->SetLineWidth(0.2);
$pdf->Line(10, 39, 200, 39); //Garis 2


$pdf->SetFont('Times', 'B', 13);
$pdf->Text(85, 50, "A N D A L A L I N");
$pdf->SetLineWidth(0.2);
$pdf->Line(83, 51, 125, 51); //Garis 2
$pdf->SetFont('Times', '', 11);
$pdf->Text(85, 55, "Nomor :      /     /Dishub");

$pdf->ln(100);
$pdf->SetFont('Times', '', 11);
$pdf->Text(20, 70, "Sebagaimana  dalam  Undang  -  undang  Nomor  22  Tahun  2009  tentang  Lalu Lintas dan angkutan  jalan  dan");
$pdf->Text(10, 75, "Peraturan  Pemerintah  Nomor  32  tahun  2001  tentang  Manajemen  Kebutuhan  Lalu Lintas  disebutkan bahwa untuk");
$pdf->Text(10, 80, "memperoleh  persetujuan  hasil  analisis  dampak  lalu  lintas  maka pengembang atau pembangun harus menyampaikan");
$pdf->Text(10, 85, "hasil  analisis  dampak  lalu  lintas  kepada  menteri  yang  bertanggung jawab di bidang sarana dan prasarana lalu lintas");
$pdf->Text(10, 90, "dan angkutan jalan, gubernur, bupati, atau walikota sesuai dengan kewenangannya.");

$pdf->Text(20, 97, "Berdasarkan  hasil  verifikasi  data  dan  tinjauan  lokasi  yang  dilakukan  oleh Dinas  Perhubungan  Kabupaten");
$pdf->Text(10, 102, "Karawang serta rapat internal. Maka didapatkan hasil sebagai berikut :");
$pdf->Text(35, 110, "Nomor Induk Kependudukan   : ");
$pdf->Text(35, 117, "Nama Pemohon                        : ");
$pdf->Text(35, 124, "Nomor Izin Berusaha               : ");
$pdf->Text(35, 131, "Nama Perusahaan                     : ");
$pdf->Text(35, 138, "Nomor NPWP Perusahaan       : ");
$pdf->Text(35, 145, "Tanggal dikeluarkan                 : ");
$pdf->Text(35, 152, "Status                                        : ");
$pdf->SetFont('Times', 'B', 11);
$pdf->Text(86, 152, "");
$pdf->SetFont('Times', '', 11);
$pdf->Text(20, 160, "Demikian surat rekomendasi Analisis Dampak Lalu Lintas (ANDALALIN) ini agar digunakan sebagai mestinya.");

$get_xxx = $pdf->GetX();
$get_yyy = $pdf->GetY();

$width_cell = 47;
$height_cell = 8;




$pdf->SetFont('Times', '', 11);

$pdf->Text(125, $get_yyy + 50, "KEPALA DINAS PERHUBUNGAN");
$pdf->Text(132, $get_yyy + 55, "KABUPATEN KARAWANG");


$pdf->SetFont('Times', 'B', 12);
$pdf->Text(121, $get_yyy + 90, "ARIEF BIJAKSANA MARYUGO, S.IP");
$pdf->SetFont('Times', '', 11);
$pdf->Text(135, $get_yyy + 95, "NIP. 19680816 198903 1 007");
$pdf->Output();
?>
