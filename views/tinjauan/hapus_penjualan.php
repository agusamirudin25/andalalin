<?php
$no_faktur = $_GET['no_faktur'];
$penjualan->hapus_penjualan($no_faktur);
?>
<meta http-equiv="refresh" content="2;url=index.php?p=tambah_penjualan">