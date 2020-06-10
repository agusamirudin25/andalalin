<?php
$kode_customer = $_GET['kode_customer'];
$customer->hapus_customer($kode_customer);
?>
<meta http-equiv="refresh" content="2;url=index.php?p=customer">