<?php
$koneksi = new koneksi;
if (isset($_POST['simpan'])) {
  $no_faktur = trim($_POST['no_faktur']);
  $no_po = trim(ucwords($_POST['no_po']));
  $kode_customer = trim(ucwords($_POST['kode_customer']));
  $total = trim(ucwords($_POST['total']));
  $tgl = trim(ucwords($_POST['tgl']));
  $error = array();
  if (empty($no_po)) {
    $error['no_po'] = 'No Po Harus Diisi !<br>';
  }
  if (empty($kode_customer)) {
    $error['kode_customer'] = ' Kode Customer Harus Diisi !<br>';
  }
  if (empty($total)) {
    $error['total'] = ' Total Harus Diisi !<br>';
  }
  if (empty($tgl)) {
    $error['tgl'] = 'Tanggal Barang Harus Diisi !';
  }
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }
  if (count($error) == 0) //jika tidak ada error
  {
    $penjualan->tambah_penjualan($no_faktur, $no_po, $kode_customer, $total, $tgl); //simpan data
  }
}
$no_po = mysqli_query($koneksi->conn, "select * from po ");
$kode = $penjualan->no_faktur();
?>
<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <div class="text-center">
          <h3 class="page-header">
            ENTRI PENJUALAN
          </h3>
        </div>
        <hr>


        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">No Faktur</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="no_faktur" value="<?php echo $kode ?>" readonly>
            </div>
          </div>
          <script>
            var ajaxku;

            function buatajax() {
              if (window.XMLHttpRequest) {
                return new XMLHttpRequest();
              }
              if (window.ActiveXObject) {
                return new ActiveXObject("Microsoft.XMLHTTP");
              }
              return null;
            }

            function otomatis(no_po) {
              ajaxku = buatajax();
              var url = "assets/sync/getData.php";
              url = url + "?no_po=" + no_po;
              ajaxku.onreadystatechange = stateChanged;
              ajaxku.open("GET", url, true);
              ajaxku.send(null);
            }

            function stateChanged() {
              var data1 = [];
              if (ajaxku.readyState == 4) {
                data = ajaxku.responseText;
                if (data.length > 0) {
                  data1 = data.split(" ");
                  document.getElementById('kode_customer').value = data1[0];
                  document.getElementById('total').value = data1[1];
                } else {
                  document.getElementById('kode_customer').value = '';
                  document.getElementById('total').value = '';
                }
              }
            }
          </script>

          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">No PO</label>
            <div class="col-sm-6">
              <select name="no_po" id="no_po" class="form-control" onchange="otomatis(this.value);">
                <option disabled selected value=''>--Silahkan Pilih--</option>
                <?php
                $queryGetPo = mysqli_query($koneksi->conn, "
                SELECT DISTINCT k.no_po, c.nama_customer FROM po k LEFT JOIN customer c ON k.kode_customer=c.kode_customer WHERE k.no_po NOT IN (SELECT DISTINCT no_po FROM detail_transaksi) AND k.no_po NOT IN (SELECT DISTINCT no_po FROM surat_jalan)
              ");
                while ($data = mysqli_fetch_array($queryGetPo)) { ?>
                  <option value='<?= $data[0] ?>'><?= $data[0] . " - " . $data[1] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Kode Customer</label>
            <div class="col-sm-6">
              <select name="kode_customer" class="form-control" id="kode_customer" required>
                <?php
                $query = mysqli_query($koneksi->conn, "SELECT * FROM customer");
                echo "<option value=''>--Silahkan Pilih--</option>";
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?php echo $row['kode_customer']; ?>"><?php echo $row['kode_customer'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Total</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="total" id="total" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Tanggal Bayar</label>
            <div class="col-sm-6">
              <input type="date" class="form-control" name="tgl" id="" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Bukti</label>
            <div class="col-sm-6">
              <input type="file" class="" name="gambar" id="gambar">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="simpan" class="btn btn-sm btn-primary btn-custom"><span class="fa fa-save"></span> Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-refresh"></span> Batal</button>
              <!--<a href="index.php?p=data_penjualan" class="btn btn-sm btn-danger btn-custom">
                <span class="fa fa-angle-double-left"></span> Kembali
              </a>-->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--TABEL PENJUALAN-->

<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <?php
        if ($penjualan->tampil_penjualan() != FALSE) { ?>
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>No Faktur</th>
                <th>No Po</th>
                <th>Kode Customer</th>
                <th>Total</th>
                <th>Tanggal Bayar</th>
                <th style="text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($penjualan->tampil_penjualan() as $data_penjualan) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td>
                    <?php echo $data_penjualan['no_faktur']; ?>
                  </td>
                  <td>
                    <?php echo $data_penjualan['no_po']; ?>
                  </td>
                  <td>
                    <?php echo $data_penjualan['kode_customer']; ?>
                  </td>
                  <td>
                    Rp. <?php echo number_format($data_penjualan['total']) . "" ?>
                  </td>
                  <td>
                    <?php echo date('d-m-Y', strtotime($data_penjualan['tgl'])); ?>
                  </td>
                  <td style="text-align:center">
                    <a href="?p=hapus_penjualan&no_faktur=<?php echo $data_penjualan['no_faktur']; ?>&k=tr">
                      <button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');">
                        <span class="fa fa-trash"></span> Hapus</button></a>
                  </td>
                </tr>
              <?php
                $no++;
              } ?>
              <tr>
                <th colspan=3></th>
                <th>Total</th>
                <th>
                  Rp.
                  <?php
                  $query1 = mysqli_query($koneksi->conn, "SELECT sum(total) AS total from transaksi_penjualan WHERE no_po='$data_penjualan[no_po]'");
                  $jumlah = mysqli_fetch_array($query1);
                  echo number_format($jumlah['total']) . "";
                  ?>
                </th>
                <th colspan="2"></th>
              </tr>



            </tbody>
          </table>
          <a href="?p=proses&no_faktur=<?= $data_penjualan['no_faktur'] ?>">
            <button class="btn btn-sm btn-primary btn-custom"><span class="fa fa-cog"></span> Proses</button></a>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>