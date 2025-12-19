@extends('layouts.app')

@section('title','Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header bg-merah text-white">
                <h5 class="mb-0">
                    <i class="fas fa-user-circle"></i> Profile Saya
                </h5>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ auth()->user()->name }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ auth()->user()->email }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Password Baru (opsional)</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Kosongkan jika tidak diganti">
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <input type="text"
                               class="form-control"
                               value="{{ ucfirst(auth()->user()->role) }}"
                               disabled>
                    </div>

                    <button class="btn btn-danger btn-block">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
