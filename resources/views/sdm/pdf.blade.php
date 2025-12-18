<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan SDM</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        h4 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .sub {
            background-color: #fafafa;
            font-style: italic;
        }
    </style>
</head>
<body>

<h2>LAPORAN SDM</h2>
<h4>Data Sumber Daya Manusia & Riwayat Proyek</h4>

@foreach($sdm as $item)

    {{-- ================== DATA SDM ================== --}}
    <table>
        <tr>
            <th width="20%">Nama</th>
            <td>{{ $item->nama }}</td>
            <th width="20%">Jabatan</th>
            <td>{{ $item->jabatan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kontak</th>
            <td>{{ $item->kontak ?? '-' }}</td>
            <th>Keterangan</th>
            <td>{{ $item->keterangan ?? '-' }}</td>
        </tr>
    </table>

    {{-- ================== RIWAYAT PROYEK ================== --}}
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Proyek</th>
                <th>Peran</th>
                <th width="12%">Mulai</th>
                <th width="12%">Selesai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($item->proyeks as $p)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_proyek }}</td>
                    <td>{{ $p->pivot->peran ?? '-' }}</td>
                    <td class="center">
                        {{ $p->pivot->tanggal_mulai
                            ? \Carbon\Carbon::parse($p->pivot->tanggal_mulai)->format('d-m-Y')
                            : '-' }}
                    </td>
                    <td class="center">
                        {{ $p->pivot->tanggal_selesai
                            ? \Carbon\Carbon::parse($p->pivot->tanggal_selesai)->format('d-m-Y')
                            : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="center sub">
                        Belum pernah ditugaskan ke proyek
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <hr style="margin:30px 0;">

@endforeach

<p>
    Dicetak pada: {{ now()->format('d-m-Y H:i') }}
</p>

</body>
</html>
