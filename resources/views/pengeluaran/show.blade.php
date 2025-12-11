@extends('layouts.app')

@section('title', 'Detail Pengeluaran')

@section('content')
<div class="card p-4">
    <table class="table">

        <tr>
            <th>Proyek</th>
            <td>{{ $pengeluaran->proyek->nama_proyek ?? '-' }}</td>
        </tr>

        <tr>
            <th>Tanggal</th>
            <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d-m-Y') }}</td>
        </tr>

        <tr>
            <th>Tipe</th>
            <td>{{ $pengeluaran->tipe }}</td>
        </tr>

        <tr>
            <th>Jumlah</th>
            <td>Rp {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</td>
        </tr>

        <tr>
            <th>Keterangan</th>
            <td>{{ $pengeluaran->keterangan ?? '-' }}</td>
        </tr>

        <tr>
            <th>Dibuat Oleh</th>
            <td>{{ $pengeluaran->user->name ?? '-' }}</td>
        </tr>

    </table>

    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
