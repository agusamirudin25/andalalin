<div class="container-fluid" style="font-family: Arial, Helvetica, sans-serif;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="page-header">
                            KELOLA PERMOHONAN
                        </h3>
                        <hr>
                    </div>
                    <table id="dataTable" class="table table-bordered table-striped" style="width: 100%;">
                        <thead style="background-color: #605ca8; color: white;">
                            <tr>
                                <th>No</th>
                                <th>Nomor Registrasi</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat Perusahaan</th>
                                <th>Tanggal</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($perusahaan->tampil_perusahaan($_SESSION['nik']) != FALSE) {
                                $no = 1;
                                foreach ($perusahaan->tampil_perusahaan($_SESSION['nik']) as $data_perusahaan) {
                                    if ($data_perusahaan['status'] == 0) {
                                        $status = 'Menunggu';
                                        $badge = 'btn-warning';
                                        $fa = 'fa-dna';
                                        $disabled = 0;
                                    } else if ($data_perusahaan['status'] == 1) {
                                        $status = 'Sudah di verifikasi';
                                        $badge = 'btn-success';
                                        $fa = 'fa-check-square';
                                        $disabled = 1;
                                        if ($data_perusahaan['ket_tinjauan'] == 0) {
                                            $status = 'Menunggu proses tinjauan';
                                            $badge = 'btn-warning';
                                            $fa = 'fa-dna';
                                            $disabled = 1;
                                        } else if ($data_perusahaan['ket_tinjauan'] == 2) {
                                            $status = 'Ditolak. tidak sesuai tinjauan';
                                            $badge = 'btn-danger';
                                            $fa = 'fa-ban';
                                            $disabled = 1;
                                        } else if ($data_perusahaan['ket_tinjauan'] == 1) {
                                            $status = 'Sudah Proses Tinjauan';
                                            $badge = 'btn-success';
                                            $fa = 'fa-check-square';
                                            $disabled = 1;
                                            if ($data_perusahaan['ket_rekomendasi'] == 0) {
                                                $status = 'Menunggu Proses Rekomendasi';
                                                $badge = 'btn-warning';
                                                $fa = 'fa-dna';
                                                $disabled = 1;
                                            } else if ($data_perusahaan['ket_rekomendasi'] == 1) {
                                                $status = 'Rekomendasi diterima.';
                                                $badge = 'btn-success';
                                                $fa = 'fa-check-square';
                                                $disabled = 1;
                                            } else if ($data_perusahaan['ket_rekomendasi'] == 2) {
                                                $status = 'Rekomendasi ditolak.';
                                                $badge = 'btn-danger';
                                                $fa = 'fa-ban';
                                                $disabled = 1;
                                            }
                                        }
                                    } else {
                                        $status = '';
                                    }
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo $data_perusahaan['no_registrasi']; ?></td>
                                        <td><?php echo $data_perusahaan['nama_perusahaan']; ?></td>
                                        <td><?php echo $data_perusahaan['alamat_npwp_perusahaan']; ?></td>
                                        <td><?php echo $data_perusahaan['tanggal_daftar']; ?></td>

                                        <td class="text-center">
                                            <a href="?p=detail_permohonan&no_reg=<?= $data_perusahaan['no_registrasi'] ?>">
                                                <button class="btn btn-sm btn-primary btn-custom" title="detail"><span class="fa fa-eye"></span></button>
                                            </a>
                                            <button class="btn btn-sm <?= $badge ?> btn-custom" title="<?= $status; ?>"><span class="fa <?= $fa; ?> "></span></button>
                                            <a href="<?= ($disabled == 1) ? '#' : '?p=edit_permohonan&no_reg=' . $data_perusahaan['no_registrasi'] . '' ?>">
                                                <button class="btn btn-sm btn-info btn-custom" title="Edit Permohonan" <?= ($disabled == 1) ? 'disabled' : '' ?>><span class="fa fa-pen"></span></button>
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