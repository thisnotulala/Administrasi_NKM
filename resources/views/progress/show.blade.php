@extends('layouts.app')
@section('title','Detail Progress')

@section('content')
<div class="card">
    <div class="card-header"><h4>Detail Progress</h4></div>
    <div class="card-body">

        <p><strong>Proyek:</strong> {{ $p->proyek->nama_proyek ?? '-' }}</p>
        <p><strong>Progress:</strong> {{ $p->persentase }}%</p>
        <p><strong>Keterangan:</strong> {{ $p->keterangan }}</p>
        <p><strong>Validasi:</strong> {{ $p->validasi }}</p>

        @if($p->foto)
            <p><strong>Foto:</strong></p>
            <img src="{{ asset('storage/'.$p->foto) }}"
                class="img-thumbnail"
                style="max-width:300px">
        @else
            <p><em>Tidak ada foto</em></p>
        @endif

        
        @if($p->validasi === 'ditolak')
            <p><strong>Alasan Penolakan:</strong> {{ $p->alasan }}</p>
        @endif


    </div>
</div>
@endsection
