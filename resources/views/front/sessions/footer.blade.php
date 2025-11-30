<style>
/* Fade-in smooth */
@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

/* Marquee smooth */
@keyframes marquee {
    from {
        transform: translateX(100%);
    }

    to {
        transform: translateX(-100%);
    }
}

.marquee-text {
    display: inline-block;
    opacity: 0;
    animation:
        fadeIn 1.5s ease-in forwards,
        /* muncul smooth */
        marquee 12s linear infinite;
    /* berjalan smooth */
    animation-delay: 0s, 1.5s;
    /* path: fade dulu, lalu jalan */
}

.marquee-text:hover {
    animation-play-state: paused;
}
</style>
<footer class="bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300 text-blue-900 pt-16 pb-8">
    <div class="container mx-auto px-6">
        <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- Tentang Kami --}}
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <h3 class="text-xl font-bold text-blue-900 mb-4">Tentang Kami</h3>
                <p class="text-blue-800/80">
                    {{ $profil->deskripsi ?? '' }}
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="#" class="text-blue-600 hover:text-blue-900 transition-colors"><i
                            class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-pink-500 hover:text-pink-700 transition-colors"><i
                            class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-red-500 hover:text-red-700 transition-colors"><i
                            class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>

            {{-- Navigasi --}}
            <div>
                <h3 class="text-lg font-semibold text-blue-900 mb-4">Navigasi</h3>
                <ul class="space-y-3 text-blue-800/80">
                    <li><a href="#" class="hover:text-blue-900 transition-colors">Profil Daerah</a></li>
                    <li><a href="#" class="hover:text-blue-900 transition-colors">Semua Berita</a></li>
                    <li><a href="#" class="hover:text-blue-900 transition-colors">Galeri Lengkap</a></li>
                    <li><a href="#" class="hover:text-blue-900 transition-colors">Regulasi & Dokumen</a></li>
                </ul>
            </div>

            {{-- PPID --}}
            <div>
                <h3 class="text-lg font-semibold text-blue-900 mb-4">PPID</h3>
                <ul class="space-y-3 text-blue-800/80">
                    <li><a href="#" class="hover:text-blue-900 transition-colors">Profil PPID</a></li>
                    <li><a href="#" class="hover:text-blue-900 transition-colors">Layanan Informasi</a></li>
                    <li><a href="#" class="hover:text-blue-900 transition-colors">Pengajuan Keberatan</a></li>
                </ul>
            </div>

            {{-- Kontak Kami --}}
            <div>
                <h3 class="text-lg font-semibold text-blue-900 mb-4">Kontak Kami</h3>
                <ul class="space-y-3 text-blue-800/80">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mr-3 mt-1 text-blue-700"></i>
                        {{ $profil->alamat ?? '' }}
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone mr-3 mt-1 text-blue-700"></i>
                        {{ $profil->telp ?? '' }}
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope mr-3 mt-1 text-blue-700"></i>
                        {{ $profil->email ?? '' }}
                    </li>
                </ul>
            </div>
        </div> -->
        <div class="mt-6 w-full overflow-hidden">
            <p class="marquee-text whitespace-nowrap text-center text-xl font-semibold text-blue-700">
                Selamat Datang di Buku Tamu — Terima Kasih Telah Berkunjung
            </p>
        </div>

        {{-- Copyright --}}
        <div class="mt-12 border-t border-blue-300 pt-6 text-center text-sm text-blue-700/80">
            <p>&copy; 2025 Hak Cipta Dilindungi. Pemerintah Kabupaten helium01.</p>
        </div>
    </div>
</footer>