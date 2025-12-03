@extends('layouts.app')

@section('title', 'Data Material')

@section('content_header')
    <h1>Data Material</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <a href="{{ route('material.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Material
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Material</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($materials as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nama_material }}</td>
                    <td>{{ $m->stok }}</td>
                    <td>{{ $m->satuan }}</td>
                    <td>{{ Str::limit($m->keterangan, 50) }}</td>
                    <td>
                        <a href="{{ route('material.edit', $m->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('material.destroy', $m->id) }}" method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data?')" 
                                    class="btn btn-danger btn-sm">
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
