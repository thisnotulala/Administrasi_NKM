@extends('layouts.app')

@section('content')
<h3>Detail Jadwal Proyek</h3>

<p><b>Tanggal Mulai:</b> {{ $jadwal->tanggal_mulai }}</p>
<p><b>Tanggal Selesai:</b> {{ $jadwal->tanggal_selesai }}</p>

<hr>

<h4>Histori Perubahan Jadwal</h4>

<table class="table">
    <thead>
        <tr>
            <th>User</th>
            <th>Mulai Lama</th>
            <th>Mulai Baru</th>
            <th>Selesai Lama</th>
            <th>Selesai Baru</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwal->logs as $log)
        <tr>
            <td>{{ $log->user->name ?? '-' }}</td>
            <td>{{ $log->tanggal_mulai_lama }}</td>
            <td>{{ $log->tanggal_mulai_baru }}</td>
            <td>{{ $log->tanggal_selesai_lama }}</td>
            <td>{{ $log->tanggal_selesai_baru }}</td>
            <td>{{ $log->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
