@extends('layouts.app')

@section('title', 'Edit Data Proyek')

@section('content_header')
    <h1>Edit Data Proyek</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Periksa kembali input Anda.</strong>
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card p-4">

    <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama Proyek --}}
        <div class="form-group">
            <label>Nama Proyek</label>
            <input type="text" name="nama_proyek" class="form-control" 
                   value="{{ $proyek->nama_proyek }}" required>
        </div>

        {{-- Pemilik Proyek --}}
        <div class="form-group">
            <label>Pemilik Proyek</label>
            <input type="text" name="pemilik_proyek" class="form-control"
                   value="{{ $proyek->pemilik_proyek }}">
        </div>

        {{-- Lokasi --}}
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" 
                   value="{{ $proyek->lokasi }}">
        </div>

        {{-- Nilai Kontrak --}}
        <div class="form-group">
            <label>Nilai Kontrak (Rp)</label>
            <input type="number" name="nilai_kontrak" class="form-control"
                   value="{{ $proyek->nilai_kontrak }}">
        </div>

        {{-- Durasi Rencana --}}
        <div class="form-group">
            <label>Durasi Rencana (Hari)</label>
            <input type="number" name="durasi_rencana" class="form-control"
                   value="{{ $proyek->durasi_rencana }}">
        </div>

        {{-- Tanggal Mulai --}}
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control"
                   value="{{ $proyek->tanggal_mulai }}">
        </div>

        {{-- Tanggal Selesai --}}
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control"
                   value="{{ $proyek->tanggal_selesai }}">
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label>Status Proyek</label>
            <select name="status" class="form-control">
                <option value="berjalan" 
                    {{ $proyek->status == 'berjalan' ? 'selected' : '' }}>Berjalan</option>

                <option value="selesai" 
                    {{ $proyek->status == 'selesai' ? 'selected' : '' }}>Selesai</option>

                <option value="tertunda" 
                    {{ $proyek->status == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
            </select>
        </div>

        {{-- Deskripsi --}}
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="form-control">{{ $proyek->deskripsi }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@stop
