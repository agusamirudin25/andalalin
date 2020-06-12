<div class="container-fluid" style="font-family: Arial, Helvetica, sans-serif;">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
						<h3 class="page-header">
							DATA TINJAUAN
						</h3>
						<hr>
					</div>
					<table id="dataTable" class="table table-bordered table-striped" style="width: 100%;">
						<thead style="background-color: #605ca8; color: white;">
							<tr>
								<th>No</th>
								<th>Kode Tinjauan</th>
								<th>No Registrasi</th>
								<th>Nama Pemohon</th>
								<th>Nama Perusahaan</th>
								<th>Keterangan</th>
								<th>Tanggal</th>
								<th style="text-align:center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($tinjauan->lihat_data() != FALSE) {
								$no = 1;
								foreach ($tinjauan->lihat_data() as $data_tinjauan) {
							?>
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td><?php echo $data_tinjauan['kode_tinjauan']; ?></td>
										<td><?php echo $data_tinjauan['no_registrasi']; ?></td>
										<td><?php echo $data_tinjauan['nama']; ?></td>
										<td><?php echo $data_tinjauan['nama_perusahaan']; ?></td>
										<td class="text-center"><span class="<?= ($data_tinjauan['keterangan'] == 0) ? 'bg-warning' : 'bg-success' ?> <?= ($data_tinjauan['keterangan'] == 2) ? 'bg-danger' : '' ?>" style="border-radius: 4px;background-color: #fff; display: inline-block; font-weight: 600;padding: 3px;">
												<?php if ($data_tinjauan['keterangan'] == 0) {
													echo 'MENUNNGU';
												} elseif ($data_tinjauan['keterangan'] == 1) {
													echo 'SESUAI';
												} else {
													echo 'TIDAK SESUAI';
												} ?>
											</span></td>
										<td><?php echo date('d/m/Y', strtotime($data_tinjauan['tanggal'])) ?></td>

										<td class="text-center">
											<button class="btn btn-sm btn-primary btn-custom" onclick="verif_tinjauan('<?= $data_tinjauan['kode_tinjauan'] ?>', 1, <?= $_SESSION['nip'] ?>)" title="sesuai" <?= ($data_tinjauan['keterangan'] == 1 || $data_tinjauan['keterangan'] == 2) ? 'disabled' : '' ?>><span class="fa fa-check"></span></button>
											<button class="btn btn-sm btn-danger btn-custom" onclick="verif_tinjauan('<?= $data_tinjauan['kode_tinjauan'] ?>', 2, <?= $_SESSION['nip'] ?>)" title="tidak sesuai" <?= ($data_tinjauan['keterangan'] == 1 || $data_tinjauan['keterangan'] == 2) ? 'disabled' : '' ?>><span class="fa fa-ban"></span></button>
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