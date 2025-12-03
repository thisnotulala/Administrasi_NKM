@extends('layouts.app')

@section('title', 'Data Equipment')

@section('content_header')
    <h1>Data Equipment</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <a href="{{ route('equipment.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Equipment
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Equipment</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($equipment as $e)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $e->nama_equipment }}</td>
                    <td>{{ $e->jumlah }}</td>
                    <td>{{ $e->kondisi }}</td>
                    <td>{{ Str::limit($e->keterangan, 40) }}</td>
                    <td>
                        <a href="{{ route('equipment.show', $e->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('equipment.edit', $e->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('equipment.destroy', $e->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
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
