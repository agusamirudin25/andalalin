<?php
define("BASEURL", "http://localhost/andalalin/");
class index
{

    function index()
    {
        $_SESSION['nip'] = isset($_SESSION['nip']) ? $_SESSION['nip'] : '';

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
        $rekomendasi = new rekomendasi();
        $tinjauan = new tinjauan();
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
        if ($_SESSION['nip'] == '') {
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
                                <a href="http://localhost/andalalin/index.php?p=logout" class="nav-link">
                                    <i class="fa fa-power-off" id="logout"></i>
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
                                    <a href="#" class="d-block">Administrator</a>
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
                                    <li class="nav-item has-treeview">
                                        <a href="http://localhost/andalalin/index.php?p=verifikasi" class="nav-link">
                                            <i class="nav-icon fa fa-check"></i>
                                            <p>
                                                Verifikasi Permohonan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item has-treeview">
                                        <a href="http://localhost/andalalin/index.php?p=verifikasi" class="nav-link">
                                            <i class="nav-icon fa fa-bus-alt"></i>
                                            <p>
                                                Tinjau Permohonan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item has-treeview">
                                        <a href="http://localhost/andalalin/index.php?p=verifikasi" class="nav-link">
                                            <i class="nav-icon fa fa-balance-scale"></i>
                                            <p>
                                                Rekomendasi
                                            </p>
                                        </a>
                                    </li>
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
        $rekomendasi = new rekomendasi();
        $tinjauan = new tinjauan();
        $saran = new saran();

        if (isset($_GET['p'])) {
            if ($_GET['p'] == 'verifikasi') {
                /*User*/
                include "views/verifikasi/tampil_verifikasi.php";
            } else if ($_GET['p'] == 'detail_verifikasi') {
                include_once "views/verifikasi/detail_verifikasi.php";
            } else if ($_GET['p'] == 'edit_verifikasi') {
                include_once "views/verifikasi/edit_verifikasi.php";
            }
            /*Customer*/ else if ($_GET['p'] == 'customer') {
                include_once "views/customer/tampil_customer.php";
            } else if ($_GET['p'] == 'tambah_customer') {
                include_once "views/customer/tambah_customer.php";
            } else if ($_GET['p'] == 'hapus_customer') {
                include_once "views/customer/hapus_customer.php";
            } else if ($_GET['p'] == 'edit_customer') {
                include_once "views/customer/edit_customer.php";
            }
            /*Keranjang*/ else if ($_GET['p'] == 'keranjang') {
                include_once "views/keranjang/tampil_keranjang.php";
            } else if ($_GET['p'] == 'hapus_keranjang') {
                include_once "views/keranjang/hapus_keranjang.php";
            } else if ($_GET['p'] == 'tambah_keranjang') {
                include_once "views/keranjang/tambah_keranjang.php";
            }
            /*Barang*/ else if ($_GET['p'] == 'barang') {
                include_once "views/barang/tampil_barang.php";
            } else if ($_GET['p'] == 'tambah_barang') {
                include_once "views/barang/tambah_barang.php";
            } else if ($_GET['p'] == 'edit_barang') {
                include_once "views/barang/edit_barang.php";
            } else if ($_GET['p'] == 'hapus_barang') {
                include_once "views/barang/hapus_barang.php";
            }
            /*Surat jalan*/ else if ($_GET['p'] == 'surat_jalan') {
                include_once "views/surat_jalan/tampil_surat_jalan.php";
            } else if ($_GET['p'] == 'tambah_surat_jalan') {
                include_once "views/surat_jalan/tambah_surat_jalan.php";
            } else if ($_GET['p'] == 'hapus_surat_jalan') {
                include_once "views/surat_jalan/hapus_surat_jalan.php";
            } else if ($_GET['p'] == 'data_surat_jalan') {
                include_once "views/surat_jalan/data_surat_jalan.php";
            } else if ($_GET['p'] == 'detail_surat_jalan') {
                include_once "views/surat_jalan/detail_surat_jalan.php";
            }
            /*Order*/ else if ($_GET['p'] == 'po') {
                include_once "views/po/tampil_po.php";
            } else if ($_GET['p'] == 'tambah_po') {
                include_once "views/po/tambah_po.php";
            } else if ($_GET['p'] == 'detail_po') {
                include_once "views/po/detail_po.php";
            } else if ($_GET['p'] == 'hapus_po') {
                include_once "views/po/hapus_po.php";
            } else if ($_GET['p'] == 'proses_transaksi') {
                include_once "views/po/proses_transaksi.php";
            }
            /*Penjualan*/ else if ($_GET['p'] == 'data_penjualan') {
                include_once "views/penjualan/data_penjualan.php";
            } else if ($_GET['p'] == 'tambah_penjualan') { //dn
                include_once "views/penjualan/tambah_penjualan.php";
            } else if ($_GET['p'] == 'hapus_penjualan') { //dn
                include_once "views/penjualan/hapus_penjualan.php";
            } else if ($_GET['p'] == 'proses') {
                include_once "views/penjualan/proses.php";
            } else if ($_GET['p'] == 'detail_penjualan') { //dn
                include_once "views/penjualan/detail_penjualan.php";
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
