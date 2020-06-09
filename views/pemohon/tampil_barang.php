<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA BARANG
					</h3>
					<hr>
				</div>
				<p><a href="?p=tambah_barang"><button class="btn btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Barang</button></a></p><br>
				<table id="dataTable" class="table table-bordered table-striped">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Part Number</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Satuan</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($barang->tampil_barang() != FALSE) {
							$no = 1;
							foreach ($barang->tampil_barang() as $data_barang) {
								?>

								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_barang['kode_barang']; ?></td>
									<td><?php echo $data_barang['part_no']; ?></td>
									<td><?php echo $data_barang['nama_barang']; ?></td>
									<td><?php echo "Rp. " . number_format($data_barang['harga']) . "" ?></td>
									<td><?php echo $data_barang['satuan']; ?></td>

									<td style="text-align:center">
										<a href="?p=edit_barang&kode_barang=<?php echo $data_barang['kode_barang']; ?>"><button class="btn btn-sm btn-primary btn-custom"><span class="fa fa-edit"></span></button></a>
										<a href="?p=hapus_barang&kode_barang=<?php echo $data_barang['kode_barang']; ?>"><button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');"><span class="fa fa-trash"></span></button></a></td>
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