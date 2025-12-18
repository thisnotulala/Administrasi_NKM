<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Progress Proyek</title>

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
            margin-bottom: 15px;
            font-weight: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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
    </style>
</head>
<body>

<h2>LAPORAN PROGRESS PROYEK</h2>
<h4>Monitoring Kemajuan Proyek</h4>

<table>
    <thead>
        <tr>
            <th width="4%">No</th>
            <th>Proyek</th>
            <th width="10%">Progress</th>
            <th width="12%">Status</th>
            <th>Dibuat Oleh</th>
            <th>Keterangan</th>
            <th>Alasan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($progress as $p)
            <tr>
                <td class="center">{{ $loop->iteration }}</td>
                <td>{{ $p->proyek->nama_proyek ?? '-' }}</td>
                <td class="center">{{ $p->persentase }}%</td>
                <td class="center">
                    @if($p->validasi === 'valid')
                        VALID
                    @elseif($p->validasi === 'ditolak')
                        DITOLAK
                    @else
                        MENUNGGU
                    @endif
                </td>
                <td>{{ $p->user->name ?? '-' }}</td>
                <td>{{ $p->keterangan ?? '-' }}</td>
                <td>{{ $p->alasan ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="center">
                    Data progress belum tersedia
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<p style="margin-top:25px;">
    Dicetak pada: {{ now()->format('d-m-Y H:i') }}
</p>

</body>
</html>
