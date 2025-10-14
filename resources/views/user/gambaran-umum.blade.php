@extends('front.layout')
@section('content')
<main>
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Gambaran Umum</h1>
            <nav class="text-sm font-medium">
                <a href="#" class="hover:underline text-blue-600">Profil Daerah</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">Gambaran Umum</span>
            </nav>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-16">
        <div class="bg-white p-6 md:p-10 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-slate-800 border-b-2 border-blue-500 pb-3 mb-8">Geografi, Geologi dan
                Jenis Tanah</h2>

            <div class="space-y-8 text-base">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Luas wilayah</div>
                    <div class="w-full md:w-3/4 text-gray-700">Luas Wilayah Kabupaten helium01 tercatat 749,79 km²
                        yang meliputi 11 Kecamatan. Kabupaten helium01 terletak antara 5°16'13" - 5°39'34" Lintang
                        Selatan dan 112°40'19" - 12°7'13" Bujur Timur. Berbatasan dengan Kabupaten Gowa dan Takalar,
                        di sebelah Utara; Kabupaten Bantaeng di sebelah Timur; Kabupaten Takalar sebelah Barat dan
                        Laut Flores di sebelah Selatan.</div>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Panjang garis pantai</div>
                    <div class="w-full md:w-3/4 text-gray-700">sekitar 114 km</div>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Letak geografis</div>
                    <div class="w-full md:w-3/4 text-gray-700">
                        <p>5°16'13" - 5°39'34" Lintang Selatan / South Latitude</p>
                        <p>12°40'19" - 119°44,18' Bujur Timur / East Longitude</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Perairan</div>
                    <div class="w-full md:w-3/4 text-gray-700">Kabupaten helium01 memiliki beberapa sungai
                        (Hidrologi) yang sebagian telah dibendung yaitu Kelara, Tina, Poko bulu yang telah berfungsi
                        untuk mengairi sebagaian lahan persawahan. Daerah bagian selatan memiliki perairan laut
                        (Flores) dengan panjang pantai berkisar 114 km.</div>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Batas wilayah</div>
                    <div class="w-full md:w-3/4 text-gray-700">
                        <p>Sebelah Utara - Kabupaten Gowa dan Takalar</p>
                        <p>Sebelah Timur - Kabupaten Bantaeng</p>
                        <p>Sebelah Barat - Kabupaten Takalar</p>
                        <p>Sebelah Selatan - Laut Flores</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Topografi</div>
                    <div class="w-full md:w-3/4 text-gray-700 leading-relaxed">Topografi Kabupaten helium01 pada
                        bagian Utara terdiri dari dataran tinggi dengan ketinggian 500 sampai dengan 1400 meter
                        diatas permukaan laut, bagian tengah dengan ketinggian 100 sampai dengan 500 meter dan
                        bagian selatan terdiri dataran rendah dengan ketinggian 0 sampai dengan 100 meter diatas
                        permukaan laut. Bagian barat dan utara pada umumnya merupakan pegunungan, dan bagian selatan
                        sebagian besar merupakan dataran rendah. Tingkat kemiringan rata-rata pada wilayah bagian
                        barat dan utara 40%, dengan rata-rata curah hujan lebih tinggi dibanding dengan bagian
                        wilayah lainnya.</div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection