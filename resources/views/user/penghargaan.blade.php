@extends('front.layout')
@section('content')
<main>
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Penghargaan</h1>
            <nav class="text-sm font-medium">
                <a href="{{ url('/') }}" class="hover:underline text-blue-600">Beranda</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">Penghargaan</span>
            </nav>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-16">

        <div class="max-w-4xl mx-auto mb-10">
            <form action="{{ route('user.penghargaan') }}" method="GET"
                class="bg-white p-4 rounded-xl shadow-md flex flex-col sm:flex-row items-center gap-4">
                <label for="tahun" class="font-semibold text-gray-700 flex-shrink-0">Filter berdasarkan
                    Tahun:</label>
                <select name="tahun" id="tahun"
                    class="w-full sm:w-auto border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">-- Tampilkan Semua Tahun --</option>
                    @foreach ($tahuns as $tahun)
                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                        {{ $tahun }}
                    </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="w-full sm:w-auto bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">Filter</button>
                <a href="{{ route('user.penghargaan') }}"
                    class="w-full sm:w-auto text-center bg-gray-200 text-gray-700 px-5 py-2 rounded-md hover:bg-gray-300">Reset</a>
            </form>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="space-y-10">
                @forelse ($penghargaans as $penghargaan)
                <div class="flex items-start space-x-6 bg-white p-6 rounded-xl shadow-md">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-trophy fa-2x text-yellow-500"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $penghargaan->nama_penghargaan }}</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            Diberikan oleh <strong>{{ $penghargaan->pemberi }}</strong> - Tahun
                            <strong>{{ $penghargaan->tahun }}</strong>
                        </p>
                        @if ($penghargaan->deskripsi)
                        <p class="text-gray-700 mt-3 leading-relaxed">
                            {{ $penghargaan->deskripsi }}
                        </p>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-16 bg-white rounded-lg shadow-md">
                    <i class="fas fa-search-minus fa-4x text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Data Tidak Ditemukan</h3>
                    <p class="text-gray-500 mt-1">
                        @if (request('tahun'))
                        Tidak ada penghargaan yang ditemukan untuk tahun {{ request('tahun') }}.
                        @else
                        Saat ini belum ada data penghargaan yang ditambahkan.
                        @endif
                    </p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection