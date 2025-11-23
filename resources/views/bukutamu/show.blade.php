@extends('front.layout')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6">

    {{-- Judul --}}
    <div class="flex items-center justify-center mb-4 space-x-2">
        <i class="fas fa-user text-purple-600 text-xl"></i>
        <h2 class="text-2xl font-bold text-gray-800">Detail Buku Tamu</h2>
    </div>

    {{-- Konten --}}
    <div class="space-y-3 text-center">

        <p><span class="font-semibold text-gray-700">Nama:</span> {{ $bukutamu->nama }}</p>
        <p><span class="font-semibold text-gray-700">No. HP:</span> {{ $bukutamu->no_hp }}</p>
        <p><span class="font-semibold text-gray-700">Jabatan:</span> {{ $bukutamu->jabatan }}</p>
        <p><span class="font-semibold text-gray-700">Instansi:</span> {{ $bukutamu->instansi }}</p>
        <p><span class="font-semibold text-gray-700">Tujuan Kunjungan:</span> {{ $bukutamu->tujuan }}</p>

        <div class="pt-4">
            <p class="font-semibold text-gray-700 mb-2">Foto:</p>

            @if ($bukutamu->foto)
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $bukutamu->foto) }}"
                    class="w-56 rounded-xl shadow-md border border-gray-200 object-cover" />
            </div>
            @else
            <p class="text-gray-500 italic">Tidak ada foto</p>
            @endif
        </div>

    </div>

    {{-- Tombol --}}
    <div class="mt-6 text-center">
        <a href="{{ route('bukutamu.index') }}"
            class="px-5 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-900 transition">
            Kembali
        </a>
    </div>

</div>

@endsection