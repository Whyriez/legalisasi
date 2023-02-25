<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>


        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                    </div>

                    @if ($user->role == 'user')
                        <a href="{{ url('myprofile') }}">
                            <img src="{{ asset('storage/' . $user->profile) }}" class="img-circle elevation-2"
                                style="width:2.5rem;height:2.5rem;margin-top:9px;" alt="User Image">
                        </a>
                        <div class="info">
                            <a href="{{ url('myprofile') }}" class="d-block">{{ $user->name }}</a>
                            <a href="{{ url('myprofile') }}" class="d-block">{{ $user->nim }}</a>
                        </div>
                    @else
                        <a href="{{ url('profile') }}">
                            <img src="{{ asset('storage/' . $user->profile) }}" class="img-circle elevation-2"
                                style="width:2.5rem;height:2.5rem;margin-top:9px;" alt="User Image">
                        </a>
                        <div class="info">
                            <a href="{{ url('profile') }}" class="d-block"
                                style="margin-top: 10px">{{ $user->name }}</a>
                        </div>
                    @endif


                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        @if ($user->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link @yield('dashboard')">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Data Legalisasi
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('data_bukti') }}" class="nav-link  @yield('ada')">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sudah Kirim Bukti</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('data_nbukti') }}" class="nav-link  @yield('belum')">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Belum Kirim Bukti</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/pengaturan') }}" class="nav-link @yield('pengaturan')">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Pengaturan
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if ($user->role == 'user')
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link @yield('dashboard')">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('legalisasi') }}" class="nav-link @yield('legalisasi')">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Legalisasi
                                    </p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">

            <strong>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> <span>Fakultas Teknik, Universitas Negeri Gorontalo</span>
            </strong>
            Gorontalo,
            Indonesia.
        </footer>
    </div>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>

    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


    <script src="dist/js/adminlte.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>


</body>

</html>
