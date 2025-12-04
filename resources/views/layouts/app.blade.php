<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/plugins/fontawesome-free/css/all.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Logo -->
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">Sistem Manajemen</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/client" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>Client</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/proyek" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>Kelola Proyek</p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="/jadwal" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Jadwal Proyek</p>
                    </a>
                </li>
                    <li class="nav-item">
                        <a href="/material" class="nav-link">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>Material</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/equipment" class="nav-link">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Equipment</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/pengeluaran" class="nav-link">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>Pengeluaran</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/laporan" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Laporan</p>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-block">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </nav>

        </div>
        <!-- /.sidebar -->

    </aside>

    <!-- CONTENT WRAPPER -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>

</div>

<!-- REQUIRED SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
