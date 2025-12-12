@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')

<h3>Detail Proyek</h3>

<div class="card p-4">

    <p><strong>Nama Proyek:</strong> {{ $proyek->nama_proyek }}</p>
    <p><strong>Client:</strong> {{ $proyek->client->nama_client }}</p>
    <p><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
    <p><strong>Nilai Kontrak:</strong> Rp {{ number_format($proyek->nilai_kontrak,0,',','.') }}</p>
    <p><strong>Rencana Mulai:</strong> {{ $proyek->rencana_mulai }}</p>
    <p><strong>Rencana Selesai:</strong> {{ $proyek->rencana_selesai }}</p>

    @php
        use Carbon\Carbon;
        $mulai = Carbon::parse($proyek->rencana_mulai);
        $selesai = Carbon::parse($proyek->rencana_selesai);
        $durasi = $mulai->diffInDays($selesai);
    @endphp

    <p><strong>Durasi:</strong> {{ $durasi }} hari</p>

    <p><strong>Status:</strong> {{ ucfirst($proyek->status) }}</p>
    <p><strong>Deskripsi:</strong> {{ $proyek->deskripsi }}</p>

    <hr>

    <h4>SDM yang Ditugaskan</h4>

    <a href="{{ route('proyek.assign.create', $proyek->id) }}" class="btn btn-primary mb-3">
        Tambah Assignment
    </a>

    @if($proyek->sdms->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama SDM</th>
                    <th>Peran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyek->sdms as $sdm)
                    <tr>
                        <td>{{ $sdm->nama }}</td>
                        <td>{{ $sdm->pivot->peran }}</td>
                        <td>
                            <form action="{{ route('proyek.assign.destroy', [$proyek->id, $sdm->id]) }}" 
                                  method="POST" onsubmit="return confirm('Yakin hapus assignment?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada SDM yang ditugaskan.</p>
    @endif

    <a href="{{ route('proyek.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

@endsection
