<script src="http://localhost/andalalin/assets/admin-lte-new/plugins/jquery/jquery.min.js"></script>
<script src="http://localhost/andalalin/assets/admin-lte-new/plugins/sweetalert2/sweetalert2.min.js"></script>
<div class="row text-sm">
    <div class="col-lg-12">
        <div class="card card-primary card-outline text-sm">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-users"></i>
                    &nbsp; BUAT SARAN
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
                                                                <input type="text" class="form-control" value="Nama Lengkap" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-info-circle"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control form_input_cap form_input text-sm" id="nama" value="<?= $_SESSION['nama'] ?>" name="nama" style="margin-top: 8px;" placeholder="Nama Lengkap" readonly>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Email" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-4">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <input type="email" class="form-control form_input form_input_cap text-sm" id="email" name="email" placeholder="masukkan email" style="margin-top: 8px;" required autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12" style="margin-top: 1em;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group input-group-sm col-sm-3">
                                                                <input type="text" class="form-control" value="Komentar" disabled="" style="margin-top: 8px; border: none; background: transparent;">
                                                            </div>
                                                            <div class="input-group col-sm-6">
                                                                <div class="input-group-append" style="margin-top: 8px;">
                                                                    <button type="button" class="btn btn-primary"><i class="fa fa-user" style="padding: 2.3px;"></i></button>
                                                                </div>
                                                                <textarea name="komentar" id="komentar" cols="20" rows="5" class="form-control form_input form_input_cap text-sm" style="margin-top: 8px;"></textarea>

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
                                                                <button class=" btn btn-primary btn-block" name="simpan" type=" submit" style="margin-top: 8px;">Kirim</span></button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                            if (isset($_POST['simpan'])) {
                                $nama = $_POST['nama'];
                                $email = $_POST['email'];
                                $komentar = $_POST['komentar'];
                                if ($saran->lihat($nama, $email, $komentar) > 0) {
                                    echo "<script>
        Swal.fire({
            type: 'success',
            title: 'Berhasil',
            text: 'Menambah Saran',
            timer: 1500,
            footer: 'ANDALALIN',
            showCancelButton: false,
            showConfirmButton: false
        }).then(function() {
            window.location = 'http://localhost/andalalin/index.php';
        })
        </script>";
                                } else {
                                    echo "<script>
        Swal.fire({
            type: 'Error',
            title: 'Gagal',
            text: 'Menambah Saran',
            timer: 1500,
            footer: 'ANDALALIN',
            showCancelButton: false,
            showConfirmButton: false
        }).then(function() {
            window.location = 'http://localhost/andalalin/index.php';
        })
        </script>";
                                }
                            }
                            ?>