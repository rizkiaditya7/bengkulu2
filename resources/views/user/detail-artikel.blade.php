@extends('front.layout')
@section('content')
<main class="py-16 md:py-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            <div class="w-full lg:w-2/3">
                <article>
                    <div class="mb-4">
                        <a href="{{ route('user.artikel') }}" class="text-sm text-blue-600 hover:underline">&larr;
                            Kembali ke Daftar Artikel</a>
                    </div>

                    {{-- Judul Artikel --}}
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-3 leading-tight">
                        {{ $artikel->judul }}
                    </h1>

                    {{-- Meta Info: Tanggal dan Penulis --}}
                    <p class="text-gray-500 mb-6">
                        <i class="fas fa-user mr-2"></i>Diskominfo
                        <span class="mx-2">|</span>
                        <i class="fas fa-calendar-alt mr-2"></i>Dipublikasikan pada
                        {{ \Carbon\Carbon::parse($artikel->tanggal)->translatedFormat('l, d F Y') }}

                    </p>

                    {{-- Gambar Utama Artikel --}}
                    @if ($artikel->gambar)
                    <figure class="mb-8">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                            class="w-full h-auto object-cover rounded-xl shadow-lg">
                    </figure>
                    @endif

                    {{-- 
                            Isi Konten Artikel
                            Gunakan {!! !!} agar tag HTML seperti <p>, <ul>, <b> dari editor teks bisa dirender.
                        --}}
                    <div
                        class="prose prose-lg max-w-none prose-p:text-gray-700 prose-headings:text-gray-900 prose-a:text-blue-600 hover:prose-a:text-blue-800">
                        {!! $artikel->isi !!}
                    </div>

                </article>
            </div>

            {{-- Kolom Sidebar --}}
            <aside class="w-full lg:w-1/3">
                <div class="sticky top-24 space-y-8">

                    {{-- Widget Artikel Terbaru --}}
                    <div class="bg-gray-50 p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 border-blue-600 pb-2">Artikel
                            Terbaru</h3>
                        <ul class="space-y-4">
                            @forelse ($artikelTerbaru as $item)
                            <li>
                                <a href="{{ route('user.detail-artikel', $item->id) }}" class="group">
                                    <h4 class="font-semibold text-gray-800 group-hover:text-blue-700 transition">
                                        {{ $item->judul }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                                    </p>
                                </a>
                            </li>
                            @empty
                            <li>
                                <p class="text-sm text-gray-500">Tidak ada artikel lain.</p>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>
@endsection