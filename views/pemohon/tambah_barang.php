<?php
if (isset($_POST['simpan'])) {
  $kode_barang = trim($_POST['kode_barang']);
  $part_no = trim(ucwords($_POST['part_no']));
  $nama_barang = trim(ucwords($_POST['nama_barang']));
  $harga = trim(ucwords($_POST['harga']));
  $satuan = trim(ucwords($_POST['satuan']));

  $error = array();
  if (empty($part_no)) {
    $error['part_no'] = 'Part Number Harus Diisi !<br>';
  }
  if (empty($nama_barang)) {
    $error['nama_barang'] = ' Nama Barang Harus Diisi !<br>';
  }
  if (empty($harga)) {
    $error['harga'] = 'Harga Harus Diisi !';
  }
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }
  if (count($error) == 0) //jika tidak ada error
  {
    $barang->simpan_barang($kode_barang, $part_no, $nama_barang, $harga, $satuan); //simpan data
  }
}
?>
<h4 style="text-align:center"><b></b></h4>
<form action="" method="post" class="form-horizontal">
  <?php
  $kode = $barang->kode_terakhir();
  ?>

  <div class="col-lg-12" style="font-family:Arial">
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <h3 class="page-header">
            <center>TAMBAH DATA BARANG
              <hr>
          </h3>
          </center>
          <form action="" method="post" class="form-horizontal">
            <div class="form-group row">
              <label class="col-sm-3 control-label" style="text-align:right">Kode Barang</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_barang" value="<?php echo $kode ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label" style="text-align:right">Part Number</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="part_no" id="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label" style="text-align:right">Nama Barang</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_barang" id="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label" style="text-align:right">Harga</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="harga" id="">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label" style="text-align:right">Satuan</label>
              <div class="col-sm-6">
                <select name="satuan" class="form-control">
                  <option disabled selected>--Silahkan Pilih--</option>
                  <option value="pcs">Pcs</option>
                  <option value="batang">Batang</option>
                  <option value="pack">Pack</option>
                  <option value="box">Box</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label"></label>
              <div class="col-sm-6">
                <button type="submit" name="simpan" class="btn btn-sm btn-primary btn-custom"><span class="fa fa-save"></span> Simpan</button>
                <button type="reset" class="btn btn-sm btn-secondary btn-custom"><span class="fa fa-refresh"></span> Batal</button>
                <a href="index.php?p=barang" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-angle-double-left"></span> Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>