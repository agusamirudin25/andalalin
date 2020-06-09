<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA PENJUALAN
					</h3>
					<hr>
				</div>
				<table id="dataTable" class="table table-bordered table-striped">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>No Faktur</th>
							<th>No Po</th>
							<th>Kode Customer</th>
							<th>Tanggal Bayar</th>
							<th>Total</th>
							<th>Bukti</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						if ($penjualan->data_penjualan() != FALSE) {
							$no = 1;
							foreach ($penjualan->data_penjualan() as $data_penjualan) {
						?>

								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_penjualan['no_faktur']; ?></td>
									<td><?php echo $data_penjualan['no_po']; ?></td>
									<td><?php echo $data_penjualan['kode_customer']; ?></td>
									<td><?php echo date('d-m-Y', strtotime($data_penjualan['tgl'])); ?></td>
									<td><?php echo "Rp. " . number_format($data_penjualan['total']); ?></td>
									<td>
										<img width="100px;" class="img" id="img<?= $no; ?>" src="<?php echo $data_penjualan['img']; ?>" onclick="see(this.id);">
									</td>
									<td>
										<a href="?p=detail_penjualan&no_faktur=<?php echo $data_penjualan['no_faktur']; ?>">
											<button class="btn btn-sm btn-primary">
												<span class="fa fa-eye"></span>
											</button>
										</a>
										<a href="?p=hapus_penjualan&no_faktur=<?php echo $data_penjualan['no_faktur']; ?>">
											<button class="btn btn-sm btn-danger" onClick="return confirm('Yakin Akan Menghapus Data?');">
												<span class="fa fa-trash"></span>
											</button>
										</a>
									</td>

							<?php
								$no++;
							}
						}
							?>
					</tbody>
				</table>
				<div id="myModal" class="modal">

					<!-- The Close Button -->
					<span class="close">&times;</span>

					<!-- Modal Content (The Image) -->
					<img class="modal-content" id="img01">

					<!-- Modal Caption (Image Text) -->
					<div id="caption"></div>
				</div>
				<script>
					function see(id) {

						var modal = document.getElementById("myModal");
						// Get the image and insert it inside the modal - use its "alt" text as a caption
						var img = document.getElementById(id);
						var modalImg = document.getElementById("img01");
						var captionText = document.getElementById("caption");

						modal.style.display = "block";
						modalImg.src = img.src;
						captionText.innerHTML = img.alt;


						// Get the <span> element that closes the modal
						var span = document.getElementsByClassName("close")[0];

						// When the user clicks on <span> (x), close the modal
						span.onclick = function() {
							modal.style.display = "none";
						}
					}
				</script>
				<style>
					.img {
						border-radius: 5px;
						cursor: pointer;
						transition: 0.3s;
					}

					.img:hover {
						opacity: 0.7;
					}

					/* The Modal (background) */
					.modal {
						display: none;
						/* Hidden by default */
						position: fixed;
						/* Stay in place */
						z-index: 1;
						/* Sit on top */
						padding-top: 100px;
						/* Location of the box */
						left: 0;
						top: 0;
						width: 100%;
						/* Full width */
						height: 100%;
						/* Full height */
						overflow: auto;
						/* Enable scroll if needed */
						background-color: rgb(0, 0, 0);
						/* Fallback color */
						background-color: rgba(0, 0, 0, 0.9);
						/* Black w/ opacity */
					}

					/* Modal Content (Image) */
					.modal-content {
						margin: auto;
						display: block;
						width: 80%;
						max-width: 700px;
					}

					/* Caption of Modal Image (Image Text) - Same Width as the Image */
					#caption {
						margin: auto;
						display: block;
						width: 80%;
						max-width: 700px;
						text-align: center;
						color: #ccc;
						padding: 10px 0;
						height: 150px;
					}

					/* Add Animation - Zoom in the Modal */
					.modal-content,
					#caption {
						animation-name: zoom;
						animation-duration: 0.6s;
					}

					@keyframes zoom {
						from {
							transform: scale(0)
						}

						to {
							transform: scale(1)
						}
					}

					/* The Close Button */
					.close {
						position: absolute;
						top: 15px;
						right: 35px;
						color: #f1f1f1;
						font-size: 40px;
						font-weight: bold;
						transition: 0.3s;
					}

					.close:hover,
					.close:focus {
						color: #bbb;
						text-decoration: none;
						cursor: pointer;
					}

					/* 100% Image Width on Smaller Screens */
					@media only screen and (max-width: 700px) {
						.modal-content {
							width: 100%;
						}
					}
				</style>
			</div>
		</div>
	</div>
</div>