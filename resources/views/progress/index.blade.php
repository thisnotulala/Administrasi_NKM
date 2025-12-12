@extends('layouts.app')
@section('title','Data Progress')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Data Progress</h4>
        <a href="/progress/create" class="btn btn-primary">Tambah Progress</a>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Proyek</th>
                    <th>Progress (%)</th>
                    <th>Aksi</th>
                    <th>Alasan</th> {{-- kolom alasan --}}
                </tr>
            </thead>

            <tbody>
                @foreach($progress as $p)
                <tr>
                    <td>{{ $p->proyek->nama_proyek ?? '-' }}</td>
                    <td>{{ $p->persentase }}%</td>

                    <td>
                        {{-- Detail --}}
                        <a href="{{ route('progress.show', $p->id) }}" class="btn btn-info btn-sm">
                            Detail
                        </a>

                        {{-- ACC --}}
                        <form action="{{ route('progress.validate', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-success btn-sm">
                                ✔ ACC
                            </button>
                        </form>

                        {{-- Tolak --}}
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#revisiModal{{ $p->id }}">
                            ✘ Tolak
                        </button>
                    </td>

                    {{-- Menampilkan alasan --}}
                    <td>
                        {{ $p->alasan ?? '-' }}
                    </td>
                </tr>

                {{-- =======================
                    MODAL REVISI
                ======================== --}}
                <div class="modal fade" id="revisiModal{{ $p->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Tolak Progress</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>

                            <form action="{{ route('progress.revisi', $p->id) }}" method="POST">
                                @csrf
                                
                                <div class="modal-body">
                                    <label>Alasan Penolakan</label>
                                    <textarea name="alasan" class="form-control"
                                        rows="3" placeholder="Tuliskan alasan..." required></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Kirim Revisi</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
