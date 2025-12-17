@extends('layouts.app')
@section('title','Laporan Proyek')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Laporan Proyek: {{ $proyek->nama_proyek }}</h4>
    </div>

    <div class="card-body">

        {{-- ================= PROGRESS ================= --}}
        <h5>Progress Pekerjaan</h5>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Progress (%)</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($progress as $p)
                <tr>
                    <td>{{ $p->created_at->format('d-m-Y') }}</td>
                    <td>{{ $p->persentase }}%</td>
                    <td>{{ $p->keterangan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data progress</td>
                </tr>
                @endforelse
            </tbody>
        </table>


        {{-- ================= PENGELUARAN ================= --}}
        <h5 class="mt-4">Pengeluaran</h5>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengeluaran as $x)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($x->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $x->tipe }}</td>
                    <td>Rp {{ number_format($x->jumlah, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data pengeluaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- ================= SDM ================= --}}
        <h5 class="mt-4">SDM Terlibat</h5>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sdm as $s)
                <tr>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->jabatan }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">Belum ada SDM</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
