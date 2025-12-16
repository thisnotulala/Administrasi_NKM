@extends('layouts.app')
@section('title','Laporan Proyek')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Laporan Proyek: {{ $proyek->nama_proyek }}</h4>
    </div>

    <div class="card-body">

        {{-- PROGRESS --}}
        <h5>Progress Pekerjaan</h5>
        <table class="table table-sm table-bordered">
            <tr>
                <th>Tanggal</th>
                <th>Progress (%)</th>
                <th>Status</th>
            </tr>
            @foreach($progress as $p)
            <tr>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
                <td>{{ $p->persentase }}%</td>
                <td>{{ ucfirst($p->validasi) }}</td>
            </tr>
            @endforeach
        </table>

        {{-- PENGELUARAN --}}
        <h5 class="mt-4">Pengeluaran</h5>
        <table class="table table-sm table-bordered">
            <tr>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
            @foreach($pengeluaran as $x)
            <tr>
                <td>{{ $x->tanggal }}</td>
                <td>{{ $x->jenis }}</td>
                <td>Rp {{ number_format($x->jumlah) }}</td>
            </tr>
            @endforeach
        </table>

        {{-- SDM --}}
        <h5 class="mt-4">SDM Terlibat</h5>
        <table class="table table-sm table-bordered">
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
            </tr>
            @foreach($sdm as $s)
            <tr>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->jabatan }}</td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection
