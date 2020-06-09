<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA CUSTOMER
					</h3>
					<hr>
				</div>
				<p><a href="?p=tambah_customer"><button class="btn btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Customer</button></a></p><br>
				<table id="dataTable" class="table table-bordered table-striped">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>Kode Customer</th>
							<th>Nama Customer</th>
							<th>No Telepon</th>
							<th>Alamat</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($customer->tampil_customer() != FALSE) {
							$no = 1;
							foreach ($customer->tampil_customer() as $data_customer) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_customer['kode_customer']; ?></td>
									<td><?php echo $data_customer['nama_customer']; ?></td>
									<td><?php echo $data_customer['no_tlp']; ?></td>
									<td><?php echo $data_customer['alamat']; ?></td>

									<td style="text-align:center">
										<a href="?p=edit_customer&kode_customer=<?php echo $data_customer['kode_customer']; ?>"><button class="btn btn-sm btn-primary btn-custom"><span class="fa fa-edit"></span></button></a>
										<a href="?p=hapus_customer&kode_customer=<?php echo $data_customer['kode_customer']; ?>"><button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');"><span class="fa fa-trash"></span></button></a></td>
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