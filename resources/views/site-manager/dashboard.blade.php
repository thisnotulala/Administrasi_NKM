@extends('layouts.app') 
{{-- pastikan ini sesuai dengan layout AdminLTE kamu --}}

@section('title', 'Dashboard Site Manager')

@section('content')
<div class="container-fluid">

    <h1 class="mb-4">Dashboard Site Manager</h1>

    <!-- INFO CARDS -->
    <div class="row">

        <div class="col-lg-4 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>12</h3>
                    <p>Total Proyek</p>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>67%</h3>
                    <p>Progress Rata-rata</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Rp 845.300.000</h3>
                    <p>Total Pengeluaran</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- QUICK MENU -->
    <div class="row">

        <div class="col-md-3 col-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kelola Proyek</h5>
                    <p class="card-text">Tambah, edit, dan kelola data proyek.</p>
                    <a href="/proyek" class="btn btn-primary btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kelola Material</h5>
                    <p class="card-text">Pantau stok material.</p>
                    <a href="/material" class="btn btn-primary btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kelola Equipment</h5>
                    <p class="card-text">Pantau alat proyek.</p>
                    <a href="/equipment" class="btn btn-primary btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Laporan Proyek</h5>
                    <p class="card-text">Lihat laporan lengkap.</p>
                    <a href="/laporan" class="btn btn-primary btn-sm">Lihat</a>
                </div>
            </div>
        </div>

    </div>

    <!-- TABEL PROYEK -->
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Daftar Proyek</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Lokasi</th>
                        <th>Progress</th>
                        <th>Deadline</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Pembangunan Ruko A</td>
                        <td>Jakarta</td>
                        <td>80%</td>
                        <td>20 Jan 2025</td>
                        <td><a href="#" class="btn btn-info btn-sm">Lihat</a></td>
                    </tr>

                    <tr>
                        <td>Renovasi Gudang B</td>
                        <td>Bandung</td>
                        <td>40%</td>
                        <td>10 Feb 2025</td>
                        <td><a href="#" class="btn btn-info btn-sm">Lihat</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
