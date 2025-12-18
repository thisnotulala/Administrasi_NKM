<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengeluaran</title>

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

        .right {
            text-align: right;
        }
    </style>
</head>
<body>

<h2>LAPORAN PENGELUARAN</h2>
<h4>Rekapitulasi Pengeluaran Proyek</h4>

<table>
    <thead>
        <tr>
            <th width="4%">No</th>
            <th width="10%">Tanggal</th>
            <th>Proyek</th>
            <th width="12%">Tipe</th>
            <th width="15%">Jumlah</th>
            <th width="15%">Dibuat Oleh</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pengeluaran as $p)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $p->proyek->nama_proyek ?? '-' }}</td>
                <td>{{ ucfirst($p->tipe) }}</td>
                <td class="right">
                    Rp {{ number_format($p->jumlah, 0, ',', '.') }}
                </td>
                <td>{{ $p->user->name ?? '-' }}</td>
                <td>{{ $p->keterangan ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" align="center">Data pengeluaran tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>

    {{-- TOTAL --}}
    <tfoot>
        <tr>
            <th colspan="4" align="right">TOTAL</th>
            <th class="right">
                Rp {{ number_format($total, 0, ',', '.') }}
            </th>
            <th colspan="2"></th>
        </tr>
    </tfoot>
</table>

<p style="margin-top:25px;">
    Dicetak pada: {{ now()->format('d-m-Y H:i') }}
</p>

</body>
</html>
