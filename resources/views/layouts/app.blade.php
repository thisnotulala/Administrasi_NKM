<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Google Font (Modern) -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- AdminLTE -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- CUSTOM STYLE (TAMBAHAN SAJA) -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* WARNA UTAMA PERUSAHAAN */
        .bg-merah {
            background: linear-gradient(135deg, #b30000, #e60000);
        }

        /* BRAND LOGO */
        .brand-link {
            background: linear-gradient(135deg, #b30000, #e60000);
            color: #fff !important;
            text-align: center;
        }

        .brand-link .brand-text {
            font-weight: 600;
            font-size: 15px;
        }

        /* SIDEBAR */
        .main-sidebar {
            background-color: #1f1f1f;
        }

        .nav-sidebar .nav-link {
            border-radius: 8px;
            margin: 4px 8px;
        }

        .nav-sidebar .nav-link.active,
        .nav-sidebar .nav-link:hover {
            background-color: #c40000 !important;
            color: #fff !important;
        }

        /* CONTENT */
        .content-wrapper {
            background-color: #f4f6f9;
        }

        /* CARD */
        .card {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,.05);
        }

        /* BUTTON */
        .btn-danger {
            background-color: #c40000;
            border: none;
        }
        /* ===== FIX ICON AKSI ===== */
        .btn-xs {
            width: 34px;
            height: 34px;
            padding: 0;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-xs i {
            font-size: 14px;
        }

        /* Supaya icon benar-benar terlihat */
        .table td .btn {
            line-height: 1;
        }

        /* ===== FIX FONT AWESOME ICON HILANG ===== */
        .btn i.fas {
            font-family: "Font Awesome 5 Free" !important;
            font-weight: 900 !important; /* INI KUNCI UTAMA */
            color: #fff !important;
            display: inline-block !important;
        }


    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Logo -->
        <a href="/" class="brand-link">
            <span class="brand-text">
                PT Nusantara Klik Makmur
            </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/proyek" class="nav-link {{ request()->is('proyek*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>Kelola Proyek</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/jadwal" class="nav-link {{ request()->is('jadwal*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Jadwal Proyek</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/equipment" class="nav-link {{ request()->is('equipment*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Equipment</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/client" class="nav-link {{ request()->is('equipment*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Client</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pengeluaran" class="nav-link {{ request()->is('pengeluaran*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>Pengeluaran</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/progress" class="nav-link {{ request()->is('progress*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Progress</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('laporan.index') }}"
                           class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Laporan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/sdm" class="nav-link {{ request()->is('sdm*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>SDM</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>User Management</p>
                        </a>
                    </li>

                    <li class="nav-item mt-3 px-2">
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
    </aside>

    <!-- CONTENT -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>

    

</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
