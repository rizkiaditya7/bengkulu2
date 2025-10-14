@extends('front.layout')
@section('content')
<main>
    <section class="bg-gray-100 py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Visi dan Misi</h1>
            <nav class="text-sm font-medium">
                <a href="#" class="text-blue-600 hover:underline">Pemerintahan</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-500">Visi dan Misi</span>
            </nav>
        </div>
    </section>

    <section class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mb-16">
                <h2 class="text-4xl font-bold text-slate-800 mb-4">Visi</h2>
                <p class="text-lg text-gray-600">helium01 SMART 2023</p>
                <p class="text-red-600 font-semibold mt-2 text-lg">BERDAYA SAING, MAJU, RELIGIUS & BERKELANJUTAN</p>
            </div>

            <div>
                <h2 class="text-4xl font-bold text-slate-800 mb-8">Misi</h2>
                <ol class="text-left text-lg text-gray-700 space-y-4 max-w-3xl mx-auto">
                    <li class="flex">
                        <span class="mr-3 font-semibold">1.</span>
                        <span>Mengakselerasi perbaikan Indeks Pembangunan Manusia</span>
                    </li>
                    <li class="flex">
                        <span class="mr-3 font-semibold">2.</span>
                        <span>Meningkatkan kualitas Sumber Daya Manusia</span>
                    </li>
                    <li class="flex">
                        <span class="mr-3 font-semibold">3.</span>
                        <span>Mewujudkan peradaban birokrasi melalui tata kelola pemerintahan yang profesional,
                            aspiratif, partisipatif dan transparan.</span>
                    </li>
                    <li class="flex">
                        <span class="mr-3 font-semibold">4.</span>
                        <span>Melaksanakan pengembangan wilayah dan pembangunan infrastruktur wilayah secara
                            merata.</span>
                    </li>
                    <li class="flex">
                        <span class="mr-3 font-semibold">5.</span>
                        <span>Meningkatkan perekonomian daerah melalui pengelolaan sumber daya daerah dan lingkungan
                            hidup secara berkelanjutan dan investasi yang berkeadilan</span>
                    </li>
                    <li class="flex">
                        <span class="mr-3 font-semibold">6.</span>
                        <span>Mewujudkan tata kelola keuangan daerah yang efektif, efesien, produktif, transparan
                            dan akuntabel.</span>
                    </li>
                    <li class="flex">
                        <span class="mr-3 font-semibold">7.</span>
                        <span>Meningkatkan kualitas kehidupan beragama dan nilai-nilai budaya</span>
                    </li>
                    <li class="flex">
                        <span class="mr-3 font-semibold">8.</span>
                        <span>Menegakkan supremasi hukum, keamanan dan ketertiban</span>
                    </li>
                </ol>
            </div>
        </div>
    </section>
</main>
@endsection