@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ ucfirst($u->role) }}</td>
                    <td>
                        <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('user.destroy', $u->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus user?')">Hapus</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
