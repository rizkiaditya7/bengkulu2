@extends('front.layout')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6">

    {{-- Judul --}}
    <div class="flex items-center justify-center mb-6 space-x-2">
        <i class="fas fa-user text-purple-600 text-xl"></i>
        <h2 class="text-2xl font-bold text-gray-800">Detail Buku Tamu</h2>
    </div>

    {{-- Tabel Detail --}}
    <table class="w-full text-left border-collapse">
        <tbody>
            <tr class="border-b">
                <td class="py-2 font-semibold text-gray-700 w-44">Nama</td>
                <td class="py-2 text-gray-800">{{ $bukutamu->nama }}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2 font-semibold text-gray-700">No. HP</td>
                <td class="py-2 text-gray-800">{{ $bukutamu->no_hp }}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2 font-semibold text-gray-700">Jabatan</td>
                <td class="py-2 text-gray-800">{{ $bukutamu->jabatan }}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2 font-semibold text-gray-700">Instansi</td>
                <td class="py-2 text-gray-800">{{ $bukutamu->instansi }}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2 font-semibold text-gray-700">Tujuan Kunjungan</td>
                <td class="py-2 text-gray-800">{{ $bukutamu->tujuan }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Foto --}}
    <div class="pt-6 text-center">
        <p class="font-semibold text-gray-700 mb-2">Foto:</p>

        @if ($bukutamu->foto)
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $bukutamu->foto) }}"
                class="w-56 rounded-xl shadow-md border border-gray-300 object-cover" />
        </div>
        @else
        <p class="text-gray-500 italic">Tidak ada foto</p>
        @endif
    </div>

    {{-- Tombol --}}
    <div class="mt-8 text-center">
        <a href="{{ route('bukutamu.index') }}"
            class="px-5 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-900 transition">
            Kembali
        </a>
    </div>

</div>
@endsection