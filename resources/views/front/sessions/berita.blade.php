<section id="berita" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800">Berita & Informasi Daerah</h2>
            <p class="text-lg text-gray-500 mt-2">Ikuti perkembangan terbaru dari program dan kegiatan kami.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($beritas as $berita)
            <a href="{{ route('berita.show', $berita->id) }}"
                class="group block bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="overflow-hidden rounded-t-xl h-56">
                    <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    {{-- Kategori berita --}}
                    <p class="text-blue-600 text-sm font-semibold mb-2">
                        {{ $berita->kategori->nama_kategori }}
                    </p>

                    {{-- Judul berita --}}
                    <h3 class="font-bold text-xl mb-3 text-gray-800 leading-snug group-hover:text-blue-700">
                        {{ $berita->judul }}
                    </h3>

                    {{-- Tanggal berita --}}
                    <p class="text-gray-500 text-sm">
                        {{ \Carbon\Carbon::parse($berita->tanggal_kejadian)->translatedFormat('l, d F Y') }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>