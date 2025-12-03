@extends('layouts.app')

@section('title', 'Detail Pengeluaran')

@section('content_header')
    <h1>Detail Pengeluaran</h1>
@stop

@section('content')

<div class="card p-4">

    <table class="table">
        <tr>
            <th>Proyek</th><td>{{ $p->proyek->nama_proyek }}</td>
        </tr>
        <tr>
            <th>Tanggal</th><td>{{ $p->tanggal }}</td>
        </tr>
        <tr>
            <th>Kategori</th><td>{{ $p->kategori }}</td>
        </tr>
        <tr>
            <th>Jenis / Tipe</th><td>{{ $p->tipe }}</td>
        </tr>
        <tr>
            <th>Jumlah</th><td>Rp {{ number_format($p->jumlah) }}</td>
        </tr>
        <tr>
            <th>Keterangan</th><td>{{ $p->keterangan }}</td>
        </tr>
        <tr>
            <th>Dibuat Oleh</th><td>{{ $p->user->name ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>

@stop
