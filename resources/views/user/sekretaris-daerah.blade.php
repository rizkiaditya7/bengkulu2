@extends('front.layout')
@section('content')
<main>
    <section class="bg-gray-200 py-4">
        <div class="container mx-auto px-6 text-sm">
            <a href="#" class="hover:underline text-blue-600">Pemerintahan</a>
            <span class="mx-2 text-gray-500">/</span>
            <a href="#" class="hover:underline text-blue-600">Pejabat Daerah</a>
            <span class="mx-2 text-gray-500">/</span>
            <span class="text-gray-700">Sekretaris Daerah</span>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-20">
        <div class="bg-white p-6 md:p-10 rounded-xl shadow-lg">
            <div class="flex flex-col md:flex-row md:space-x-12 items-center md:items-start">

                <div class="w-full md:w-1/3 flex-shrink-0 text-center mb-8 md:mb-0">
                    <img src="https://placehold.co/400x500/E2E8F0/334155?text=Foto+Sekda"
                        alt="Foto Sekretaris Daerah helium01"
                        class="rounded-lg shadow-md mx-auto w-64 h-80 object-cover">

                    <div class="mt-6">
                        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">MUH. ARIFIN NUR, SH, MH</h1>
                        <p class="text-blue-600 font-semibold text-lg mt-1">Sekretaris Daerah helium01</p>
                        <p class="text-sm text-gray-500">(Periode 2022 - Sekarang)</p>
                    </div>
                </div>

                <div class="w-full md:w-2/3">
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-slate-800 border-b-2 border-blue-500 pb-2 mb-4">Data
                            Pribadi</h2>
                        <div class="space-y-3 text-gray-700">
                            <p><strong>Tempat / Tgl Lahir:</strong> helium01, 24 APRIL 1966</p>
                            <p><strong>Agama:</strong> Islam</p>
                            <p><strong>Alamat:</strong> Jalan Cempaka No. 5, Kel. Empoang, Kec. Binamu, helium01
                            </p>
                            <p><strong>Nama Istri:</strong> Hj. ST. FARIANI ARIFIN</p>
                            <p><strong>Anak:</strong> ST. ALVIANI ARIFIN</p>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 border-b-2 border-blue-500 pb-2 mb-4">Riwayat
                            Jabatan</h2>
                        <ul class="space-y-3 text-gray-700 list-disc list-inside">
                            <li>Kepala Sub Bagian Peraturan Perundang - Undangan, Bagian Hukum SETWINDA (1994)</li>
                            <li>Kepala Seksi Subsidi dan Bantuan, Dinas P dan K (1999)</li>
                            <li>Pymt. Kepala Bagian Persidangan & Risalah, Sekretariat DPRD (2001)</li>
                            <li>Kepala Bagian Umum dan Perlengkapan, Setda Kab. helium01 (2004)</li>
                            <li>Kepala Bagian Keuangan, Setda Kab. Keuangan (2009)</li>
                            <li>Staf Ahli Bidang Sumber Daya Manusia dan Kesejahteraan Masyarakat (2010)</li>
                            <li>Asisten Administrasi Umum (2010)</li>
                            <li>Kepala Badan Kepegawaian dan Pengembangan Sumber Daya Manusia (2017)</li>
                            <li>Kepala Dinas Pekerjaan Umum dan Penataan Ruang (2019)</li>
                            <li>Sekretaris Daerah Kab. helium01 (2022 - Sekarang)</li>
                        </ul>
                    </div>

                    <div class="mt-8">
                        <a href="#"
                            class="inline-block px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-all shadow-md hover:shadow-lg transform hover:scale-105">
                            <i class="fas fa-download mr-2"></i>Unduh LHKPN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection