<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div
            class="flex overflow-x-auto space-x-6 pb-4 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            @foreach($layanan as $item)
            <div class="min-w-[120px] flex flex-col items-center flex-shrink-0">
                <div class="rounded-full p-5 mb-3 transition-all duration-300 group-hover:scale-110"
                    style="background-color: {{ $item->warna }}20;">
                    <i class="{{ $item->icon }} text-4xl" style="color: {{ $item->warna }};"></i>
                </div>
                <h3 class="font-semibold text-gray-700 text-center">{{ $item->nama }}</h3>
            </div>
            @endforeach
        </div>


    </div>
</section>