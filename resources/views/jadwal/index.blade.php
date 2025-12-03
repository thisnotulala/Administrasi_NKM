@extends('layouts.app')

@section('content')
<h3>Jadwal Proyek</h3>

<a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Proyek</th>
            <th>Tgl Mulai</th>
            <th>Tgl Selesai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwal as $j)
        <tr>
            <td>{{ $j->proyek->nama_proyek }}</td>
            <td>{{ $j->tanggal_mulai }}</td>
            <td>{{ $j->tanggal_selesai }}</td>
            <td>
                <a href="{{ route('jadwal.show', $j->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
