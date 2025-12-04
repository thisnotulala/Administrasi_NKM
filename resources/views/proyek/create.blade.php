@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('content')
@php
$clients = \App\Models\Client::all();
@endphp

<h3>Tambah Proyek</h3>

<div class="card p-4">
    <form action="{{ route('proyek.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Proyek</label>
            <input type="text" name="nama_proyek" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Client</label>
            <select name="client_id" class="form-control" required>
                <option value="">-- Pilih Client --</option>
                @foreach($clients as $c)
                    <option value="{{ $c->id }}">{{ $c->nama_client }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>

        <div class="form-group">
            <label>Nilai Kontrak</label>
            <input type="number" name="nilai_kontrak" class="form-control">
        </div>

        <div class="form-group">
            <label>Rencana Mulai</label>
            <input type="date" name="rencana_mulai" class="form-control">
        </div>

        <div class="form-group">
            <label>Rencana Selesai</label>
            <input type="date" name="rencana_selesai" class="form-control">
        </div>

        <div class="form-group">
            <label>Status Proyek</label>
            <select name="status" class="form-control">
                <option value="berjalan">Berjalan</option>
                <option value="tertunda">Tertunda</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection

