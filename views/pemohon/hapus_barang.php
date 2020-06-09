<?php
$kode_barang = $_GET['kode_barang'];
$barang->hapus_barang($kode_barang);
?>
<meta http-equiv="refresh" content="2;url=index.php?p=barang">