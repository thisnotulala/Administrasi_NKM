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
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Alasan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($progress as $p)
                <tr>
                    <td>{{ $p->proyek->nama_proyek ?? '-' }}</td>
                    <td>{{ $p->persentase }}%</td>

                    {{-- STATUS --}}
                    <td>
                        @if($p->validasi === 'valid')
                            <span class="badge badge-success">Valid</span>
                        @else
                            <span class="badge badge-warning">Menunggu</span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td>
                        <a href="{{ route('progress.show', $p->id) }}"
                        class="btn btn-info btn-sm">Detail</a>

                        {{-- TOMBOL HANYA MUNCUL JIKA BELUM VALID --}}
                        @if($p->validasi === 'tidak valid')

                            <form action="{{ route('progress.validate', $p->id) }}"
                                method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    ✔ ACC
                                </button>
                            </form>

                            <button class="btn btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#revisiModal{{ $p->id }}">
                                ✘ Tolak
                            </button>

                        @endif
                    </td>


                    {{-- ALASAN --}}
                    <td>{{ $p->alasan ?? '-' }}</td>
                </tr>

                {{-- MODAL REVISI --}}
                <div class="modal fade" id="revisiModal{{ $p->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('progress.revisi', $p->id) }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Tolak Progress</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <label>Alasan Penolakan</label>
                                    <textarea name="alasan" class="form-control"
                                              rows="3" required></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                    <button class="btn btn-danger">Kirim Revisi</button>
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
