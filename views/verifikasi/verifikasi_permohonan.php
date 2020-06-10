<?php
require_once "../../class/perusahaan.php";
require_once "../../class/koneksi.php";
$perusahaan = new perusahaan();
$koneksi = new koneksi();

$no_reg = $_POST['no_reg'];
$proses = $_POST['proses'];
if ($proses == 'update') {
    $status = $perusahaan->ubah($no_reg);
} else {
    $status = $perusahaan->hapus_data($no_reg);
}
echo json_encode($status);
