@extends('front.layout')
@section('content')
<main>
    <section class="bg-gray-200 py-4">
        <div class="container mx-auto px-6 text-sm">
            <a href="#" class="hover:underline text-blue-600">Pemerintahan</a>
            <span class="mx-2 text-gray-500">/</span>
            <a href="#" class="hover:underline text-blue-600">Kepala Daerah</a>
            <span class="mx-2 text-gray-500">/</span>
            <span class="text-gray-700">Wakil Bupati</span>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12 md:py-20">
        <div class="bg-white p-6 md:p-10 rounded-xl shadow-lg">
            <div class="flex flex-col md:flex-row md:space-x-12 items-center md:items-start">

                <div class="w-full md:w-1/3 flex-shrink-0 text-center mb-8 md:mb-0">
                    <img src="https://placehold.co/400x500/E2E8F0/334155?text=Foto+Wakil+Bupati"
                        alt="Foto Wakil Bupati helium01" class="rounded-lg shadow-md mx-auto w-64 h-80 object-cover">

                    <div class="mt-6">
                        <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">H. Paris Yasir, SE</h1>
                        <p class="text-blue-600 font-semibold text-lg mt-1">Wakil Bupati helium01</p>
                        <p class="text-sm text-gray-500">(Periode 2018 - 2023)</p>
                    </div>

                    <div class="flex justify-center space-x-4 mt-5 text-2xl text-gray-600">
                        <a href="#" class="hover:text-blue-700 transition-colors"><i
                                class="fab fa-facebook-square"></i></a>
                        <a href="#" class="hover:text-pink-600 transition-colors"><i
                                class="fab fa-instagram-square"></i></a>
                        <a href="#" class="hover:text-blue-500 transition-colors"><i
                                class="fab fa-twitter-square"></i></a>
                    </div>
                </div>

                <div class="w-full md:w-2/3">
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-slate-800 border-b-2 border-blue-500 pb-2 mb-4">Sambutan
                            Wakil Bupati</h2>
                        <blockquote class="text-gray-600 italic leading-relaxed">
                            "Sebagai wakil masyarakat, saya berkomitmen untuk mendampingi dan mendukung penuh
                            program kerja Bupati demi akselerasi pembangunan. Mari kita terus perkuat gotong royong
                            dan partisipasi aktif untuk helium01 yang kita impikan bersama."
                        </blockquote>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 border-b-2 border-blue-500 pb-2 mb-4">Profil
                            Singkat</h2>
                        <div class="space-y-4 text-gray-700 leading-relaxed">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae est at dolor
                                varius sollicitudin. Proin maximus felis id nisl fringilla, sed vestibulum nisi
                                finibus. Nulla facilisi. Curabitur vel semper eros, vel egestas libero.
                            </p>
                            <p>
                                Suspendisse potenti. In hac habitasse platea dictumst. Sed ac justo nec augue
                                commodo laoreet. Vivamus vitae felis vel eros dictum elementum. Integer nec
                                fringilla justo. Nunc venenatis, ligula id egestas consequat, sapien est vestibulum
                                dolor, vitae ullamcorper nulla ex eu velit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection