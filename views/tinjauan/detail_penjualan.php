<?php
$no_faktur = $_GET['no_faktur'];
require_once 'library/tanggal.php';
?>
<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<?php
			if ($_GET['p'] == 'cetak_detail') { ?>
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<br><br>
							<img src="logo1.png" style="width: 250px;">
							<h6 style="padding-top: 10px;"></h6>
						</div>
						<div class="col col-lg-12 text-center align-bottom">
							<h2><b> CV SURYA BAJA MANDIRI </b></h2>
							<h6 style="padding-top: 5px;">
								<b>Metal & Components Machinery for Fabrication </b>
							</h6>
							<h6 style="padding-top: 10px;">
								Jalan Citarum Raya Krajan No.63 Kelurahan Adiarsa Barat <br>
								Kecamatan Karawang Barat Kabupaten Karawang Telp (0267) 409566
							</h6>
						</div>
						<div class="col col-sm-1"></div>
					</div>
				</div>

				<hr style=" border: 2px solid black; margin: 4px 0px;">
				<hr style=" border: 2px solid black; margin: 4px 0px;"><br>
			<?php
			}
			?>
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						FAKTUR
					</h3>
					<hr>
				</div>
				<?php
				$query = mysqli_query($koneksi->conn, "SELECT a.no_faktur, a.kode_customer, b.nama_customer, a.no_po FROM detail_transaksi a JOIN customer b ON a.kode_customer=b.kode_customer WHERE a.no_faktur='$no_faktur'");
				$data1 = mysqli_fetch_assoc($query);
				?>
				<div class="row">
					<div class="col">
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">No Faktur :</label>
							</div>
							<div class="col">
								<label><?php echo $data1['no_faktur']; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">Kode Customer :</label>
							</div>
							<div class="col">
								<label><?php echo $data1['kode_customer']; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">Nama Customer :</label>
							</div>
							<div class="col">
								<label><?php echo $data1['nama_customer']; ?></label>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">No PO :</label>
							</div>
							<div class="col">
								<label><?php echo $data1['no_po']; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">No Surat Jalan :</label>
							</div>
							<div class="col">
								<?php
								$querySJ = mysqli_query($koneksi->conn, "SELECT DISTINCT no_surat_jalan FROM surat_jalan WHERE no_po = '" . $data1['no_po'] . "'");
								if (mysqli_num_rows($querySJ) > 0) {
									while ($dataSJ = mysqli_fetch_assoc($querySJ)) { ?>
										<label class="control-label" style="text-align:center"><?= $dataSJ['no_surat_jalan']; ?>,</label>

								<?php
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-striped text-center">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Qty</th>
							<th>Satuan</th>
							<th>Harga</th>
							<th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
						<?php
						echo $penjualan->detail_penjualan($data1['no_po']);
						?>
					</tbody>
				</table>
				<div class="text-center" id="tombol">
					<a href="index.php?p=data_penjualan" class="btn btn-sm btn-danger" id="btn-nota1">
						<span class="fa fa-angle-double-left"></span> Kembali
					</a>
					<a id="btn-nota2" class="btn btn-sm btn-info" href="index.php?p=cetak_detail&no_faktur=<?php echo $_GET['no_faktur']; ?> " target="_blank">
						<span class="fa fa-print"></span> Cetak
					</a>
				</div>
				<?php
				if ($_GET['p'] == 'cetak_detail') {
				?>
					<div class="container"><br><br><br>
						<div class="row">
							<div class="col"></div>
							<div class="col"></div>
							<div class="col text-center">
								<div class="row">
									<div class="col">
										<b>
											Karawang <?= tanggal(date('Y-m-d')); ?> <br>
											<?= $_SESSION['level']; ?>
										</b>
									</div>
								</div>
								<br><br><br><br><br>
								<div class="row">
									<div class="col">
										<b><?= $_SESSION['nama_user']; ?></b>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>