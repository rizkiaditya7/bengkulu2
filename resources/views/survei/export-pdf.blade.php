<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Survei Kepuasan Masyarakat</title>
    <style>
    body {
        font-family: DejaVu Sans, sans-serif;
        color: #222;
        font-size: 12px;
        margin: 20px;
    }

    h1,
    h2,
    h3 {
        color: #0d6efd;
        text-align: center;
        margin: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #999;
        padding: 6px 8px;
    }

    th {
        background-color: #0d6efd;
        color: #fff;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .center {
        text-align: center;
    }

    .bold {
        font-weight: bold;
    }

    .summary-table {
        margin-top: 20px;
        border: 1px solid #ccc;
    }

    .summary-table td {
        border: 1px solid #ccc;
    }

    .ikm-box {
        margin: 30px auto;
        width: 60%;
        border: 1px solid #555;
    }

    .ikm-box td {
        border: 1px solid #555;
        padding: 8px;
    }

    .bg-gray {
        background: #f0f0f0;
    }

    .text-green {
        color: #0a7a0a;
    }

    .text-blue {
        color: #0055aa;
    }

    .text-lg {
        font-size: 16px;
    }

    .mt-4 {
        margin-top: 20px;
    }

    .page-break {
        page-break-before: always;
    }
    </style>
</head>

<body>
    <h1>📊 Laporan Hasil Survei Kepuasan Masyarakat</h1>
    <h3>UPT BKN PALU</h3>
    <p style="text-align:center; font-size:11px; color:#555;">Dicetak pada: {{ now()->format('d/m/Y H:i') }}</p>

    {{-- Tabel utama --}}
    <table>
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>Nama</th>
                <th>Email</th>
                @foreach ($pertanyaans as $p)
                <th>{{ $p->judul }}</th>
                @endforeach
                <th>Nilai IKM</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surveis as $s)
            <tr>
                <td class="center">{{ $s->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $s->nama ?? 'Anonim' }}</td>
                <td>{{ $s->email ?? '-' }}</td>
                @foreach ($pertanyaans as $p)
                @php
                $jawaban = $s->jawabans->firstWhere('pertanyaan_id', $p->id);
                @endphp
                <td class="center">{{ $jawaban ? $jawaban->jawaban : '' }}</td>
                @endforeach
                <td class="center">-</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Summary --}}
    <table class="summary-table">
        <tr class="bg-gray bold">
            <td colspan="3" class="center">Σ (Jumlah)</td>
            @foreach ($summary as $sum)
            <td class="center">{{ $sum['jumlah'] }}</td>
            @endforeach
        </tr>
        <tr>
            <td colspan="3" class="center bold bg-gray">N (Jumlah Responden)</td>
            @foreach ($summary as $sum)
            <td class="center">{{ $sum['n'] }}</td>
            @endforeach
        </tr>
        <tr>
            <td colspan="3" class="center bold bg-gray">NRR Unsur</td>
            @foreach ($summary as $sum)
            <td class="center">{{ number_format($sum['nrr_unsur'], 2) }}</td>
            @endforeach
        </tr>
        <tr>
            <td colspan="3" class="center bold bg-gray">NRR Tertimbang (×0.11)</td>
            @foreach ($summary as $sum)
            <td class="center">{{ number_format($sum['nrr_tertimbang'], 3) }}</td>
            @endforeach
            <td class="center text-blue bold">
                {{ number_format(array_sum(array_column($summary, 'nrr_tertimbang')), 3) }}</td>
        </tr>
        <tr>
            <td colspan="{{ count($summary) + 3 }}" class="center bold bg-gray text-lg text-green">
                Indeks Kepuasan Masyarakat:
                {{ number_format(array_sum(array_column($summary, 'nrr_tertimbang'))*25, 3) }}
            </td>
        </tr>
    </table>

    <div class="page-break"></div>

    {{-- Rekap hasil --}}
    <h2>📋 Rekap Hasil Unsur Pelayanan</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Pertanyaan</th>
                <th>NRR Unsur</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil as $row)
            <tr>
                <td class="center">{{ $row['kode'] }}</td>
                <td>{{ $row['pertanyaan'] }}</td>
                <td class="center">{{ $row['nrr_unsur'] }}</td>
                <td class="center">{{ $row['nilai'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Nilai Akhir --}}
    <h2 class="mt-4">📈 Ringkasan Nilai IKM</h2>
    <table class="ikm-box">
        <tr class="bg-gray bold">
            <td>Nilai IKM setelah dikonversi</td>
            <td class="text-green text-lg center">{{ $ikm_konversi }}</td>
        </tr>
        <tr>
            <td>Mutu Pelayanan</td>
            <td class="text-blue text-lg center bold">{{ $mutu }}</td>
        </tr>
        <tr>
            <td>Kinerja Unit Pelayanan</td>
            <td class="center italic">{{ $kinerja }}</td>
        </tr>
        <tr>
            <td>Jumlah Responden</td>
            <td class="center">{{ $totalResponden }}</td>
        </tr>
    </table>
</body>

</html>