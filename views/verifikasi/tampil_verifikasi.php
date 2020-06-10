<div class="container-fluid" style="font-family: Arial, Helvetica, sans-serif;">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
						<h3 class="page-header">
							VERIFIKASI PERMOHONAN
						</h3>
						<hr>
					</div>
					<table id="dataTable" class="table table-bordered table-striped" style="width: 100%;">
						<thead style="background-color: #605ca8; color: white;">
							<tr>
								<th>No</th>
								<th>Nomor Registrasi</th>
								<th>NIK</th>
								<th>Nama Pemohon</th>
								<th>Nama Perusahaan</th>
								<th>Tanggal</th>
								<th style="text-align:center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($perusahaan->tampil_perusahaan() != FALSE) {
								$no = 1;
								foreach ($perusahaan->tampil_perusahaan() as $data_perusahaan) {
							?>
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td><?php echo $data_perusahaan['no_registrasi']; ?></td>
										<td><?php echo $data_perusahaan['nik']; ?></td>
										<td><?php echo $data_perusahaan['nama']; ?></td>
										<td><?php echo $data_perusahaan['nama_perusahaan']; ?></td>
										<td><?php echo $data_perusahaan['tanggal_daftar']; ?></td>

										<td class="text-center">
											<a href="?p=detail_verifikasi&no_reg=<?= $data_perusahaan['no_registrasi'] ?>">
												<button class="btn btn-sm btn-primary btn-custom" title="detail"><span class="fa fa-eye"></span></button>
											</a>
											<button class="btn btn-sm btn-success btn-custom" onclick="verif_data('<?= $data_perusahaan['no_registrasi'] ?>')" title="verif"><span class="fa fa-check-square"></span></button>
											<button class="btn btn-sm btn-danger btn-custom" onclick="delete_verif('<?= $data_perusahaan['no_registrasi'] ?>')" title="hapus"><span class="fa fa-trash"></span></button>
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