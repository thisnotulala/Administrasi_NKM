@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" value="{{ $user->name }}" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{ $user->email }}" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password (kosongkan jika tidak ganti)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="site_manager" {{ $user->role=='Site Manager' ? 'selected' : '' }}>Site Manager</option>
                    <option value="administrasi" {{ $user->role=='Administrasi' ? 'selected' : '' }}>Administrasi</option>
                    <option value="kepala_lapangan" {{ $user->role=='Kepala Lapangan' ? 'selected' : '' }}>Kepala Lapangan</option>
                </select>
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

@endsection
