@extends('layouts.app')

@section('title', 'Edit Equipment')

@section('content_header')
    <h1>Edit Equipment</h1>
@stop

@section('content')

<div class="card p-4">

    <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Equipment</label>
            <input type="text" name="nama_equipment" class="form-control"
                   value="{{ $equipment->nama_equipment }}" required>
        </div>

        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control"
                   value="{{ $equipment->jumlah }}" required>
        </div>

        <div class="form-group">
            <label>Kondisi</label>
            <select name="kondisi" class="form-control">
                <option value="Bagus" {{ $equipment->kondisi == 'Bagus' ? 'selected' : '' }}>Bagus</option>
                <option value="Rusak Ringan" {{ $equipment->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ $equipment->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="3" class="form-control">{{ $equipment->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@stop
