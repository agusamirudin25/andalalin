<?php
require_once "../../class/tinjauan.php";
require_once "../../class/koneksi.php";
$tinjauan = new tinjauan();
$koneksi = new koneksi();

$kode_tinjauan = $_POST['kode_tinjauan'];
$keterangan = $_POST['msg'];
$tanggal = date('yy-m-d');
$nip = $_POST['nip'];

// kode otomatis di rekomendasi
$query_kode = $koneksi->conn->query("SELECT max(kode_rekomendasi) AS kode FROM rekomendasi");
$row = $query_kode->fetch_assoc();

if ($row) {
    $nilai_kode = substr($row['kode'], 4);
    $kode_rekomendasi = (int) $nilai_kode;
    $kode_rekomendasi = $kode_rekomendasi + 1;
    $kode_rekomendasi_otomatis = "R" . str_pad($kode_rekomendasi, 4, "0", STR_PAD_LEFT);
} else {
    $kode_rekomendasi_otomatis = "R0001";
}
// end kode otomatis

$row_tinjauan = $koneksi->conn->query("SELECT nik, no_registrasi FROM tinjauan WHERE kode_tinjauan = '$kode_tinjauan'")->fetch_assoc();
$nik = $row_tinjauan['nik'];
$no_reg = $row_tinjauan['no_registrasi'];

if ($keterangan == 1) {
    $query = $koneksi->conn->query("UPDATE tinjauan SET keterangan = '$keterangan', nip = '$nip' WHERE kode_tinjauan = '$kode_tinjauan'");
    $query2 = $koneksi->conn->query("INSERT INTO rekomendasi VALUES('$kode_rekomendasi_otomatis', '$kode_tinjauan', '$nik', '$no_reg', '', '0', '$tanggal')");
} else {
    $query = $koneksi->conn->query("UPDATE tinjauan SET keterangan = '$keterangan' WHERE kode_tinjauan = '$kode_tinjauan'");
}

$status = $koneksi->conn->affected_rows;
echo json_encode($status);
