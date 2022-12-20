<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Administrator</title>
    <link rel="icon" href="{{ url('') }}/img/brand/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ url('') }}/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/css/demo.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">



</head>

<body>

    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="{{ url('img/logo.png') }}" class="navbar-brand-img" alt="">
                </a>
            </div>
            <div class="navbar-inner">
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('dashboard') }}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('devices') }}">
                                <i class="ni ni-settings text-primary"></i>
                                <span class="nav-link-text">Devices</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('grafik') }}">
                                <i class="fas fa-chart-line text-primary"></i>
                                <span class="nav-link-text">Grafik Sensor</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('rekap') }}">
                                <i class="ni ni-calendar-grid-58 text-primary"></i>
                                <span class="nav-link-text">Rekap</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="my-3">
                </div>
            </div>
        </div>
    </nav>
    <div class="main-content" id="panel">

        <nav class="navbar navbar-top navbar-expand navbar-dark bg-success border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show"
                                data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="{{ url('img/logo.png') }}">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span
                                            class="mb-0 text-sm font-weight-bold text-capitalize"><?= auth()->user()->nama ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Selamat Datang!</h6>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="{{ url('logout') }}" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header bg-success pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark" style="width: 250px">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                            class="ni ni-tv-2"></i></a></li>
                                <li class="breadcrumb-item active">{{ $app_title }}</li>
                            </ol>
                        </div>
                        @if ($app_title == 'Device')
                            <div class="col-lg-6 col-5 text-right">
                                <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
                                    data-target="#deviceModal">Tambah</a>
                            </div>
                        @endif
                        @if ($app_title == 'Rekap Data Sensor')
                            <div class="col-lg-6 col-5">
                                <div class="d-flex justify-content-end">
                                    <div class=" text-right mr-3">
                                        <a href="{{ url('ph/download') }}" class="btn btn-neutral"><i
                                                class="fa fa-download"></i> Rekap PH</a>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{ url('tds/download') }}" class="btn btn-neutral"><i
                                                class="fa fa-download"></i> Rekap TDS</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--6">
            @yield('content')
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; <?= date('Y') ?> <a href="" class="font-weight-bold ml-1">GO-NIC</a>
                        </div>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </footer>
        </div>
    </div>

    @yield('content-modal')

    <script src="{{ url('') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ url('') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ url('') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

    <script src="{{ url('') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ url('') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script src="{{ url('') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <script src="{{ url('') }}/js/mqttws31.js"></script>

    <script src="{{ url('vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>


    @if (session('message'))
        {!! session('message') !!}
    @endif

    @yield('content-script')
    <script>
        $(document).ready(function() {
            $("#relay_1").change(function() {})
            $("#relay_2").change(function() {})
            $("#relay_3").change(function() {})
            $("#relay_4").change(function() {})

            function ajax(id, relay, value) {
                $.ajax({
                    url: './api/relay.php?relay=' + relay,
                    type: 'post',
                    data: {
                        id: id,
                        relay: relay,
                        value: value
                    },
                    success: function(response) {
                        location.reload()
                        // $("." + relay).empty();
                        // $("." + relay).html(response);
                    }
                })
            }
        })
    </script>

</body>

</html>
