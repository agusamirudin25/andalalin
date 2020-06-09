<?php

$kode_barang = $_GET['kode_barang'];
$barang->detail_barang($kode_barang);

if (isset($_POST['simpan'])) {
    $part_no = trim(ucwords($_POST['part_no']));
    $nama_barang = trim(ucwords($_POST['nama_barang']));
    $harga = trim(ucwords($_POST['harga']));
    $satuan = trim(ucwords($_POST['satuan']));

    $error = array();
    if (isset($error)) {
        foreach ($error as $key => $values) {
            echo $values; //tampilkan semua error
        }
    }

    if (count($error) == 0) //jika tidak ada error
    {
        $barang->edit_barang($kode_barang, $part_no, $nama_barang, $harga, $satuan); //edit data
        $barang->detail_barang($kode_barang);
    }
}
if ($barang->satuan == 'Pieces') {
    $pi = 'selected';
    $ba = '';
    $pa = '';
} elseif ($barang->satuan == 'Batang') {
    $pi = '';
    $ba = 'selected';
    $pa = '';
} elseif ($barang->satuan == 'Pack') {
    $pi = '';
    $ba = '';
    $pa = 'selected';
}

?>

<div class="col-lg-12" style="font-family:Arial">
    <div class="card">
        <div class="card-body">
            <div class="box-body">
                <div class="text-center">
                    <h3 class="page-header">
                        EDIT DATA BARANG
                    </h3>
                </div>
                <hr>
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" style="text-align:right">Kode Barang</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="kode_barang" value="<?php echo $kode_barang ?>" kode_barang="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" style="text-align:right">Part Number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="part_no" value="<?php echo $barang->part_no; ?>" kode_barang="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" style="text-align:right">Nama Barang</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama_barang" value="<?php echo $barang->nama_barang; ?>" kode_barang="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" style="text-align:right">Harga</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="harga" value="<?php echo $barang->harga; ?>" kode_barang="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" style="text-align:right">Satuan</label>
                        <div class="col-sm-6">
                            <select name="satuan" class="form-control">
                                <option disabled selected>--Silahkan Pilih--</option>
                                <option value="pcs" <?php if ($barang->satuan == 'pcs') {
                                                        echo "selected";
                                                    } ?>>Pcs</option>
                                <option value="batang" <?php if ($barang->satuan == 'batang') {
                                                            echo "selected";
                                                        } ?>>Batang</option>
                                <option value="pack" <?php if ($barang->satuan == 'pack') {
                                                            echo "selected";
                                                        } ?>>Pack</option>
                                <option value="box" <?php if ($barang->satuan == 'box') {
                                                        echo "selected";
                                                    } ?>>Box</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" name="simpan" class="btn btn-sm btn-primary btn-custom">
                                <span class="fa fa-save"></span>
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-sm btn-secondary btn-custom">
                                <span class="fa fa-refresh"></span>
                                Batal
                            </button>
                            <a href="index.php?p=barang" class="btn btn-sm btn-danger btn-custom">
                                <span class="fa fa-angle-double-left"></span>
                                Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>