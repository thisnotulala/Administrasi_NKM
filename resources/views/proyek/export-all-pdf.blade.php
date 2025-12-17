<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penugasan SDM</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        h2, h4 {
            text-align: center;
            margin: 0;
        }

        h4 {
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
            padding: 6px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>LAPORAN PENUGASAN SDM</h2>
<h4>Seluruh Proyek</h4>

@foreach($proyeks as $proyek)

    <h4 style="text-align:left; margin-top:20px;">
        Proyek: {{ $proyek->nama_proyek }}
    </h4>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama SDM</th>
                <th>Jabatan</th>
                <th>Peran</th>
                <th>Tgl Mulai</th>
                <th>Tgl Selesai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($proyek->sdms as $sdm)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $sdm->nama }}</td>
                    <td>{{ $sdm->jabatan }}</td>
                    <td>{{ $sdm->pivot->peran }}</td>
                    <td>
                        {{ $sdm->pivot->tanggal_mulai
                            ? \Carbon\Carbon::parse($sdm->pivot->tanggal_mulai)->format('d-m-Y')
                            : '-' }}
                    </td>
                    <td>
                        {{ $sdm->pivot->tanggal_selesai
                            ? \Carbon\Carbon::parse($sdm->pivot->tanggal_selesai)->format('d-m-Y')
                            : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">
                        Tidak ada SDM ditugaskan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endforeach

</body>
</html>
