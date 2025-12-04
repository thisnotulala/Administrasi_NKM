@extends('layouts.app')

@section('title','Data Client')

@section('content')
<h3>Data Client</h3>

<a href="{{ route('client.create') }}" class="btn btn-primary mb-3">Tambah Client</a>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Nama Client</th>
        <th>Email</th>
        <th>Telp</th>
        <th>Alamat</th>
    </tr>

    @foreach($clients as $c)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $c->nama_client }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->telepon }}</td>
        <td>{{ $c->alamat }}</td>
    </tr>
    @endforeach
</table>
@endsection
