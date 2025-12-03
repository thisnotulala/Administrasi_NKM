@extends('layouts.app')

@section('content')
<h3>Tambah Jadwal</h3>

<form action="{{ route('jadwal.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>ID Proyek</label>
        <input type="number" name="proyek_id" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="form-control" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
