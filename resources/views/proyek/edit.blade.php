@extends('adminlte::page')

@section('title', 'Edit Proyek')

@section('content_header')
    <h1>Edit Proyek</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Proyek</label>
                <input type="text" name="nama_proyek" class="form-control" 
                       value="{{ $proyek->nama_proyek }}" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4">{{ $proyek->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" {{ $proyek->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="pending" {{ $proyek->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="selesai" {{ $proyek->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" 
                       value="{{ $proyek->tanggal_mulai }}">
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control"
                       value="{{ $proyek->tanggal_selesai }}">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>

            <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@stop
