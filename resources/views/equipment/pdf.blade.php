<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Equipment</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
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
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>LAPORAN EQUIPMENT</h2>
<h4>Daftar Equipment Proyek</h4>

<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Nama Equipment</th>
            <th width="10%">Jumlah</th>
            <th width="15%">Kondisi</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($equipment as $e)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $e->nama_equipment }}</td>
                <td align="center">{{ $e->jumlah }}</td>
                <td>{{ $e->kondisi }}</td>
                <td>{{ $e->keterangan ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" align="center">Data equipment tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>

<p style="margin-top:30px;">
    Dicetak pada: {{ now()->format('d-m-Y H:i') }}
</p>

</body>
</html>
