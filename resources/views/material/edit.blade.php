@extends('layouts.app')

@section('title', 'Edit Material')

@section('content_header')
    <h1>Edit Material</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('material.update', $material->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Material</label>
                <input type="text" name="nama_material" 
                       class="form-control" 
                       value="{{ $material->nama_material }}" required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" 
                       class="form-control"
                       value="{{ $material->stok }}" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" 
                       class="form-control"
                       value="{{ $material->satuan }}">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control">{{ $material->keterangan }}</textarea>
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('material.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@stop
