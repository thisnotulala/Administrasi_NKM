@extends('layouts.app')

@section('title', 'Tambah Pengeluaran')

@section('content_header')
<h1>Tambah Pengeluaran</h1>
@stop

@section('content')

<div class="card p-4">
    <form action="{{ route('pengeluaran.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                <option value="">Pilih Proyek</option>
                @foreach($proyek as $p)
                <option value="{{ $p->id }}">{{ $p->nama_proyek }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tipe Pengeluaran</label>
            <select name="tipe" class="form-control">
                <option value="material">Pembelian Material</option>
                <option value="operasional">Biaya Operasional</option>
                <option value="gaji">Gaji / Upah Pekerja</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@stop
