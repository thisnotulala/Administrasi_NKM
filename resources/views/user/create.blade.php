@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="site_manager">Site Manager</option>
                    <option value="administrasi">Administrasi</option>
                    <option value="kepala_lapangan">Kepala Lapangan</option>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

@endsection
