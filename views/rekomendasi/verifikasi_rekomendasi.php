<?php
require_once "../../class/rekomendasi.php";
require_once "../../class/koneksi.php";
$tinjauan = new Rekomendasi();
$koneksi = new koneksi();

$kode_rekomendasi = $_POST['kode_rekomendasi'];
$keterangan = $_POST['msg'];
$nip = $_POST['nip'];
$query = $koneksi->conn->query("UPDATE rekomendasi SET keterangan = '$keterangan', nip = '$nip' WHERE kode_rekomendasi = '$kode_rekomendasi'");
$status = $koneksi->conn->affected_rows;
echo json_encode($status);
