@extends('layouts.app')

@section('title', 'Edit Pengeluaran')

@section('content_header')
    <h1>Edit Pengeluaran</h1>
@stop

@section('content')

<div class="card p-4">

<form action="{{ route('pengeluaran.update', $p->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Proyek</label>
        <select name="proyek_id" class="form-control">
            @foreach($proyek as $pr)
            <option value="{{ $pr->id }}" @if($p->proyek_id == $pr->id) selected @endif>
                {{ $pr->nama_proyek }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $p->tanggal }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori" class="form-control">
            <option value="Material" @selected($p->kategori=='Material')>Material</option>
            <option value="Operasional" @selected($p->kategori=='Operasional')>Operasional</option>
            <option value="Gaji" @selected($p->kategori=='Gaji')>Gaji</option>
        </select>
    </div>

    <div class="form-group">
        <label>Nama Transaksi</label>
        <input type="text" name="tipe" value="{{ $p->tipe }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Jumlah</label>
        <input type="number" name="jumlah" value="{{ $p->jumlah }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ $p->keterangan }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>

@stop
