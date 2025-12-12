@extends('layouts.app')

@section('title', 'Tambah Assignment SDM')

@section('content')

<h3>Tambah Assignment SDM ke Proyek</h3>

<div class="card p-4">

    <form action="{{ route('proyek.assign.store', $proyek->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pilih SDM</label>
            <select name="sdm_id" class="form-control" required>
                <option value="">-- Pilih SDM --</option>
                @foreach ($sdms as $sdm)
                    <option value="{{ $sdm->id }}">{{ $sdm->nama }} ({{ $sdm->jabatan }})</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-primary">Simpan Assignment</button>
        <a href="{{ route('proyek.show', $proyek->id) }}" class="btn btn-secondary">Batal</a>
    </form>

</div>

@endsection
