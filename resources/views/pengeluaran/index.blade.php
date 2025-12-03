@extends('layouts.app')

@section('title', 'Data Pengeluaran')

@section('content_header')
<h1>Data Pengeluaran</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengeluaran
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Proyek</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pengeluaran as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->proyek->nama_proyek }}</td>
                    <td>{{ ucfirst($p->tipe) }}</td>
                    <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $p->user->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pengeluaran.show', $p->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('pengeluaran.edit', $p->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pengeluaran.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@stop
