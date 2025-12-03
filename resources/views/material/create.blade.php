@extends('layouts.app')

@section('title', 'Tambah Material')

@section('content_header')
    <h1>Tambah Material</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('material.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Material</label>
                <input type="text" name="nama_material" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('material.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@stop
