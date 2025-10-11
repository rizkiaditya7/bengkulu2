{{-- 
    =================================================================
    * Halaman: Daftar Album (admin.album.index)
    * Deskripsi: Halaman utama untuk melihat semua album.
    * Admin bisa menambah album baru, mengedit, menghapus,
    * dan masuk ke mode kelola foto untuk setiap album.
    =================================================================
--}}
@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Album</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>
    <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Daftar Album</h3>
                {{-- Tombol Utama: Tambah Album Baru --}}
                <button id="open-tambah-modal-btn"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Album Baru
                </button>
            </div>

            {{-- Grid untuk menampilkan Album-album --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($albums as $album)
                <div class="bg-white rounded-lg shadow-md flex flex-col">
                    {{-- Mengambil gambar sampul album --}}
                    @php
                    $cover = $album->photos->firstWhere('is_cover', 1);
                    @endphp
                    <img src="{{ $cover ? asset('storage/' . $cover->path) : 'https://via.placeholder.com/600x400.png?text=No+Cover' }}"
                        alt="Sampul {{ $album->nama }}" class="w-full h-48 object-cover rounded-t-lg">

                    <div class="p-4 flex-grow">
                        <h4 class="text-lg font-bold text-gray-800">{{ $album->nama }}</h4>
                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                            {{ $album->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                    </div>

                    {{-- Area Aksi untuk setiap Album --}}
                    <div class="p-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                        <span class="text-xs text-gray-500">{{ $album->photos->count() }} Foto</span>
                        <div class="flex space-x-2">
                            {{-- Tombol KELOLA FOTO --}}
                            <a href="{{ route('admin.galeri', $album->id) }}"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 text-sm rounded-md"
                                title="Kelola Foto">
                                <i class="fas fa-images"></i>
                            </a>
                            {{-- Tombol Edit Album --}}
                            <button
                                class="open-edit-modal-btn bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 text-sm rounded-md"
                                title="Edit Album" data-id="{{ $album->id }}" data-nama="{{ $album->nama }}"
                                data-deskripsi="{{ $album->deskripsi }}"
                                data-action="{{ route('admin.album.update', $album->id) }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            {{-- Tombol Hapus Album --}}
                            <button
                                class="delete-album-btn bg-red-500 hover:bg-red-600 text-white px-3 py-1 text-sm rounded-md"
                                title="Hapus Album" data-id="{{ $album->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="delete-form-{{ $album->id }}"
                                action="{{ route('admin.album.destroy', $album->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full bg-white text-center p-12 rounded-lg shadow-md">
                    <i class="fas fa-folder-open text-5xl text-gray-300 mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700">Belum Ada Album</h4>
                    <p class="text-gray-500 mt-2">Silakan buat album pertama Anda.</p>
                </div>
                @endforelse
            </div>
        </div>
    </main>
    @include('admin.modal.album_modal')
    @endsection