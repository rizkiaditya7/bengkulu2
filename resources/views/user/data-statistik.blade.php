@extends('front.layout')
@section('content')
<main>
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Data Statistik</h1>
            <nav class="text-sm font-medium">
                <a href="#" class="hover:underline text-blue-600">Profil Daerah</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">Data Statistik</span>
            </nav>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-16">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                <div class="bg-blue-100 p-4 rounded-full">
                    <i class="fas fa-users text-3xl text-blue-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Jumlah Penduduk</p>
                    <p class="text-2xl font-bold text-slate-800">415.789 Jiwa</p>
                    <p class="text-xs text-gray-400">Data BPS 2024</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                <div class="bg-green-100 p-4 rounded-full">
                    <i class="fas fa-chart-line text-3xl text-green-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Pertumbuhan Ekonomi</p>
                    <p class="text-2xl font-bold text-slate-800">4.85%</p>
                    <p class="text-xs text-gray-400">Tahun 2024</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                <div class="bg-yellow-100 p-4 rounded-full">
                    <i class="fas fa-graduation-cap text-3xl text-yellow-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Indeks Pembangunan Manusia</p>
                    <p class="text-2xl font-bold text-slate-800">65.30</p>
                    <p class="text-xs text-gray-400">Poin (Kategori Sedang)</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <i class="fas fa-user-friends text-3xl text-blue-600 mr-4"></i>
                    <h2 class="text-2xl font-bold text-slate-800">Demografi</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Kepadatan Penduduk</span>
                        <span class="font-bold">555 Jiwa/km²</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Laki-laki</span>
                        <span class="font-bold">207.150 Jiwa</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Perempuan</span>
                        <span class="font-bold">208.639 Jiwa</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jumlah Kepala Keluarga</span>
                        <span class="font-bold">110.530 KK</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <i class="fas fa-school text-3xl text-yellow-600 mr-4"></i>
                    <h2 class="text-2xl font-bold text-slate-800">Pendidikan</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Angka Melek Huruf</span>
                        <span class="font-bold">96.7%</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Jumlah Sekolah (SD/MI)</span>
                        <span class="font-bold">350 Unit</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Jumlah Sekolah (SMP/MTs)</span>
                        <span class="font-bold">85 Unit</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jumlah Sekolah (SMA/SMK/MA)</span>
                        <span class="font-bold">42 Unit</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <i class="fas fa-heartbeat text-3xl text-red-500 mr-4"></i>
                    <h2 class="text-2xl font-bold text-slate-800">Kesehatan</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Angka Harapan Hidup</span>
                        <span class="font-bold">69.5 Tahun</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Jumlah Rumah Sakit</span>
                        <span class="font-bold">2 Unit</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Jumlah Puskesmas</span>
                        <span class="font-bold">16 Unit</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jumlah Tenaga Medis</span>
                        <span class="font-bold">850 Orang</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="flex items-center mb-6">
                    <i class="fas fa-seedling text-3xl text-green-600 mr-4"></i>
                    <h2 class="text-2xl font-bold text-slate-800">Ekonomi & Pertanian</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">PDRB (Atas Dasar Harga Berlaku)</span>
                        <span class="font-bold">12,5 Triliun Rupiah</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Produksi Garam</span>
                        <span class="font-bold">120.000 Ton/Tahun</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Produksi Jagung</span>
                        <span class="font-bold">180.000 Ton/Tahun</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tingkat Pengangguran Terbuka</span>
                        <span class="font-bold">5.2%</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>
@endsection