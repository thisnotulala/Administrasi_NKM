@extends('layouts.app')

@section('title', 'Data Proyek')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Data Proyek</h3>

    <div>
        <a href="{{ route('proyek.export.pdf') }}"class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Export Proyek
        </a>

        <a href="{{ route('proyek.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Proyek
        </a>
    </div>
</div>


@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body table-responsive">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Lokasi</th>
                    <th>Nilai Kontrak</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($proyek as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_proyek }}</td>
                    <td>{{ $p->client->nama_client }}</td>
                    <td>{{ $p->lokasi }}</td>
                    <td>Rp {{ number_format($p->nilai_kontrak,0,',','.') }}</td>
                    <td>
                        <span class="badge 
                            @if($p->status=='berjalan') badge-success 
                            @elseif($p->status=='tertunda') badge-warning
                            @else badge-secondary @endif">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ route('proyek.show', $p->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('proyek.edit', $p->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                        <form action="{{ route('proyek.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus proyek ini?')">
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

@endsection
