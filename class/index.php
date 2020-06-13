<?php
define("BASEURL", "http://localhost/andalalin/");
class index
{

    function index()
    {
        $_SESSION['nip'] = isset($_SESSION['nip']) ? $_SESSION['nip'] : '';
        $_SESSION['nik'] = isset($_SESSION['nik']) ? $_SESSION['nik'] : '';

        require_once "class/koneksi.php";
        require_once "class/pengguna.php";
        require_once "class/pemohon.php";
        require_once "class/perusahaan.php";
        require_once "class/rekomendasi.php";
        require_once "class/tinjauan.php";
        require_once "class/saran.php";

        $koneksi = new koneksi();
        $pengguna = new pengguna();
        $perusahaan = new perusahaan();
        $pemohon = new pemohon();
        $rekomendasi = new Rekomendasi();
        $tinjauan = new Tinjauan();
        $saran = new saran();

        $_GET['p'] = isset($_GET['p']) ? $_GET['p'] : false;
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
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

            <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/plugins/toastr/toastr.min.css">
            <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/plugins/ekko-lightbox/ekko-lightbox.css">

            <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/fontawesome/fonts_google.css">

            <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/plugins/pace-progress/themes/yellow/pace-theme-flat-top.css">

        </head>
        <?php
        if ($_SESSION['nip'] == '' && $_SESSION['nik'] == '') {
            self::form_login();
        } elseif ($_GET['p'] == 'logout') {
            include_once "views/pengguna/logout.php";
        } else {
        ?>

            <body class="sidebar-mini layout-fixed">
                <div class="wrapper">

                    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                            </li>
                        </ul>

                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <a class="nav-link" style="margin-top: -0.2em;">
                                    <img src="http://localhost/andalalin/images/kharisma.png" alt="Stmik" class="brand-image img-circle elevation-1" style="opacity: .8; width: 25px;">
                                </a>
                                <span class="font-weight-light" style="margin-top: 0.4em; margin-left: -0.5em;">ANDALALIN</span>
                            </div>
                        </form>

                        <!-- Right navbar links -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Notifications Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    <i class="far fa-bell"></i>
                                    <span class="badge badge-warning navbar-badge">0</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <span class="dropdown-item dropdown-header">0 Notifications</span>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-file mr-2"></i> Tidak Ada Pemberitahuan
                                        <span class="float-right text-muted text-sm"></span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"> <i class="fa fa-power-off" id="logout"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>


                    <aside class="main-sidebar elevation-4 sidebar-light-fuchsia  text-sm">

                        <div class="sidebar">
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="http://localhost/andalalin/images/default.png" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <a href="#" class="d-block"><?php if ($_SESSION['nik'] != '') {
                                                                    echo $_SESSION['nama'];
                                                                } else if ($_SESSION['nip'] != '') {
                                                                    if ($_SESSION['level'] == 'admin') {
                                                                        echo strtoupper($_SESSION['jabatan']);
                                                                    } else if ($_SESSION['level'] == 'kabid') {
                                                                        echo strtoupper($_SESSION['jabatan']);
                                                                    } else if ($_SESSION['level'] == 'kadis') {
                                                                        echo strtoupper($_SESSION['jabatan']);
                                                                    }
                                                                } ?></a>
                                </div>
                            </div>

                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <li class="nav-item has-treeview">
                                        <a href="http://localhost/andalalin/index.php" class="nav-link">
                                            <i class="nav-icon fa fa-home"></i>
                                            <p>
                                                Dashboard
                                            </p>
                                        </a>
                                    </li>
                                    <!-- Menu Pemohon -->

                                    <!-- Menu Pemohon -->

                                    <!-- Menu Pengguna -->
                                    <?php if ($_SESSION['nip'] != '') :
                                        if ($_SESSION['level'] == 'admin') : ?>
                                            <li class="nav-item has-treeview">
                                                <a href="http://localhost/andalalin/index.php?p=verifikasi" class="nav-link">
                                                    <i class="nav-icon fa fa-check"></i>
                                                    <p>
                                                        Verifikasi Permohonan
                                                    </p>
                                                </a>
                                            </li>
                                        <?php endif;
                                        if ($_SESSION['level'] == 'kabid') : ?>
                                            <li class="nav-item has-treeview">
                                                <a href="http://localhost/andalalin/index.php?p=tinjauan" class="nav-link">
                                                    <i class="nav-icon fa fa-bus-alt"></i>
                                                    <p>
                                                        Tinjau Permohonan
                                                    </p>
                                                </a>
                                            </li>
                                        <?php endif;
                                        if ($_SESSION['level'] == 'kadis') : ?>
                                            <li class="nav-item has-treeview">
                                                <a href="http://localhost/andalalin/index.php?p=rekomendasi" class="nav-link">
                                                    <i class="nav-icon fa fa-balance-scale"></i>
                                                    <p>
                                                        Rekomendasi
                                                    </p>
                                                </a>
                                            </li>
                                        <?php endif;
                                    else : ?>
                                        <li class="nav-item has-treeview">
                                            <a href="http://localhost/andalalin/index.php?p=permohonan" class="nav-link">
                                                <i class="nav-icon fa fa-file-medical"></i>
                                                <p>
                                                    Buat Permohonan
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="http://localhost/andalalin/index.php?p=kelola_permohonan" class="nav-link">
                                                <i class="nav-icon fa fa-id-badge"></i>
                                                <p>
                                                    Kelola Permohonan
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="http://localhost/andalalin/index.php?p=saran" class="nav-link">
                                                <i class="nav-icon fa fa-book"></i>
                                                <p>
                                                    Saran
                                                </p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- Menu Pemohon -->
                                </ul>
                            </nav>
                        </div>
                    </aside>

                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <!-- Main content -->
                        <section class="content text-sm">
                            <?php $this->loader(); ?>
                        </section>
                    </div>

                    <footer class="main-footer text-sm">
                        <div class="float-right d-none d-sm-block">
                            <b>Version</b> 1.0
                        </div>
                        <strong>Copyright &copy; 2020 <a href="http://localhost/andalalin">ANDALALIN</a></strong>
                    </footer>
                </div>

                <!-- pace-progress -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/pace-progress/pace.min.js"></script>

                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/jquery/jquery.min.js"></script>
                <!-- Bootstrap 4 -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Toastr -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/toastr/toastr.min.js"></script>

                <!-- AdminLTE App -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/dist/js/adminlte.min.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/dist/js/demo.js"></script>

                <!-- SweetAlert2 -->
                <link rel="stylesheet" href="http://localhost/andalalin/assets/admin-lte-new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

                <!-- DataTables -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/datatables/jquery.dataTables.js"></script>
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

                <!-- Ekko Lightbox -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
                <!-- Ion Slider -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
                <!-- Bootstrap slider -->
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
                <script src="http://localhost/andalalin/assets/admin-lte-new/plugins/sweetalert2/sweetalert2.min.js"></script>
                <script>
                    function success_alert(title, msg) {
                        Swal.fire({
                            icon: 'success',
                            title: title,
                            text: msg,
                            timer: 1500,
                            footer: 'ANDALALIN',
                            showCancelButton: false,
                            showConfirmButton: false
                        })

                    }

                    function error_alert(title, msg) {
                        Swal.fire({
                            icon: 'error',
                            title: title,
                            text: msg,
                            footer: 'ANDALALIN',
                        })
                    }
                </script>
                <script>
                    function swalDefaultSuccess(msg) {
                        toastr.success(msg);
                    };

                    function swalDefaultInfo(msg) {
                        toastr.info(msg);
                    };

                    function swalDefaultError(msg) {
                        toastr.error(msg);
                    };

                    function swalDefaultWarning(msg) {
                        toastr.warning(msg);
                    };

                    function swalDefaultQuestion(msg) {
                        toastr.queueuestion(msg);
                    };
                </script>
                <script>
                    $(function() {
                        $('#dataTable').DataTable({
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                            "autoWidth": true,
                            'scrollY': 400,
                            'scrollX': true,
                        });
                        $("#logout").click(function() {
                            Swal.fire({
                                type: 'success',
                                title: "Berhasil",
                                text: "Keluar",
                                timer: 1500,
                                footer: 'ANDALALIN',
                                showCancelButton: false,
                                showConfirmButton: false
                            }).then(function() {
                                window.location = "http://localhost/andalalin/index.php?p=logout";
                            })
                        });
                    });
                </script>
                <script>
                    function verif_data(id) {
                        var string = "no_reg=" + id + "&proses=update";
                        $.ajax({
                            type: 'POST',
                            url: "views/verifikasi/verifikasi_permohonan.php",
                            data: string,
                            cache: false,
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        type: 'success',
                                        title: "Berhasil",
                                        text: "Verifikasi Permohonan",
                                        timer: 1500,
                                        footer: 'ANDALALIN',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then(function() {
                                        window.location = "http://localhost/andalalin/index.php?p=verifikasi";
                                    })
                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: "Gagal",
                                        text: "Verifikasi Permohonan",
                                        timer: 1500,
                                        footer: 'ANDALALIN',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then(function() {
                                        window.location = "http://localhost/andalalin/index.php?p=verifikasi";
                                    })
                                }
                            }
                        })
                    }

                    function delete_verif(id) {
                        Swal.fire({
                            title: 'Verifikasi Permohonan',
                            text: "Apakah anda yakin ingin menghapus no registrasi " + id + " ?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya'
                        }).then((result) => {
                            if (result.value) {
                                var string = "no_reg=" + id + "&proses=delete";
                                $.ajax({
                                    type: 'POST',
                                    url: "views/verifikasi/verifikasi_permohonan.php",
                                    data: string,
                                    cache: false,
                                    success: function(data) {
                                        if (data == 1) {
                                            Swal.fire({
                                                type: 'success',
                                                title: "Berhasil",
                                                text: "Verifikasi Permohonan dihapus",
                                                timer: 1500,
                                                footer: 'ANDALALIN',
                                                showCancelButton: false,
                                                showConfirmButton: false
                                            }).then(function() {
                                                window.location = "http://localhost/andalalin/index.php?p=verifikasi";
                                            })
                                        }
                                    }
                                })
                            }
                        })
                    }

                    // fungsi tinjauan
                    function verif_tinjauan(id, msg, nip) {
                        var string = "kode_tinjauan=" + id + "&msg=" + msg + "&nip=" + nip;
                        $.ajax({
                            type: 'POST',
                            url: "views/tinjauan/verifikasi_tinjauan.php",
                            data: string,
                            cache: false,
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        type: 'success',
                                        title: "Berhasil",
                                        text: "Tinjauan Permohonan",
                                        timer: 1500,
                                        footer: 'ANDALALIN',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then(function() {
                                        window.location = "http://localhost/andalalin/index.php?p=tinjauan";
                                    })
                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: "Gagal",
                                        text: "Tinjauan Permohonan",
                                        timer: 1500,
                                        footer: 'ANDALALIN',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then(function() {
                                        window.location = "http://localhost/andalalin/index.php?p=tinjauan";
                                    })
                                }
                            }
                        })
                    }

                    // fungsi verif rekomendasi
                    function verif_rekomendasi(id, msg, nip) {
                        var string = "kode_rekomendasi=" + id + "&msg=" + msg + "&nip=" + nip;
                        $.ajax({
                            type: 'POST',
                            url: "views/rekomendasi/verifikasi_rekomendasi.php",
                            data: string,
                            cache: false,
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        type: 'success',
                                        title: "Berhasil",
                                        text: "Rekomendasi Permohonan",
                                        timer: 1500,
                                        footer: 'ANDALALIN',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then(function() {
                                        window.location = "http://localhost/andalalin/index.php?p=rekomendasi";
                                    })
                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: "Gagal",
                                        text: "Rekomendasi Permohonan",
                                        timer: 1500,
                                        footer: 'ANDALALIN',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then(function() {
                                        window.location = "http://localhost/andalalin/index.php?p=rekomendasi";
                                    })
                                }
                            }
                        })
                    }
                </script>
            </body>

        </html>
        <!-- copy -->

<?php
        }
    }

    function loader()
    {
        $koneksi = new koneksi();
        $pengguna = new pengguna();
        $perusahaan = new perusahaan();
        $pemohon = new pemohon();
        $rekomendasi = new Rekomendasi();
        $tinjauan = new Tinjauan();
        $saran = new saran();

        if (isset($_GET['p'])) {
            if ($_GET['p'] == 'verifikasi') {
                include "views/verifikasi/tampil_verifikasi.php";
            } else if ($_GET['p'] == 'detail_verifikasi') {
                include_once "views/verifikasi/detail_verifikasi.php";
            }

            /*permohonan*/ else if ($_GET['p'] == 'permohonan') {
                include_once "views/perusahaan/tambah_perusahaan.php";
            } else if ($_GET['p'] == 'kelola_permohonan') {
                include_once "views/perusahaan/kelola_perusahaan.php";
            } else if ($_GET['p'] == 'detail_permohonan') {
                include_once "views/perusahaan/detail_perusahaan.php";
            } else if ($_GET['p'] == 'edit_permohonan') {
                include_once "views/perusahaan/edit_perusahaan.php";
            }

            /*saran*/ else if ($_GET['p'] == 'saran') {
                include_once "views/saran/buat_saran.php";
            }

            /*tinjauan*/ else if ($_GET['p'] == 'tinjauan') {
                include_once "views/tinjauan/tampil_tinjauan.php";
            }

            /*rekomendasi*/ else if ($_GET['p'] == 'rekomendasi') {
                include_once "views/rekomendasi/tampil_rekomendasi.php";
            }

            /*Laporan*/ else if ($_GET['p'] == 'laporan') {
                include_once "views/laporan/lihat_laporan.php";
            } else {
                self::dashboard();
            }
        }
    }
    public function form_login()
    {
        require_once 'views/dashboard/login/index.php';
    }

    public function dashboard()
    {
        include "views/dashboard/dashboard.php";
    }
}
