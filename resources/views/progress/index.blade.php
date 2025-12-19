@extends('layouts.app')
@section('title','Data Progress')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Data Progress</h4>

        <div>
            <a href="{{ route('progress.export.pdf') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>

            <a href="/progress/create" class="btn btn-primary">
                Tambah Progress
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
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
                        @elseif($p->validasi === 'ditolak')
                            <span class="badge badge-danger">Ditolak</span>
                        @else
                            <span class="badge badge-warning">Menunggu</span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td>
                        <a href="{{ route('progress.show', $p->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        @if($p->validasi === 'pending')
                            <form action="{{ route('progress.validate', $p->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm"
                                        onclick="return confirm('Yakin ACC progress ini?')">
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- ================= MODAL TOLAK (DIPINDAHKAN KE LUAR TABLE) ================= --}}
@foreach($progress as $p)
@if($p->validasi === 'pending')
<div class="modal fade" id="revisiModal{{ $p->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
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
                    <div class="form-group">
                        <label>Alasan Penolakan</label>
                        <textarea name="alasan"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan alasan penolakan"
                                  required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-danger">
                        Kirim Penolakan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endif
@endforeach
@endsection
