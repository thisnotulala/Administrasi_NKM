@extends('adminlte::page')

@section('title', 'Data Proyek')

@section('content_header')
    <h1>Data Proyek</h1>
@stop

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Proyek
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Proyek</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($proyek as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_proyek }}</td>
                        <td>{{ Str::limit($p->deskripsi, 50) }}</td>
                        <td>
                            <span class="badge 
                                @if($p->status == 'aktif') badge-success 
                                @elseif($p->status == 'selesai') badge-info 
                                @else badge-warning @endif">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td>{{ $p->tanggal_mulai }}</td>
                        <td>{{ $p->tanggal_selesai }}</td>
                        <td>
                            <a href="{{ route('proyek.show', $p->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('proyek.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('proyek.destroy', $p->id) }}" method="POST" 
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
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
