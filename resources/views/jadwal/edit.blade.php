@extends('layouts.app')

@section('content')
<h3>Edit Jadwal</h3>

<form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control" value="{{ $jadwal->tanggal_mulai }}">
    </div>

    <div class="form-group">
        <label>Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="form-control" value="{{ $jadwal->tanggal_selesai }}">
    </div>

    <button class="btn btn-warning">Update</button>
</form>
@endsection
