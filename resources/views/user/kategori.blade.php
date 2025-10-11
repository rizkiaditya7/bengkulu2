@extends('front.layout')
@section('content')
<main class="py-16 md:py-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            <div class="w-full lg:w-2/3">

                {{-- Judul Kategori --}}
                <div class="mb-8 pb-4 border-b border-gray-200">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">
                        Kategori: {{ $kategori->nama_kategori }}
                    </h1>
                    <p class="mt-2 text-gray-500">Menampilkan berita yang relevan dengan kategori yang Anda pilih.
                    </p>
                </div>

                {{-- Daftar Artikel --}}
                <div class="space-y-10">

                    @forelse ($berita as $item)
                    <article class="flex flex-col md:flex-row gap-6 group">
                        {{-- Gambar --}}
                        <div class="w-full md:w-1/3">
                            <a href="{{ route('berita.show', $item->id) }}">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                    class="w-full h-48 object-cover rounded-xl shadow-lg transition-transform duration-300 group-hover:scale-105">
                            </a>
                        </div>

                        {{-- Konten Teks --}}
                        <div class="w-full md:w-2/3">
                            <p class="text-sm text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal_kejadian)->translatedFormat('d F Y') }}
                            </p>
                            <h2 class="text-xl font-bold text-gray-800 mb-2 leading-snug">
                                <a href="{{ route('berita.show', $item->id) }}"
                                    class="group-hover:text-blue-700 transition">
                                    {{ $item->judul }}
                                </a>
                            </h2>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                {{-- Mengambil kutipan dari isi berita dan membatasinya --}}
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi_berita), 150, '...') }}
                            </p>
                            <a href="{{ route('berita.show', $item->id) }}"
                                class="font-semibold text-blue-600 hover:text-blue-800 transition">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </article>
                    @empty
                    {{-- Pesan jika tidak ada berita dalam kategori ini --}}
                    <div class="text-center py-12 bg-gray-50 rounded-lg">
                        <i class="fas fa-newspaper fa-3x text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700">Belum Ada Berita</h3>
                        <p class="text-gray-500 mt-1">Saat ini belum ada berita yang dipublikasikan dalam
                            kategori ini.</p>
                    </div>
                    @endforelse

                </div>

                {{-- Navigasi Halaman (Pagination) --}}
                <div class="mt-12">
                    {{ $berita->links() }}
                </div>

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
                            @foreach ($semuaKategori as $kat)
                            <li>
                                {{-- Tambahkan logika untuk menandai kategori aktif --}}
                                <a href="{{ route('user.kategori', $kat->id) }}"
                                    class="flex justify-between items-center p-2 rounded-md transition
                                            {{ $kategori->id == $kat->id ? 'bg-blue-100 text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-700 hover:bg-blue-50' }}">
                                    <span><i
                                            class="fas fa-folder-open text-blue-500 mr-3"></i>{{ $kat->nama_kategori }}</span>
                                    <span
                                        class="text-xs {{ $kategori->id == $kat->id ? 'bg-blue-200 text-blue-800' : 'bg-gray-200' }} px-2 py-0.5 rounded-full">{{ $kat->berita->count() }}</span>
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