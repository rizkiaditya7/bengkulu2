@extends('front.layout')
@section('content')
<main>
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Artikel</h1>
            <nav class="text-sm font-medium">
                <a href="{{ url('/') }}" class="hover:underline text-blue-600">Beranda</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">Artikel</span>
            </nav>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($artikels as $artikel)
            <a href="{{ route('user.detail-artikel', $artikel->id) }}"
                class="group block bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="overflow-hidden h-56">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        loading="lazy">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-3 text-gray-800 leading-snug group-hover:text-blue-700">
                        {{ $artikel->judul }}
                    </h3>
                    <div class="flex items-center space-x-4 text-xs text-gray-500 mt-4">
                        <span class="flex items-center"><i class="fas fa-user mr-2"></i>Diskominfo</span>
                        <span class="flex items-center"><i
                                class="fas fa-calendar-alt mr-2"></i>{{ \Carbon\Carbon::parse($artikel->tanggal)->translatedFormat('d F Y') }}
                        </span>
                    </div>
                </div>
            </a>
            @empty
            <div class="md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-lg shadow-md">
                <p>Belum ada artikel yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination dinamis dari Laravel --}}
        <div class="mt-16">
            {{ $artikels->links() }}
        </div>
    </section>
</main>
@endsection