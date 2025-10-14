@extends('front.layout')
@section('content')
<main>
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between md:items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-slate-800">{{ $album->nama }}</h1>
                <p class="text-gray-500 mt-1">{{ $album->deskripsi }}</p>
            </div>
            <nav class="text-sm font-medium">
                <a href="{{ route('dashboard') }}" class="hover:underline text-blue-600">Beranda</a>
                <span class="mx-2 text-gray-500">/</span>
                <a href="{{ route('user.galeri') }}" class="hover:underline text-blue-600">Galeri</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">{{ $album->nama }}</span>
            </nav>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-16">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @forelse ($album->photos as $photo)
            <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer aspect-square">
                <img src="{{ asset('storage/' . $photo->path) }}"
                    alt="{{ $photo->description ?? 'Foto dari galeri ' . $album->nama }}"
                    class="h-full w-full object-cover transform transition-transform duration-300 group-hover:scale-110 gallery-image">
                <div
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fas fa-search-plus text-white text-3xl"></i>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <i class="fas fa-camera-retro text-5xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600">Album ini masih kosong</h3>
                <p class="text-gray-400">Belum ada foto yang ditambahkan ke dalam album ini.</p>
            </div>
            @endforelse

        </div>
    </section>
</main>

<div id="lightbox" class="lightbox">
    <span class="lightbox-close" id="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightbox-image">
    <div id="lightbox-caption" class="lightbox-caption"></div>
</div>
@endsection