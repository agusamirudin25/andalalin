<?php
require_once "../../class/perusahaan.php";
require_once "../../class/koneksi.php";
$perusahaan = new perusahaan();
$koneksi = new koneksi();

$no_reg = $_POST['no_reg'];
$proses = $_POST['proses'];

// kode otomatis di tinjauan
$query_kode = $koneksi->conn->query("SELECT max(kode_tinjauan) AS kode FROM tinjauan");
$row = $query_kode->fetch_assoc();

if ($row) {
    $nilai_kode = substr($row['kode'], 4);
    $kode_tinjauan = (int) $nilai_kode;
    $kode_tinjauan = $kode_tinjauan + 1;
    $kode_tinjauan_otomatis = "R" . str_pad($kode_tinjauan, 4, "0", STR_PAD_LEFT);
} else {
    $kode_tinjauan_otomatis = "T0001";
}
// end kode otomatis

if ($proses == 'update') {
    $status = $perusahaan->ubah($no_reg, $kode_tinjauan_otomatis);
} else {
    $status = $perusahaan->hapus_data($no_reg);
}
echo json_encode($status);
