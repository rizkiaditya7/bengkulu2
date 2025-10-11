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
            <span class="text-gray-700">Wakil Bupati</span>
        </div>
    </section>

    {{-- Konten Utama --}}
    <section class="container mx-auto px-6 py-12 md:py-16">
        <div class="bg-white p-6 md:p-10 rounded-xl shadow-lg">
            <div class="flex flex-col md:flex-row md:space-x-12">

                {{-- KOLOM KIRI: FOTO & IDENTITAS --}}
                <div class="w-full md:w-1/3 lg:w-1/4 flex-shrink-0 text-center mb-8 md:mb-0">
                    <img src="{{ $wakilBupati->foto ? asset('storage/' . $wakilBupati->foto) : 'https://placehold.co/400x500/E2E8F0/334155?text=Foto+Wakil+Bupati' }}"
                        alt="Foto {{ $wakilBupati->nama }}" class="rounded-lg shadow-md mx-auto w-64 h-80 object-cover">
                    <div class="mt-6">
                        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">{{ $wakilBupati->nama }}</h1>
                        <p class="text-blue-600 font-semibold text-lg mt-1">{{ $wakilBupati->jabatan }}</p>
                    </div>
                </div>

                {{-- KOLOM KANAN: PROFIL LENGKAP (SESUAI GAMBAR REFERENSI) --}}
                <div class="w-full md:w-2/3 lg:w-3/4">

                    <dl class="text-base">

                        {{-- Baris Nama --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Nama</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $wakilBupati->nama }}</dd>
                        </div>

                        {{-- Baris Tempat/Tanggal Lahir --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Tempat/Tanggal Lahir
                            </dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $wakilBupati->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($wakilBupati->tanggal_lahir)->translatedFormat('d F Y') }}
                            </dd>
                        </div>

                        {{-- Baris Agama --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Agama</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $wakilBupati->agama }}</dd>
                        </div>

                        {{-- Baris Jabatan --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Jabatan</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $wakilBupati->jabatan }}
                                Periode 2025 - 2030</dd>
                        </div>

                        {{-- Baris Alamat --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Alamat</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $wakilBupati->alamat }}</dd>
                        </div>

                        {{-- Baris Nama Suami --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Nama istri</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">:
                                {{ $wakilBupati->nama_istri ?? '-' }}</dd>
                        </div>

                        {{-- Baris Anak --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Anak</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $wakilBupati->anak ?? '-' }}
                            </dd>
                        </div>

                        {{-- Baris Riwayat Jabatan --}}
                        <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                            <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600 self-start">Riwayat
                                Jabatan</dt>
                            <dd class="col-span-8 md:col-span-9 text-slate-800">
                                {{-- Menggunakan Ordered List (<ol>) untuk penomoran otomatis --}}
                                <ol class="list-outside list-[decimal] space-y-1">
                                    {{-- Data placeholder, idealnya dari database --}}
                                    <li>Anggota DPRD Kabupaten helium01 (2014 - 2019)</li>
                                    <li>Ketua Komisi IV DPRD helium01 (2019 - 2024)</li>
                                    <li>Wakil Bupati helium01 (2025 - Sekarang)</li>
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