@extends('front.layout')
@section('content')
<main>
    {{-- Breadcrumb --}}
    <section class="bg-white py-4 border-b">
        <div class="container mx-auto px-6 text-sm">
            <a href="#" class="hover:underline text-blue-600">Pemerintahan</a>
            <span class="mx-2 text-gray-500">/</span>
            <a href="#" class="hover:underline text-blue-600">Kepala Daerah</a>
            <span class="mx-2 text-gray-500">/</span>
            <span class="text-gray-700">Bupati</span>
        </div>
    </section>

    {{-- Konten Utama --}}
    <section class="container mx-auto px-6 py-12 md:py-16">
        <div class="bg-white p-6 md:p-10 rounded-xl shadow-lg">
            <div class="flex flex-col md:flex-row md:space-x-12">

                {{-- KOLOM KIRI: FOTO & IDENTITAS --}}
                <div class="w-full md:w-1/3 lg:w-1/4 flex-shrink-0 text-center mb-8 md:mb-0">
                    <img src="{{ $bupati->foto ? asset('storage/' . $bupati->foto) : 'https://placehold.co/400x500/E2E8F0/334155?text=Foto+Bupati' }}"
                        alt="Foto {{ $bupati->nama }}" class="rounded-lg shadow-md mx-auto w-64 h-80 object-cover">
                    <div class="mt-6">
                        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">{{ $bupati->nama }}</h1>
                        <p class="text-blue-600 font-semibold text-lg mt-1">{{ $bupati->jabatan }}</p>
                    </div>
                </div>

                {{-- KOLOM KANAN: PROFIL LENGKAP (SESUAI GAMBAR) --}}
                <div class="w-full md:w-2/3 lg:w-3/4">

                    {{-- Menggunakan Definition List (<dl>) yang semantik untuk pasangan key-value --}}
                    <dl class="text-base">

                        {{-- Baris Nama --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Nama</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $bupati->nama }}</dd>
                        </div>

                        {{-- Baris Tempat/Tanggal Lahir --}}
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="md:col-span-3 font-semibold text-slate-600">
                                Tempat/Tanggal Lahir
                            </dt>
                            <dd class="md:col-span-9 text-slate-800">
                                {{ $bupati->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($bupati->tanggal_lahir)->translatedFormat('d F Y') }}
                            </dd>
                        </div>

                        {{-- Baris Agama --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Agama</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $bupati->agama }}</dd>
                        </div>

                        {{-- Baris Jabatan --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Jabatan</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $bupati->jabatan }} Periode
                                2025 - 2030</dd>
                        </div>

                        {{-- Baris Alamat --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Alamat</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $bupati->alamat }}</dd>
                        </div>

                        {{-- Baris Nama Istri --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Nama Istri</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $bupati->nama_istri ?? '-' }}
                            </dd>
                        </div>

                        {{-- Baris Anak --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Anak</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $bupati->anak ?? '-' }}</dd>
                        </div>

                        {{-- Baris Riwayat Jabatan --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600 self-start">Riwayat
                                Jabatan</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">
                                {{-- Menggunakan Ordered List (<ol>) untuk penomoran otomatis --}}
                                <ol class="list-outside list-[decimal] space-y-1">
                                    {{-- Data placeholder, idealnya dari database --}}
                                    <li>Kepala Seksi Pembangunan Desa (2006 - 2010)</li>
                                    <li>Camat Kecamatan Binamu (2010 - 2015)</li>
                                    <li>Kepala Dinas Pendidikan dan Kebudayaan (2015 - 2020)</li>
                                    <li>Wakil Bupati helium01 (2020 - 2025)</li>
                                    <li>Bupati helium01 (2025 - Sekarang)</li>
                                </ol>
                            </dd>
                        </div>
                    </dl>

                </div>

            </div>
        </div>
    </section>
</main>
@endsection