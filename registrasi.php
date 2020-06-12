<?php
require_once "class/pemohon.php";
$pemohon = new Pemohon();

if (isset($_POST['register'])) {
    $pemohon->simpan($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Andalalin">
    <meta name="description" content="Jl. Karawang">
    <meta name="keywords" content="dishub">
    <meta name="author" content="stmik kharisma">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/andalalin/images/kharisma.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ANDALALIN</title>

    <link rel="stylesheet" type="text/css" href="http://localhost/andalalin/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/andalalin/assets/login/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/andalalin/assets/login/css/second.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/dist/css/adminlte.min.css">

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 col-md-7">
                <div class="login100-form validate-form form-horizontal" id="body_form">

                    <span class="login100-form-title p-b-48">
                        <div class="box-body box-profile">
                            Registrasi Pemohon
                        </div>
                    </span>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="wrap-input100 validate-npm" data-validate="Check NPM">
                                            <input class="input100" type="text" name="nik" id="nik" autocomplete="off" required>
                                            <span class="focus-input100" id="focus-npm" data-placeholder="*Nomor Induk Kependudukan"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="wrap-input100 validate-npm" data-validate="Check NPM">
                                            <input class="input100" type="password" name="katasandi" id="katasandi" autocomplete="off" required>
                                            <span class="focus-input100" id="focus-npm" data-placeholder="*Katasandi"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="wrap-input100 validate-first-name" data-validate="Field Required">
                                            <input class="input100" type="text" name="nama" id="nama" autocomplete="off" required>
                                            <span class="focus-input100" data-placeholder="*Nama"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="wrap-input100 validate-middle-name" data-validate="Field Required">
                                            <input class="input100" type="text" name="tempat_lahir" id="tempat_lahir" autocomplete="off" required>
                                            <span class="focus-input100" data-placeholder="*Tempat, Tanggal Lahir"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="wrap-input100 validate-last-name" data-validate="Field Required">
                                            <input class="input100" type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" required>
                                            <span class="focus-input100" data-placeholder=""></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="jk" checked value="L"> Laki - laki</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="jk" value="P"> Perempuan</label>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="wrap-input100 validate-middle-name" data-validate="Field Required">
                                        <input class="input100" type="text" name="alamat" id="alamat" autocomplete="off" required>
                                        <span class="focus-input100" data-placeholder="*Alamat"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Agama :</label>
                                    <select class="form-control" id="agama" name="agama" required>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="wrap-input100 validate-middle-name" data-validate="Field Required">
                                        <input class="input100" type="text" name="no_npwp" id="no_npwp" autocomplete="off" required>
                                        <span class="focus-input100" data-placeholder="*No NPWP"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-input100 validate-file" data-validate="Check File">
                                        <label for="ktp"><i class="fa fa-cloud-upload" aria-hidden="true"></i> &nbsp;Upload KTP </label>
                                        <input type="file" name="ktp" id="ktp" class="inputfile" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-input100 validate-file" data-validate="Check File">
                                        <label for="npwp"><i class="fa fa-cloud-upload" aria-hidden="true"></i> &nbsp;Upload NPWP </label>
                                        <input type="file" name="npwp" id="npwp" class="inputfile" accept="image/*" required>
                                    </div>
                                </div>

                            </div>
                            <h2 id='result'></h2>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="container-login200-form-btn">
                                        <div class="wrap-login200-form-btn">
                                            <div class="login200-form-bgbtn"></div>
                                            <button class="login200-form-btn" id="register" name="register" type="submit">
                                                Daftar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="col-md-4"></div>
                        </div>
                    </div>

                    <div class="container-login300-form-btn" style="margin-top: 2em; ">
                        <div class="wrap-login300-form-btn">
                            <div class="login300-form-bgbtn" style="width: 100%;">

                                <div style="text-decoration: none; text-align: center;">
                                    <a href="http://localhost/andalalin/index.php" style="text-decoration: none;">
                                        <i class="fa fa-user-circle-o"></i> &nbsp; Login
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="container-login300-form-btn">
                        <div class="container-login300-form-btn" style="text-align: center;">
                            <div class="text-center p-t-115" style="margin-top: -7.5em;">
                                <hr style="border-top: 1px solid #8c8b8b; margin-bottom: 0.5em;" />
                                <span class="txt1" style="font-size: 16px;">
                                    ANDALALIN - STMIK KHARISMA</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- pace-progress -->
    <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/pace-progress/pace.min.js"></script>

    <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="http://localhost/andalalin/assets/admin-lte-new/dist/js/adminlte.min.js"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Bootstrap slider -->
    <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
    <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="http://localhost/andalalin/assets/login/js/main.js"></script>
    <script>

    </script>
</body>

</html>