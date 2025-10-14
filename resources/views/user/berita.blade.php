@extends('front.layout')
@section('content')
<main>
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Berita</h1>
            <nav class="text-sm font-medium">
                <a href="{{ url('/') }}" class="hover:underline text-blue-600">Beranda</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">Berita</span>
            </nav>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-16">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Kita ganti semua blok statis dengan perulangan ini --}}
            @forelse ($berita as $item)
            <a href="{{ route('berita.show', $item->id) }}"
                class="group block bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="overflow-hidden h-56">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-3 text-gray-800 leading-snug group-hover:text-blue-700">
                        {{ $item->judul }}
                    </h3>
                    <div class="flex items-center space-x-4 text-xs text-gray-500 mt-4">
                        {{-- Ganti dengan data penulis jika ada, jika tidak, gunakan default 'Admin' --}}
                        <span class="flex items-center"><i
                                class="fas fa-user mr-2"></i>{{ $item->penulis ?? 'Admin' }}</span>
                        <span class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal_kejadian)->translatedFormat('d F Y') }}
                        </span>
                    </div>
                </div>
            </a>
            @empty
            {{-- Tampilan ini akan muncul jika tidak ada berita sama sekali --}}
            <div class="md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-lg shadow-md">
                <i class="fas fa-newspaper fa-4x text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700">Belum Ada Berita</h3>
                <p class="text-gray-500 mt-1">Saat ini belum ada berita yang dipublikasikan.</p>
            </div>
            @endforelse

        </div>

        <div class="mt-16">
            {{ $berita->links() }}
        </div>

    </section>
</main>
@endsection