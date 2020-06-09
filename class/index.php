<?php
class index
{
    function index()
    {

        $_SESSION['nip'] = isset($_SESSION['nip']) ? $_SESSION['nip'] : '';

        require_once "class/koneksi.php";
        require_once "class/pengguna.php";
        require_once "class/perusahaan.php";
        require_once "class/pemohon.php";
        require_once "class/rekomendasi.php";
        require_once "class/tinjauan.php";

        // if (file_exists('class/pengguna.php')) {
        //     echo "<script> alert ('oke');</script>";
        // }
        $koneksi = new koneksi();
        $pengguna = new pengguna();
        $perusahaan = new perusahaan();
        $pemohon = new pemohon();
        $rekomendasi = new  rekomendasi();
        $tinjauan = new  tinjauan();
        $_GET['p'] = isset($_GET['p']) ? $_GET['p'] : false;
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="description" content="Andalali">
            <meta name="description" content="Jl. Karawang">
            <meta name="keywords" content="dishub">
            <meta name="author" content="stmik kharisma">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/andalalin/images/kharisma.png">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>Andalalin || Login</title>

            <link rel="stylesheet" type="text/css" href="http://localhost/andalalin/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="http://localhost/andalalin/assets/login/css/util.css">
            <link rel="stylesheet" type="text/css" href="http://localhost/andalalin/assets/login/css/main.css">
            <link rel="stylesheet" type="text/css" href="http://localhost/andalalin/assets/login/css/second.css">

        </head>
        <?php
        if ($_SESSION['nip'] == '') {
            self::form_login();
        } elseif ($_GET['p'] == 'cetak_nota') {
            require_once 'views/keranjang/cetak_nota.php';
        } elseif ($_GET['p'] == 'cetak_laporan') {
            require_once 'views/laporan/cetak_laporan.php';
        } elseif ($_GET['p'] == 'logout') {
            include_once "views/user/logout.php";
        } else if ($_GET['p'] == 'cetak_detail') {
            include_once "views/penjualan/cetak_detail.php";
        } else if ($_GET['p'] == 'cetak_surat_jalan') {
            include_once "views/surat_jalan/cetak_surat_jalan.php";
        } else {
        ?>

            <body>
                <!-- Font Awesome -->
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/fontawesome-free/css/all.min.css">
                <!-- Ionicons -->
                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                <!-- daterange picker -->
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/daterangepicker/daterangepicker.css">
                <!-- Select2 -->
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/select2/css/select2.min.css">
                <!-- Bootstrap4 Duallistbox -->
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
                <!-- Theme style -->
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/dist/css/adminlte.min.css">
                <!-- Google Font: Source Sans Pro -->
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/toastr/toastr.min.css">
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/ekko-lightbox/ekko-lightbox.css">

                <!-- Ion Slider -->
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/fontawesome/fonts_google.css">

                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/pace-progress/themes/yellow/pace-theme-flat-top.css">
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/css/animate.css">
                <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/css/buttonLoader.css" />


                </head>

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
                                        <img src="http://localhost/webplikasi-kuisioner/assets/images/company_profile/stmik.png" alt="WebPlikasi Logo" class="brand-image img-circle elevation-1" style="opacity: .8; width: 25px;">
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
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>


                        <aside class="main-sidebar elevation-4 sidebar-light-fuchsia  text-sm">

                            <div class="sidebar">
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                    <div class="image">
                                        <img src="http://localhost/webplikasi-kuisioner/assets/images/profile_picture/default.png?129478" class="img-circle elevation-2" alt="User Image">
                                    </div>
                                    <div class="info">
                                        <a href="#" class="d-block">Administrator</a>
                                    </div>
                                </div>

                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <li class="nav-item has-treeview menu-open">
                                            <a href="#" class="nav-link active">
                                                <i class="nav-icon fa fa-home"></i>
                                                <p>
                                                    Dashboard <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>

                                            <ul class="nav nav-treeview">

                                                <li class="nav-item">
                                                    <a href="http://localhost/webplikasi-kuisioner/home" class="nav-link active">
                                                        <i class="fas fa-circle nav-icon text-sm"></i>
                                                        <p>Home</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item has-treeview ">
                                            <a href="#" class="nav-link ">
                                                <i class="nav-icon fa fa-users"></i>
                                                <p>
                                                    Data Pengguna <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>

                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="http://localhost/webplikasi-kuisioner/settup_master_user" class="nav-link ">
                                                        <i class="far fa-circle nav-icon text-sm"></i>
                                                        <p>Pengguna</p>
                                                    </a>
                                                </li>
                                            </ul>
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
                                        <div class="col-sm-6">
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Home</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>

                            <!-- Main content -->
                            <section class="content text-sm">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header p-2">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                                                    </ul>
                                                </div><!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane active" id="timeline">
                                                            <!-- The timeline -->
                                                            <div class="timeline timeline-inverse">
                                                                <!-- timeline time label -->
                                                                <div class="time-label">
                                                                    <span class="bg-danger">
                                                                        Pendaftaran Online
                                                                    </span>
                                                                </div>
                                                                <!-- /.timeline-label -->
                                                                <!-- timeline item -->
                                                                <div>
                                                                    <i class="fas fa-user bg-info"></i>

                                                                    <div class="timeline-item">
                                                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                                        <h3 class="timeline-header"><a href="#">Hai, <strong><em>Administrator</em></strong> Selamat Datang di Website ANDALALIN</a></h3>
                                                                        <div class="timeline-body">
                                                                            Semua pemohon mendaftarkan dirinya melalui website resmi
                                                                        </div>
                                                                        <div class="timeline-footer">
                                                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-link"></i>&nbsp; Link Email</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END timeline item -->
                                                                <!-- timeline item -->
                                                                <div>
                                                                    <i class="fas fa-check bg-warning"></i>

                                                                    <div class="timeline-item">
                                                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                                        <h3 class="timeline-header"><a href="#">Administrator</a> </h3>

                                                                        <div class="timeline-body">
                                                                            login untuk melengkapi syarat-syarat yang lain.
                                                                        </div>
                                                                        <div class="timeline-footer">
                                                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END timeline item -->
                                                                <!-- timeline time label -->
                                                                <div class="time-label">
                                                                    <span class="bg-success">
                                                                        Pengisian Permohonan
                                                                    </span>
                                                                </div>
                                                                <!-- /.timeline-label -->
                                                                <!-- timeline item -->
                                                                <div>
                                                                    <i class="fas fa-users bg-purple"></i>

                                                                    <div class="timeline-item">
                                                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                                        <h3 class="timeline-header"><a href="#">Administrator</a> akan check semua dokumen yang anda sudah submit</h3>

                                                                        <div class="timeline-body">
                                                                            Setelah diverifikasi system akan memberi notifikasi
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END timeline item -->
                                                                <div>
                                                                    <i class="far fa-clock bg-gray"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                </div>
                                                <!-- /.tab-content -->
                                            </div><!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </section>
                    </div>

                    <footer class="main-footer text-sm">
                        <div class="float-right d-none d-sm-block">
                            <b>Version</b> 1.0
                        </div>
                        <strong>Copyright &copy; 2020 <a href="https://webplikasi.com">ANDALALIN</a></strong>
                    </footer>
                    </div>



                    <!-- pace-progress -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/pace-progress/pace.min.js"></script>

                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/jquery/jquery.min.js"></script>
                    <!-- Bootstrap 4 -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <!-- Select2 -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/select2/js/select2.full.min.js"></script>

                    <!-- Toastr -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/toastr/toastr.min.js"></script>
                    <!-- Bootstrap4 Duallistbox -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
                    <!-- InputMask -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/moment/moment.min.js"></script>
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
                    <!-- date-range-picker -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/moment/locales.js"></script>
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/daterangepicker/daterangepicker.js"></script>
                    <!-- bootstrap color picker -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
                    <!-- Tempusdominus Bootstrap 4 -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
                    <!-- Bootstrap Switch -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
                    <!-- AdminLTE App -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/dist/js/adminlte.min.js"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/dist/js/demo.js"></script>
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/sweetalert2/sweetalert2.min.js"></script>
                    <!-- SweetAlert2 -->
                    <link rel="stylesheet" href="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

                    <!-- DataTables -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/datatables/jquery.dataTables.js"></script>
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

                    <script src="http://localhost/webplikasi-kuisioner/assets/js/wow.min.js"></script>

                    <!-- Ekko Lightbox -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
                    <!-- Ion Slider -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
                    <!-- Bootstrap slider -->
                    <script src="http://localhost/webplikasi-kuisioner/assets/admin-lte-new/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>

                    <script>
                        var wow = new WOW();
                        wow.init();

                        function success_alert(title, msg) {
                            Swal.fire({
                                icon: 'success',
                                title: title,
                                text: msg,
                                timer: 1500,
                                footer: 'HORIZON EDUCATION',
                                showCancelButton: false,
                                showConfirmButton: false
                            })

                        }

                        function error_alert(title, msg) {
                            Swal.fire({
                                icon: 'error',
                                title: title,
                                text: msg,
                                footer: 'HORIZON EDUCATION',
                            })
                        }

                        function swal_progress() {
                            let timerInterval
                            Swal.fire({
                                title: 'Auto close alert!',
                                html: 'I will close in <b></b> milliseconds.',
                                timer: 2000,
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading()
                                    timerInterval = setInterval(() => {
                                        const content = Swal.getContent()
                                        if (content) {
                                            const b = content.querySelector('b')
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft()
                                            }
                                        }
                                    }, 100)
                                },
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer')
                                }
                            })
                        }

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
                            //Initialize Select2 Elements
                            $('.select2').select2()

                            //Initialize Select2 Elements
                            $('.select2bs4').select2({
                                theme: 'bootstrap4'
                            })

                            //Datemask dd/mm/yyyy
                            $('#datemask').inputmask('dd/mm/yyyy', {
                                'placeholder': 'dd/mm/yyyy'
                            })
                            //Datemask2 mm/dd/yyyy
                            $('#datemask2').inputmask('mm/dd/yyyy', {
                                'placeholder': 'mm/dd/yyyy'
                            })
                            //Money Euro
                            $('[data-mask]').inputmask()

                            //Date range picker
                            $('#reservation').daterangepicker()
                            //Date range picker with time picker
                            $('#reservationtime').daterangepicker({
                                timePicker: true,
                                timePickerIncrement: 30,
                                format: 'L',
                                locale: 'id'
                            })
                            //Date range as a button
                            $('#daterange-btn').daterangepicker({
                                    ranges: {
                                        'Today': [moment(), moment()],
                                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                    },
                                    startDate: moment().subtract(29, 'days'),
                                    endDate: moment()
                                },
                                function(start, end) {
                                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                                }
                            )

                            $('.timepicker').datetimepicker({
                                // dateFormat: 'dd-mm-yy',
                                format: 'L',
                                locale: 'id'
                            });



                            //Bootstrap Duallistbox
                            $('.duallistbox').bootstrapDualListbox()

                            //Colorpicker
                            $('.my-colorpicker1').colorpicker()
                            //color picker with addon
                            $('.my-colorpicker2').colorpicker()

                            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                            });

                            $("input[data-bootstrap-switch]").each(function() {
                                $(this).bootstrapSwitch('state', $(this).prop('checked'));
                            });

                        })
                    </script>

                </body>

        </html>
        <!-- copy -->


        <div class="content mt-3">


        </div> <!-- .content -->
        <?php $this->loader(); ?>

        <!-- Right Panel -->




        </body>
    <?php
        } ?>

    </html>
<?php
    }

    function loader()
    {
        $koneksi = new koneksi();
        $pengguna = new pengguna();
        $perusahaan = new perusahaan();
        $pemohon = new  pemohon();
        $tinjauan = new  tinjauan();
        $rekomendasi = new  rekomendasi();
        if (isset($_GET['p'])) {
            if ($_GET['p'] == 'user') {
                /*User*/
                include "views/user/tampil_user.php";
            } elseif ($_GET['p'] == 'tambah_user') {
                include_once "views/user/tambah_user.php";
            } else if ($_GET['p'] == 'hapus_user') {
                include_once "views/user/hapus_user.php";
            } else if ($_GET['p'] == 'edit_user') {
                include_once "views/user/edit_user.php";
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
