@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')

<h3>Detail Proyek</h3>

<div class="card p-4">

    <p><strong>Nama Proyek:</strong> {{ $proyek->nama_proyek }}</p>
    <p><strong>Pemilik:</strong> {{ $proyek->pemilik_proyek }}</p>
    <p><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
    <p><strong>Nilai Kontrak:</strong> Rp {{ number_format($proyek->nilai_kontrak,0,',','.') }}</p>
    <p><strong>Rencana Mulai:</strong> {{ $proyek->rencana_mulai }}</p>
    <p><strong>Rencana Selesai:</strong> {{ $proyek->rencana_selesai }}</p>
    <p><strong>Status:</strong> {{ ucfirst($proyek->status) }}</p>
    <p><strong>Deskripsi:</strong> {{ $proyek->deskripsi }}</p>

    <a href="{{ route('proyek.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

@endsection
