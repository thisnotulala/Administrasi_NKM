@extends('adminlte::page')

@section('title', 'Tambah Proyek')

@section('content_header')
    <h1>Tambah Proyek</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('proyek.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Proyek</label>
                <input type="text" name="nama_proyek" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="berjalan">Berjalan</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@stop
