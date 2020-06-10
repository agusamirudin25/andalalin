<?php

$no_reg = $_GET['no_reg'];
$data = $perusahaan->detail_perusahaan($no_reg);


if (isset($_POST['simpan'])) {
  $nama_customer = trim(ucwords($_POST['nama_customer']));
  $no_tlp = trim(ucwords($_POST['no_tlp']));
  $alamat = trim(ucwords($_POST['alamat']));

  $error = array();
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }

  if (count($error) == 0) //jika tidak ada error
  {
    $customer->edit_customer($kode_customer, $nama_customer, $no_tlp, $alamat); //edit data
    $customer->detail_customer($kode_customer);
  }
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
          <a href="#"><i id="ind-col-3" class="far fa-circle"></i></a>
          <a href="#"><i id="ind-col-4" class="far fa-circle"></i></a>
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
                      <form role="form" id="string_1" class="text-sm">

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
                                <input type="text" class="form-control form_input_cap form_input text-sm" id="input_address" value="<?php echo $data['no_registrasi']; ?>" name="input_address" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-info-circle"></i></button>
                                </div>
                                <input type="text" class="form-control form_input_cap form_input text-sm" id="input_address" value="<?php echo $data['no_nib']; ?>" name="input_address" style="margin-top: 8px;">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12" style="margin-top: 1em;">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group input-group-sm col-sm-3">
                                <input type="text" class="form-control" value="Nama Lengkap, NIK" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                </div>
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['nama']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <input type="text" class="form-control  form_input text-sm" id="input_card_num" name="input_card_num" value="<?php echo $data['nik']; ?>" style="margin-top: 8px;" />
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
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['nama_perusahaan']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <input type="text" class="form-control  form_input text-sm" id="input_card_num" name="input_card_num" value="<?php echo $data['no_akte']; ?>" style="margin-top: 8px;" />
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
                                <input type="date" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['tanggal_akte']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <a href="berkas/<?php echo $data['akte_perusahaan']; ?>" style="margin-top: 14px; margin-left: 5px;"><?php echo $data['akte_perusahaan']; ?></a>
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
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['no_npwp_perusahaan']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <a href="berkas/<?php echo $data['npwp_perusahaan']; ?>" style="margin-top: 14px; margin-left: 5px;"><?php echo $data['npwp_perusahaan']; ?></a>
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
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['nama_pembangunan_bpn']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['nama_lokasi_bpn']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
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
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['luas_lahan_bpn']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <a href="berkas/<?php echo $data['surat_bpn']; ?>" style="margin-top: 14px; margin-left: 5px;"><?php echo $data['surat_bpn']; ?></a>
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
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['no_alih_fungsi']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <input type="date" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['tanggal_alih_fungsi']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
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
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['perihal_alih_fungsi']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['no_izin_lokasi']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
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
                                <input type="date" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['tanggal_izin_lokasi']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <a href="berkas/<?php echo $data['kriteria_pembangunan']; ?>" style="margin-top: 14px; margin-left: 5px;"><?php echo $data['kriteria_pembangunan']; ?></a>
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
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['jumlah_pembangunan']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i></button>
                                </div>
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?php echo $data['jumlah_ruang_terbangun']; ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12" style="margin-top: 1em;">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group input-group-sm col-sm-3">
                                <input type="text" class="form-control" value="Status" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                              </div>
                              <div class="input-group col-sm-4">
                                <div class="input-group-append" style="margin-top: 8px;">
                                  <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                </div>
                                <input type="text" class="form-control form_input form_input_cap text-sm" id="input_first_name" name="input_first_name" value="<?= ($data['status'] == 0) ? 'BELUM VERIFIKASI' : 'SUDAH VERIFIKASI' ?>" placeholder="Nama Depan" style="margin-top: 8px;">
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-sm-12">
                          <hr />
                          <div class="form-group">
                            <div class="input-group ">
                              <div class="input-group col-sm-10"> </div>
                              <div class="input-group col-sm-2">
                                <a id="back_home" href="?p=verifikasi" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false" type="button" class="btn btn-success btn-block" style="margin-top: 8px;">Back</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>