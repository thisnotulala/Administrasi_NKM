@extends('layouts.app')

@section('title','Tambah Client')

@section('content')
<h3>Tambah Client</h3>

<form action="{{ route('client.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nama Client</label>
        <input type="text" name="nama_client" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label>Telp</label>
        <input type="text" name="telepon" class="form-control">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
