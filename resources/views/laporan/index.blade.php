@extends('layouts.app')
@section('title','Laporan Proyek')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Pilih Proyek</h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyeks as $p)
                <tr>
                    <td>{{ $p->nama_proyek }}</td>
                    <td>
                        <a href="{{ route('laporan.show', $p->id) }}"
                           class="btn btn-primary btn-sm">
                           Lihat Laporan
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
