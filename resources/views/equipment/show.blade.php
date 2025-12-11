@extends('layouts.app')

@section('title', 'Detail Equipment')

@section('content_header')
    <h1>Detail Equipment</h1>
@stop

@section('content')

<div class="card p-4">

    <table class="table">
        <tr>
            <th>Nama Equipment</th>
            <td>{{ $equipment->nama_equipment }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $equipment->jumlah }}</td>
        </tr>
        <tr>
            <th>Kondisi</th>
            <td>{{ $equipment->kondisi }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $equipment->keterangan ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('equipment.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>

@stop
