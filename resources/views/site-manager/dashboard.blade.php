@extends('layout.app')

@section('title', 'Dashboard Site Manager')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard Site Manager</h1>

<!-- INFO CARDS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-600">Total Proyek</h3>
        <p class="text-3xl font-bold mt-2">12</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-600">Progress Rata-rata</h3>
        <p class="text-3xl font-bold mt-2">67%</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-gray-600">Total Pengeluaran</h3>
        <p class="text-3xl font-bold mt-2">Rp 845.300.000</p>
    </div>

</div>

<!-- QUICK MENU -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">

    <a href="/proyek" class="bg-white p-6 rounded-lg shadow hover:bg-blue-50">
        <h4 class="font-semibold mb-2">Kelola Proyek</h4>
        <p class="text-gray-600 text-sm">Tambah, edit, dan kelola data proyek.</p>
    </a>

    <a href="/material" class="bg-white p-6 rounded-lg shadow hover:bg-blue-50">
        <h4 class="font-semibold mb-2">Kelola Material</h4>
        <p class="text-gray-600 text-sm">Pantau stok material.</p>
    </a>

    <a href="/equipment" class="bg-white p-6 rounded-lg shadow hover:bg-blue-50">
        <h4 class="font-semibold mb-2">Kelola Equipment</h4>
        <p class="text-gray-600 text-sm">Pantau alat proyek.</p>
    </a>

    <a href="/laporan" class="bg-white p-6 rounded-lg shadow hover:bg-blue-50">
        <h4 class="font-semibold mb-2">Laporan Proyek</h4>
        <p class="text-gray-600 text-sm">Lihat laporan lengkap.</p>
    </a>

</div>

<!-- TABEL PROYEK -->
<div class="bg-white p-6 rounded-lg shadow">

    <h3 class="text-lg font-semibold mb-4">Daftar Proyek</h3>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border">Nama Proyek</th>
                <th class="p-3 border">Lokasi</th>
                <th class="p-3 border">Progress</th>
                <th class="p-3 border">Deadline</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="p-3 border">Pembangunan Ruko A</td>
                <td class="p-3 border">Jakarta</td>
                <td class="p-3 border">80%</td>
                <td class="p-3 border">20 Jan 2025</td>
                <td class="p-3 border">
                    <a href="#" class="text-blue-600 hover:underline">Lihat</a>
                </td>
            </tr>

            <tr>
                <td class="p-3 border">Renovasi Gudang B</td>
                <td class="p-3 border">Bandung</td>
                <td class="p-3 border">40%</td>
                <td class="p-3 border">10 Feb 2025</td>
                <td class="p-3 border">
                    <a href="#" class="text-blue-600 hover:underline">Lihat</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
