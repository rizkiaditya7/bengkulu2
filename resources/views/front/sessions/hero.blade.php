<section class="py-12 md:py-20 bg-gray-100">
    <div class="container mx-auto px-6">

        <div class="swiper hero-slider relative rounded-xl shadow-lg overflow-hidden">
            <div class="swiper-wrapper">
                @forelse($heroes as $hero)
                <div class="swiper-slide">
                    <div class="relative min-h-[70vh] bg-cover bg-center text-white flex items-center justify-center text-center"
                        style="background-image: url('{{ asset($hero->image ?? 'images/default-banner.jpg') }}')">
                        <div class="absolute inset-0 bg-black/60"></div>
                        <div class="container mx-auto px-6 relative z-10">
                            <div class="max-w-3xl mx-auto">
                                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                                    {{ $hero->title }}
                                </h1>
                                <p class="mt-4 text-lg md:text-xl font-light">
                                    {{ $hero->subtitle }}
                                </p>

                                @if(!empty($hero->button_text) && !empty($hero->button_link))
                                <a href="{{ $hero->button_link }}"
                                    class="mt-8 inline-block px-10 py-3 bg-blue-600 hover:bg-blue-700 rounded-md font-bold transition-all duration-300">
                                    {{ $hero->button_text }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                {{-- Jika belum ada data hero --}}
                <div class="swiper-slide">
                    <div class="relative min-h-[70vh] bg-gray-300 flex items-center justify-center">
                        <h2 class="text-gray-700 text-3xl font-semibold">Belum ada data Hero</h2>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Navigasi & Pagination Swiper -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

    </div>
</section>