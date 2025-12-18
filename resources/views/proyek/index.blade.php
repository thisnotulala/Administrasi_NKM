@extends('layouts.app')

@section('title', 'Data Proyek')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Data Proyek</h3>

    <div>
        <a href="{{ route('proyek.export.pdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Export Proyek
        </a>

        <a href="{{ route('proyek.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Proyek
        </a>
    </div>
</div>

{{-- ALERT --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

<div class="card">
    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th width="40">#</th>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Lokasi</th>
                    <th>Nilai Kontrak</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($proyek as $p)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_proyek }}</td>
                    <td>{{ $p->client->nama_client }}</td>
                    <td>{{ $p->lokasi }}</td>
                    <td>Rp {{ number_format($p->nilai_kontrak,0,',','.') }}</td>

                    {{-- STATUS --}}
                    <td class="text-center">
                        <span class="badge 
                            @if($p->status == 'berjalan') badge-success
                            @elseif($p->status == 'tertunda') badge-warning
                            @else badge-secondary
                            @endif">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>

                    {{-- AKSI --}}
                    <td class="text-center">
                        <div class="d-inline-flex align-items-center">

                            {{-- SHOW --}}
                            <a href="{{ route('proyek.show', $p->id) }}"
                            class="btn btn-info btn-xs mr-1"
                            title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('proyek.edit', $p->id) }}"
                            class="btn btn-warning btn-xs mr-1"
                            title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('proyek.destroy', $p->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-xs"
                                        title="Hapus"
                                        onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>


                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        <i class="fas fa-folder-open fa-2x mb-2 d-block"></i>
                        Belum ada data proyek
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
