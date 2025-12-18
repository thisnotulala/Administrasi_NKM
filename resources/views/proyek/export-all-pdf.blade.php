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
            margin-bottom: 15px;
            font-weight: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background-color: #f2f2f2;
        }

        .label {
            width: 30%;
            background-color: #f9f9f9;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>LAPORAN Data Proyek</h2>

@foreach($proyeks as $proyek)

    {{-- ================= DETAIL PROYEK ================= --}}
    <table>
        <tr>
            <td class="label">Nama Proyek</td>
            <td>{{ $proyek->nama_proyek }}</td>
        </tr>
        <tr>
            <td class="label">Client</td>
            <td>{{ $proyek->client->nama_client ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Lokasi</td>
            <td>{{ $proyek->lokasi }}</td>
        </tr>
        <tr>
            <td class="label">Nilai Kontrak</td>
            <td>Rp {{ number_format($proyek->nilai_kontrak, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Rencana Mulai</td>
            <td>{{ \Carbon\Carbon::parse($proyek->tanggal_mulai)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="label">Rencana Selesai</td>
            <td>{{ \Carbon\Carbon::parse($proyek->tanggal_selesai)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="label">Durasi</td>
            <td>{{ $proyek->durasi }} hari</td>
        </tr>
        <tr>
            <td class="label">Status</td>
            <td>{{ $proyek->status }}</td>
        </tr>
        <tr>
            <td class="label">Deskripsi</td>
            <td>{{ $proyek->deskripsi ?? '-' }}</td>
        </tr>
    </table>

    {{-- ================= SDM DITUGASKAN ================= --}}
    <h4 style="text-align:left;">SDM yang Ditugaskan</h4>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
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

    <hr style="margin:30px 0;">

@endforeach

</body>
</html>
