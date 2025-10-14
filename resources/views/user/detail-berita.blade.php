@extends('front.layout')
@section('content')
<main class="py-16 md:py-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            <div class="w-full lg:w-2/3">
                <article>
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1 rounded-full">{{ $berita->kategori->nama_kategori }}</span>
                        <a href="{{ url('/') }}#berita" class="text-sm text-blue-600 hover:underline">&larr;
                            Kembali ke Daftar Berita</a>
                    </div>

                    {{-- Judul Berita --}}
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-3 leading-tight">
                        {{ $berita->judul }}
                    </h1>

                    {{-- Meta Info: Tanggal --}}
                    <p class="text-gray-500 mb-6">
                        <i class="fas fa-calendar-alt mr-2"></i>Dipublikasikan pada
                        {{ \Carbon\Carbon::parse($berita->tanggal_kejadian)->translatedFormat('l, d F Y') }}
                    </p>

                    {{-- Gambar Utama Berita --}}
                    <figure class="mb-8">
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                            class="w-full h-auto object-cover rounded-xl shadow-lg">
                    </figure>

                    {{-- 
                            Isi Konten Berita 
                        --}}
                    <div
                        class="prose prose-lg max-w-none prose-p:text-gray-700 prose-headings:text-gray-900 prose-a:text-blue-600 hover:prose-a:text-blue-800">
                        {!! nl2br(e($berita->isi_berita)) !!}

                    </div>

                </article>
            </div>

            {{-- Kolom Sidebar --}}
            <aside class="w-full lg:w-1/3">
                <div class="sticky top-24 space-y-8">

                    {{-- Widget Berita Terbaru --}}
                    <div class="bg-gray-50 p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 border-blue-600 pb-2">Berita
                            Terbaru</h3>
                        <ul class="space-y-4">
                            @foreach ($beritaTerbaru as $item)
                            <li>
                                <a href="{{ route('berita.show', $item->id) }}" class="group">
                                    <h4 class="font-semibold text-gray-800 group-hover:text-blue-700 transition">
                                        {{ $item->judul }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ \Carbon\Carbon::parse($item->tanggal_kejadian)->translatedFormat('d F Y') }}
                                    </p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Widget Kategori --}}
                    <div class="bg-gray-50 p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 border-blue-600 pb-2">Kategori
                        </h3>
                        <ul class="space-y-2">
                            @foreach ($kategori as $kat)
                            <li>
                                <a href="{{ route('user.kategori', $kat->id) }}"
                                    class="flex justify-between items-center text-gray-700 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-md transition">
                                    <span><i
                                            class="fas fa-folder-open text-blue-500 mr-3"></i>{{ $kat->nama_kategori }}</span>
                                    <span
                                        class="text-xs bg-gray-200 px-2 py-0.5 rounded-full">{{ $kat->berita->count() }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </aside>
        </div>
    </div>
</main>
@endsection