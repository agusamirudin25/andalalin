<?php

$kode_penjualan = $_GET['kode_penjualan'];
$result = $penjualan->detail_penjualan($kode_penjualan);

if (isset($_POST['simpan'])) {
  $kode_penjualan = trim($_POST['kode_penjualan']);
  $no_po = trim(ucwords($_POST['no_po']));
  $kode_customer = trim(ucwords($_POST['kode_customer']));
  $kode_barang = trim(ucwords($_POST['kode_barang']));
  $harga = trim(ucwords($_POST['harga']));
  $qty = trim(ucwords($_POST['qty']));
  $total = trim(ucwords($_POST['total']));
  $tgl = trim(ucwords($_POST['tgl']));
  $time = trim(ucwords($_POST['time']));

  $error = array();
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }
  if (count($error) == 0) //jika tidak ada error
  {
    $penjualan->edit_penjualan($kode_penjualan, $no_po, $kode_customer, $kode_barang, $harga, $qty, $total, $tgl, $time); //simpan data
    $penjualan->detail_penjualan($kode_penjualan);
  }
}
?>

<div class="card">
  <div class="card-body">
    <div class="box-body">
      <h3 class="page-header">
        <center>EDIT DATA PENJUALAN
          <hr>
      </h3>
      </center>
      <form action="" method="post" class="form-horizontal">
        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">Kode Penjualan :</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="kode_penjualan" value="<?php echo $penjualan->kode_penjualan ?>" kode_penjualan="" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">No PO :</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="no_po" id="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">Kode Customer :</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="kode_customer" value="<?php echo $penjualan->kode_customer; ?>" kode_penjualan="" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">Kode Barang :</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="kode_barang" value="<?php echo $penjualan->kode_barang; ?>" kode_penjualan="" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">Harga :</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="harga" value="<?php echo $penjualan->harga; ?>" kode_penjualan="" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">Qty :</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="qty" value="<?php echo $penjualan->qty; ?>" kode_penjualan="" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">Total :</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="total" value="<?php echo $penjualan->total; ?>" kode_penjualan="" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label" style="text-align:right">Tanggal :</label>
          <div class="col-sm-6">
            <input type="date" class="form-control" name="tgl" value="<?php echo $penjualan->tgl; ?>" kode_penjualan="" required>
            <input type=hidden class="form-control" name="time" value="<?php echo date('H:i:s'); ?>" readonly>

          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-6">
            <button type="submit" name="simpan" class="btn btn-sm btn-primary btn-custom"><span class="ti-save"> Simpan</button>
            <button type="reset" class="btn btn-sm btn-warning btn-custom"><span class="ti-na"></span> Reset</button>
            <a href="index.php?p=tambah_penjualan" class="btn btn-sm btn-danger btn-custom"><span class="ti-angle-double-left"> Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>