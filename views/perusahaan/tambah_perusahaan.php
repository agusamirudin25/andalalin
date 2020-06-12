<?php

if (isset($_POST['simpan'])) {
    var_dump($_POST);
    die;
}
?>

<div class="row text-sm">
    <div class="col-lg-12">
        <div class="card card-primary card-outline text-sm">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-users"></i>
                    &nbsp; DATA PEMOHON
                </h3>

                <div class="card-tools">
                    <a href="#"><i id="ind-col-1" class="fas fa-circle"></i></a>
                    <a href="#"><i id="ind-col-2" class="far fa-circle"></i></a>
                    <a href="#"><i id="ind-col-5" class="far fa-circle"></i></a>
                </div>
            </div>

            <div class="card-body pad table-responsive" style="overflow-x: hidden;">

                <div class="row" id="col_a">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div class="tab-pane text-left fade show active" id="page1" role="tabpanel">
                                <div class="wow slideInLeft" id="col_1" data-wow-duration="500ms">

                                    <div class="card card-warning card-outline text-sm">
                                        <div class="card-body">
                                            <form role="form" class="text-sm" action="" method="post">

                                                <div class="col-sm-12" style="margin-top: -1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group  input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="No. Registrasi, NIB" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-info-circle"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input_cap form_input text-sm" id="no_reg" value="" name="no_reg" style="margin-top: 8px;" placeholder="no registrasi" disabled>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-info-circle"></i></button>
                                                                </div>
                                                                <input type="number" class="form-control form_input_cap form_input text-sm" id="no_nib" name="no_nib" style="margin-top: 8px;" placeholder="NIB" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Nama Perusahaan, NIK" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input form_input_cap text-sm" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="number" class="form-control  form_input text-sm" id="nik" name="nik" style="margin-top: 8px;" value="<?= $_SESSION['nik'] ?>" placeholder="nomor induk kependudukan" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Nama Perusahaan, No Akte" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input form_input_cap text-sm" id="nama_perushaan" name="nama_perushaan" placeholder="Nama Perusahaan" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="number" class="form-control  form_input text-sm" id="no_akte" name="no_akte" style="margin-top: 8px;" placeholder="no akte" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Tanggal, bukti akte" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="date" class="form-control form_input form_input_cap text-sm" id="tanggal_akte" name="tanggal_akte" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="file" class="form-control form_input form_input_cap text-sm" id="akte_perusahaan" name="akte_perusahaan" style="margin-top: 8px;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Nomor, NPWP Perusahaan" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="number" class="form-control form_input form_input_cap text-sm" id="no_npwp_perusahaan" name="no_npwp_perusahaan" placeholder="no npwp" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="file" class="form-control form_input form_input_cap text-sm" id="npwp_perusahaan" name="npwp_perusahaan" style="margin-top: 8px;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Nama, Lokasi Pembangunan" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input form_input_cap text-sm" id="nama_npwp_perusahaan" name="nama_npwp_perusahaan" placeholder="Nama NPWP Perusahaan" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input form_input_cap text-sm" id="alamat_npwp_perusahaan" name="alamat_npwp_perusahaan" placeholder="Alamat NPWP Perusahaan" style="margin-top: 8px;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Luas Lahan, Surat BPN" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input form_input_cap text-sm" id="luas_lahan_bpn" name="luas_lahan_bpn" placeholder="Luas Lahan BPN" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="file" class="form-control form_input form_input_cap text-sm" id="surat_bpn" name="surat_bpn" style="margin-top: 8px;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="No, Tanggal Alih fungsi" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="number" class="form-control form_input form_input_cap text-sm" id="no_alih_fungsi" name="no_alih_fungsi" placeholder="No Alih Fungsi" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="date" class="form-control form_input form_input_cap text-sm" id="tanggal_alih_fungsi" name="tanggal_alih_fungsi" style="margin-top: 8px;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Perihal alih fungsi, No izin lokasi" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input form_input_cap text-sm" id="perihal_alih_fungsi" name="perihal_alih_fungsi" placeholder="Perihal Alih Fungsi" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input form_input_cap text-sm" id="no_izin_lokasi" name="no_izin_lokasi" placeholder="No izin lokasi" style="margin-top: 8px;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Tanggal izin lokasi, Kriteria Pembangunan" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="date" class="form-control form_input form_input_cap text-sm" id="tanggal_izin_lokasi" name="tanggal_izin_lokasi" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="file" class="form-control form_input form_input_cap text-sm" id="kriteria_pembangunan" name="kriteria_pembangunan" style="margin-top: 8px;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Jumlah Pembangunan, Ruang Terbangun" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="number" class="form-control form_input form_input_cap text-sm" id="jumlah_pembangunan" name="jumlah_pembangunan" placeholder="Jumlah Pembangunan" style="margin-top: 8px;" required>
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                                                </div>
                                                                <input type="number" class="form-control form_input form_input_cap text-sm" id="jumlah_ruang_terbangun" name="jumlah_ruang_terbangun" placeholder="Jumlah Ruang Terbangun" style="margin-top: 8px;" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <hr />
                                                    <div class="form-group">
                                                        <div class="input-group ">
                                                            <div class="input-group col-sm-8"> </div>
                                                            <div class="input-group col-sm-2">
                                                                <a id="back_home" href="?p=dashboard" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false" type="button" class="btn btn-warning btn-block" style="margin-top: 8px;">Kembali</a>
                                                            </div>
                                                            <div class="input-group col-sm-2">
                                                                <button class=" btn btn-primary btn-block" name="simpan" type=" submit" style="margin-top: 8px;">Simpan</span></button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>