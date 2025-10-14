@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">
            <div class="mb-8">
                <h3 class="text-3xl font-bold text-gray-800">Selamat Datang Kembali, Admin!</h3>
                <p class="text-gray-500">Berikut adalah ringkasan singkat dari website Anda.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Berita</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalBerita }}</p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-full">
                        <i class="fas fa-newspaper text-2xl text-blue-600"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Artikel</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalArtikel }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-full">
                        <i class="fas fa-pen-alt text-2xl text-green-600"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Galeri</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalGaleri }}</p>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-full">
                        <i class="fas fa-images text-2xl text-yellow-600"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Jumlah Pejabat</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalPejabat }}</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-full">
                        <i class="fas fa-users text-2xl text-red-600"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
                <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-gray-800 mb-4">Berita Terbaru</h4>
                    <ul class="space-y-4">
                        @foreach ($beritaTerbaru as $berita)
                        <li class="flex items-center justify-between">
                            <p class="text-gray-700">{{ Str::limit($berita->judul, 50) }}</p>
                            <span
                                class="text-xs text-gray-400">{{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h4>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('admin.tambah-berita') }}">
                            <button
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>Tambah Berita
                            </button>
                        </a>
                        <a href="{{ route('admin.tambah-artikel') }}">
                            <button
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>Tambah Artikel
                            </button>
                        </a>
                        <a href="{{ route('admin.album.store') }}">
                            <button
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>Tambah Galeri
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection