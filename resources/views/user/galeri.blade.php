@extends('front.layout')
@section('content')
<main>
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Galeri Foto</h1>
            <nav class="text-sm font-medium">
                <a href="#" class="hover:underline text-blue-600">Beranda</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">Galeri</span>
            </nav>
        </div>
    </section>

    <section id="galeri" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800">Galeri Album</h2>
                <p class="text-lg text-gray-500 mt-2">Lihat dokumentasi kegiatan melalui album.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($albums as $album)
                <a href="{{ route('album.show', $album->id) }}"
                    class="group relative rounded-xl shadow-lg overflow-hidden cursor-pointer">
                    <img src="{{ $album->cover ? asset('storage/' . $album->cover->path) : 'https://via.placeholder.com/600x400.png?text=No+Cover' }}"
                        alt="Thumbnail {{ $album->nama }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center">
                        <i
                            class="fas fa-images text-7xl text-white/80 transform group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-white font-bold text-lg">{{ $album->nama }}</h3>
                        <p class="text-white text-sm">{{ $album->photos->count() }} foto</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</main>

<div id="lightbox" class="lightbox">
    <span class="lightbox-close" id="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightbox-image">
    <div id="lightbox-caption" class="lightbox-caption"></div>
</div>
@endsection