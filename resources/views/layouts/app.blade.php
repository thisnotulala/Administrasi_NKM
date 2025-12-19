<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Proyek')</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- FONT AWESOME (FIX ICON TIDAK MUNCUL) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- ADMINLTE -->
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-merah {
            background: linear-gradient(135deg, #b30000, #e60000);
        }

        .brand-link {
            background: linear-gradient(135deg, #b30000, #e60000);
            text-align: center;
        }

        .brand-link .brand-text {
            font-weight: 600;
            font-size: 14px;
            color: #fff !important;
        }

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

        .content-wrapper {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,.05);
        }

        .btn-danger {
            background-color: #c40000;
            border: none;
        }

        .btn-xs {
            width: 34px;
            height: 34px;
            padding: 0;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn i.fas {
            font-family: "Font Awesome 5 Free" !important;
            font-weight: 900 !important;
            color: #fff !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- LEFT NAVBAR -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <!-- RIGHT NAVBAR - PROFILE -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle fa-lg"></i>
                    <span class="ml-1">
                        {{ auth()->user()->name }}
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <span class="dropdown-item dropdown-header text-muted">
                        {{ ucfirst(auth()->user()->role) }}
                    </span>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>

                    <div class="dropdown-divider"></div>

                    <form action="/logout" method="POST" class="dropdown-item p-0">
                        @csrf
                        <button class="btn btn-link btn-block text-left">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>

        </ul>
    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{ url('/') }}" class="brand-link">
            <span class="brand-text">PT Nusantara Klik Makmur</span>
        </a>

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
                        <a href="/client" class="nav-link {{ request()->is('client*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Client</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/pengeluaran" class="nav-link {{ request()->is('pengeluaran*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
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
                        <a href="{{ route('laporan.index') }}" class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Laporan Proyek</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/sdm" class="nav-link {{ request()->is('sdm*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>SDM</p>
                        </a>
                    </li>

                    {{-- USER MANAGEMENT - SITE MANAGER ONLY --}}
                    @if(auth()->user()->role === 'site_manager')
                    <li class="nav-item">
                        <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>User Management</p>
                        </a>
                    </li>
                    @endif

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

    <div class="content-wrapper p-4">
        @yield('content')
    </div>

</div>

<!-- jQuery HARUS PERTAMA -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle (sudah termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Script untuk Modal -->
<script>
$(document).ready(function() {
    // Pastikan modal berfungsi
    $('[data-toggle="modal"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $(target).modal('show');
    });
});
</script>

@stack('scripts')
</body>
</html>

</body>
</html>
