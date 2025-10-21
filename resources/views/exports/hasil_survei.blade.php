<table>
    <thead>
        <tr>
            <th colspan="{{ count($pertanyaans) + 3 }}"><strong>📊 Hasil Survei Kepuasan</strong></th>
        </tr>
        <tr>
            <th>Timestamp</th>
            <th>Nama</th>
            <th>Email</th>
            @foreach ($pertanyaans as $p)
            <th>{{ $p->judul }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($surveis as $s)
        <tr>
            <td>{{ $s->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $s->nama ?? 'Anonim' }}</td>
            <td>{{ $s->email ?? '-' }}</td>
            @foreach ($pertanyaans as $p)
            @php
            $jawaban = $s->jawabans->firstWhere('pertanyaan_id', $p->id);
            @endphp
            <td>{{ $jawaban ? $jawaban->jawaban : '' }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th colspan="4"><strong>📈 Rekap Nilai Unsur</strong></th>
        </tr>
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
            <td>{{ $row['kode'] }}</td>
            <td>{{ $row['pertanyaan'] }}</td>
            <td>{{ $row['nrr_unsur'] }}</td>
            <td>{{ $row['nilai'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th colspan="2"><strong>📋 Ringkasan IKM</strong></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nilai IKM setelah dikonversi</td>
            <td>{{ number_format($ikm_konversi, 1) }}</td>
        </tr>
        <tr>
            <td>Mutu Pelayanan</td>
            <td>{{ $mutu }}</td>
        </tr>
        <tr>
            <td>Kinerja Unit Pelayanan</td>
            <td>{{ $kinerja }}</td>
        </tr>
        <tr>
            <td>Jumlah Responden</td>
            <td>{{ $totalResponden }}</td>
        </tr>
    </tbody>
</table>