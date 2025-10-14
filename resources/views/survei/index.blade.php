@extends('front.layout')
@section('content')
<main>
    <div class="p-6 bg-gray-100 text-gray-900">

        <h2 class="text-xl font-bold text-blue-700 mb-4">📊 Hasil Survei Kepuasan</h2>

        <div class="overflow-x-auto bg-white p-4 rounded shadow">
            <table class="min-w-full border text-sm">
                <thead class="bg-blue-100 text-blue-800">
                    <tr>
                        <th class="border px-2 py-1 text-center">Timestamp</th>
                        <th class="border px-2 py-1 text-center">Nama</th>
                        <th class="border px-2 py-1 text-center">Email</th>
                        @foreach ($pertanyaans as $p)
                        <th class="border px-2 py-1 text-center">{{ $p->judul }}</th>
                        @endforeach
                        <th class="border px-2 py-1 text-center">Nilai IKM</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveis as $s)
                    <tr class="hover:bg-blue-50">
                        <td class="border px-2 py-1 text-center">{{ $s->created_at->format('d/m/Y H:i') }}</td>
                        <td class="border px-2 py-1">
                            {{ $s->nama ? $s->nama : 'Anonim' }}
                        </td>
                        <td class="border px-2 py-1">
                            {{ $s->email ? $s->email : '-' }}
                        </td>
                        @foreach ($pertanyaans as $p)
                        @php
                        $jawaban = $s->jawabans->firstWhere('pertanyaan_id', $p->id);
                        @endphp
                        <td class="border px-2 py-1 text-center">
                            {{ $jawaban ? $jawaban->jawaban : '' }}
                        </td>
                        @endforeach
                    </tr>
                    @endforeach

                    {{-- Baris Σ --}}
                    <tr class="bg-gray-100 font-semibold">
                        <td class="border px-2 py-1 text-center" colspan="3">Σ (Jumlah)</td>
                        @foreach ($summary as $sum)
                        <td class="border px-2 py-1 text-center">{{ $sum['jumlah'] }}</td>
                        @endforeach
                    </tr>

                    {{-- Baris N --}}
                    <tr class="bg-gray-50 font-semibold">
                        <td class="border px-2 py-1 text-center" colspan="3">N (Jumlah Responden)</td>
                        @foreach ($summary as $sum)
                        <td class="border px-2 py-1 text-center">{{ $sum['n'] }}</td>
                        @endforeach
                    </tr>

                    {{-- Baris NRR Unsur --}}
                    <tr class="bg-yellow-50 font-semibold">
                        <td class="border px-2 py-1 text-center" colspan="3">NRR Unsur</td>
                        @foreach ($summary as $sum)
                        <td class="border px-2 py-1 text-center">{{ number_format($sum['nrr_unsur'], 2) }}</td>
                        @endforeach
                    </tr>

                    {{-- Baris NRR Tertimbang --}}
                    <tr class="bg-green-50 font-semibold">
                        <td class="border px-2 py-1 text-center" colspan="3">NRR Tertimbang (×0.11)</td>
                        @foreach ($summary as $sum)
                        <td class="border px-2 py-1 text-center">{{ number_format($sum['nrr_tertimbang'], 3) }}</td>
                        @endforeach
                        <td class="border px-2 py-1 text-center">
                            {{ number_format(array_sum(array_column($summary, 'nrr_tertimbang')), 3) }}</td>
                    </tr>
                    {{-- Baris Nilai IKM --}}
                    <tr class="bg-yellow-50 font-semibold">
                        <td class="border px-2 py-1 text-center" colspan="12">Indek Kepuasan Masyarakat</td>
                        <td class="border px-2 py-1 text-center">
                            {{ number_format(array_sum(array_column($summary, 'nrr_tertimbang'))*25, 3) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="text-xl font-bold text-blue-700 mb-4">📊 Hasil Survei</h2>

        <table class="min-w-full border text-sm bg-white rounded shadow">
            <thead class="bg-blue-100 text-blue-800">
                <tr>
                    <th class="border px-3 py-2">Kode</th>
                    <th class="border px-3 py-2">Pertanyaan</th>
                    <th class="border px-3 py-2">NRR Unsur</th>
                    <th class="border px-3 py-2">Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasil as $index => $row)
                <tr class="hover:bg-blue-50">
                    <td class="border px-3 py-2 text-center">{{ $row['kode']}}</td>
                    <td class="border px-3 py-2">{{ $row['pertanyaan'] }}</td>
                    <td class="border px-3 py-2 text-center">{{ $row['nrr_unsur'] }}</td>
                    <td class="border px-3 py-2 text-center">{{ $row['nilai'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-8 w-full max-w-lg mx-auto">
            <table class="w-full border border-gray-400 text-sm text-center">
                <tbody>
                    <tr class="bg-gray-100 font-semibold">
                        <td class="border border-gray-400 px-3 py-2 text-left">Nilai IKM setelah dikonversi</td>
                        <td class="border border-gray-400 px-3 py-2 font-bold text-green-800 bg-green-300 text-lg">
                            {{ number_format($ikm_konversi, 1) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-3 py-2 text-left bg-gray-100 font-semibold">Mutu Pelayanan
                        </td>
                        <td class="border border-gray-400 px-3 py-2 font-bold text-blue-800 bg-blue-200 text-lg">
                            {{ $mutu }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-3 py-2 text-left bg-gray-100 font-semibold">Kinerja Unit
                            Pelayanan</td>
                        <td class="border border-gray-400 px-3 py-2 font-bold italic text-blue-900 bg-blue-100">
                            {{ $kinerja }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-3 py-2 text-left bg-gray-100 font-semibold">Jumlah
                            Responden</td>
                        <td class="border border-gray-400 px-3 py-2 font-bold text-gray-800">
                            {{ $totalResponden }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 p-3 bg-yellow-50 border-l-4 border-yellow-500">
            <p><strong>Total Responden:</strong> {{ $totalResponden }}</p>
        </div>

        @foreach ($data as $survei)
        <div class="bg-white rounded shadow p-4 mb-4">
            <h3 class="font-semibold text-lg mb-2">{{ $survei->nama ?? 'Anonim' }}
                <span class="text-sm text-gray-500">({{ $survei->email ?? '-' }})</span>
            </h3>
            <ul class="list-disc ml-6 text-sm">
                @foreach ($survei->jawabans as $jawaban)
                <li>
                    <strong>{{ $jawaban->pertanyaan->judul }}:</strong> {{ $jawaban->jawaban }}
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</main>
@endsection