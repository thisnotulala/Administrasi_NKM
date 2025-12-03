@extends('layouts.app')

@section('title', 'Tambah Equipment')

@section('content_header')
    <h1>Tambah Equipment</h1>
@stop

@section('content')

<div class="card p-4">

    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Equipment</label>
            <input type="text" name="nama_equipment" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Kondisi</label>
            <select name="kondisi" class="form-control">
                <option value="Bagus">Bagus</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="3" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@stop
