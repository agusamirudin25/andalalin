<div class="container-fluid" style="font-family: Arial, Helvetica, sans-serif;">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
						<h3 class="page-header">
							DATA REKOMENDASI
						</h3>
						<hr>
					</div>
					<table id="dataTable" class="table table-bordered table-striped" style="width: 100%;">
						<thead style="background-color: #605ca8; color: white;">
							<tr>
								<th>No</th>
								<th>Kode Rekomendasi</th>
								<th>No Registrasi</th>
								<th>Nama Pemohon</th>
								<th>Nama Perusahaan</th>
								<th>Keterangan</th>
								<!-- <th>Tanggal</th> -->
								<th style="text-align:center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($rekomendasi->lihat_data() != FALSE) {
								$no = 1;
								foreach ($rekomendasi->lihat_data() as $data_rekomendasi) {
							?>
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td><?php echo $data_rekomendasi['kode_rekomendasi']; ?></td>
										<td><?php echo $data_rekomendasi['nik']; ?></td>
										<td><?php echo $data_rekomendasi['nama']; ?></td>
										<td><?php echo $data_rekomendasi['nama_perusahaan']; ?></td>
										<td class="text-center"><span class="<?= ($data_rekomendasi['keterangan'] == 0) ? 'bg-warning' : 'bg-success' ?> <?= ($data_rekomendasi['keterangan'] == 2) ? 'bg-danger' : '' ?>" style="border-radius: 4px;background-color: #fff; display: inline-block; font-weight: 600;padding: 3px;">
												<?php if ($data_rekomendasi['keterangan'] == 0) {
													echo 'MENUNNGU';
												} elseif ($data_rekomendasi['keterangan'] == 1) {
													echo 'SESUAI';
												} else {
													echo 'TIDAK SESUAI';
												} ?>
											</span>
										</td>

										<td class="text-center">
											<button class="btn btn-sm btn-primary btn-custom" onclick="verif_rekomendasi('<?= $data_rekomendasi['kode_rekomendasi'] ?>', 1, '<?= $_SESSION['nip'] ?>')" title="sesuai" <?= ($data_rekomendasi['keterangan'] == 1 || $data_rekomendasi['keterangan'] == 2) ? 'disabled' : '' ?>><span class="fa fa-check"></span></button>
											<button class="btn btn-sm btn-danger btn-custom" onclick="verif_rekomendasi('<?= $data_rekomendasi['kode_rekomendasi'] ?>', 2, '<?= $_SESSION['nip'] ?>')" title="tidak sesuai" <?= ($data_rekomendasi['keterangan'] == 1 || $data_rekomendasi['keterangan'] == 2) ? 'disabled' : '' ?>><span class="fa fa-ban"></span></button>
											<a href="<?= ($data_rekomendasi['keterangan'] == 1) ? 'cetak_rekomendasi.php?kode=' . $data_rekomendasi['kode_rekomendasi'] . '' : '#' ?>" target="_blank">
												<button class="btn btn-sm btn-secondary btn-custom" title="print" <?= ($data_rekomendasi['keterangan'] == 1) ? '' : 'disabled' ?>><span class="fa fa-print"></span></button>
											</a>
										</td>
								<?php
									$no++;
								}
							}
								?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>