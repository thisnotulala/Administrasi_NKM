@extends('layouts.app')

@section('title', 'Tambah Progress')

@section('content')

<div class="card p-4">

    <h3>Tambah Progress</h3>

    <form action="{{ route('progress.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mt-2">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                <option value="">-- Pilih Proyek --</option>
                @foreach($proyek as $pr)
                    <option value="{{ $pr->id }}">{{ $pr->nama_proyek }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label>Persentase</label>
            <input type="number" name="persentase" class="form-control" min="0" max="100" required>
        </div>

        <div class="form-group mt-2">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group mt-2">
            <label>Foto Progress (Opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('progress.index') }}" class="btn btn-secondary mt-3">Kembali</a>

    </form>

</div>

@endsection
