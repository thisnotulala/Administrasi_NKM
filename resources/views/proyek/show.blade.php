@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Detail Proyek</h3>

    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">

        {{-- INFORMASI UTAMA --}}
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama Proyek</strong><br>{{ $proyek->nama_proyek }}</p>
                <p><strong>Lokasi</strong><br>{{ $proyek->lokasi }}</p>

                <p>
                    <strong>Status</strong><br>
                    <span class="badge
                        @if($proyek->status == 'berjalan') badge-success
                        @elseif($proyek->status == 'tertunda') badge-warning
                        @else badge-secondary
                        @endif">
                        {{ ucfirst($proyek->status) }}
                    </span>
                </p>
            </div>

            <div class="col-md-6">
                <p><strong>Rencana Mulai</strong><br>{{ $proyek->rencana_mulai }}</p>
                <p><strong>Rencana Selesai</strong><br>{{ $proyek->rencana_selesai }}</p>

                @php
                    use Carbon\Carbon;
                    $mulai = Carbon::parse($proyek->rencana_mulai);
                    $selesai = Carbon::parse($proyek->rencana_selesai);
                    $durasi = $mulai->diffInDays($selesai);
                @endphp

                <p><strong>Durasi</strong><br>{{ $durasi }} hari</p>
            </div>
        </div>

        {{-- KHUSUS SITE MANAGER & ADMIN --}}
        @if(auth()->user()->role != 'kepala_lapangan')
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Client</strong><br>{{ $proyek->client->nama_client }}</p>
            </div>

            <div class="col-md-6">
                <p>
                    <strong>Nilai Kontrak</strong><br>
                    Rp {{ number_format($proyek->nilai_kontrak, 0, ',', '.') }}
                </p>
            </div>
        </div>
        @endif

        <hr>

        {{-- DESKRIPSI --}}
        <p>
            <strong>Deskripsi Pekerjaan</strong><br>
            {{ $proyek->deskripsi ?? '-' }}
        </p>

        <hr>

        {{-- SDM --}}
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0">SDM yang Ditugaskan</h5>

            {{-- hanya site manager & admin --}}
            @if(auth()->user()->role != 'kepala_lapangan')
                <a href="{{ route('proyek.assign.create', $proyek->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-user-plus"></i> Tambah SDM
                </a>
            @endif
        </div>

        @if($proyek->sdms->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>Nama SDM</th>
                            <th>Peran</th>

                            @if(auth()->user()->role != 'kepala_lapangan')
                                <th width="80">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proyek->sdms as $sdm)
                            <tr>
                                <td>{{ $sdm->nama }}</td>
                                <td>{{ $sdm->pivot->peran }}</td>

                                @if(auth()->user()->role != 'kepala_lapangan')
                                <td class="text-center">
                                    <form action="{{ route('proyek.assign.destroy', [$proyek->id, $sdm->id]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus assignment?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-xs rounded-circle" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">Belum ada SDM yang ditugaskan.</p>
        @endif

    </div>
</div>

@endsection
