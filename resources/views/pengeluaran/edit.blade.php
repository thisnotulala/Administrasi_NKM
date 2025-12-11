@extends('layouts.app')

@section('title', 'Edit Pengeluaran')

@section('content_header')
<h1>Edit Pengeluaran</h1>
@stop

@section('content')

<div class="card p-4">

<form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Proyek</label>
        <select name="proyek_id" class="form-control" required>
            <option value="">-- Pilih Proyek --</option>
            @foreach($proyek as $pr)
                <option value="{{ $pr->id }}" 
                    {{ $pengeluaran->proyek_id == $pr->id ? 'selected' : '' }}>
                    {{ $pr->nama_proyek }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $pengeluaran->tanggal }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Tipe Pengeluaran</label>
        <input type="text" name="tipe" value="{{ $pengeluaran->tipe }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Jumlah</label>
        <input type="number" name="jumlah" value="{{ $pengeluaran->jumlah }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ $pengeluaran->keterangan }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
</form>

</div>

@stop
