@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Edit Artikel</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">
            {{-- Form untuk mengedit artikel --}}
            <div class="bg-white shadow-md rounded-lg p-8">
                {{-- Atribut enctype="multipart/form-data" WAJIB untuk upload file --}}
                <form action="{{ route('admin.artikel-update', $artikel->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Method spoofing untuk request UPDATE --}}

                    <div class="mb-6">
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul
                            Artikel</label>
                        <input type="text" name="judul" id="judul"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                            value="{{ old('judul', $artikel->judul) }}" required>
                        @error('judul')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                            value="{{ old('tanggal', $artikel->tanggal) }}" required>
                        @error('tanggal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Ganti Gambar
                            (Opsional)</label>
                        <div class="mt-2">
                            <span class="block text-sm text-gray-500 mb-2">Gambar Saat Ini:</span>
                            @if ($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar lama"
                                class="h-24 w-auto rounded-md object-cover mb-4">
                            @else
                            <span class="text-gray-500 italic">Tidak ada gambar.</span>
                            @endif
                        </div>
                        <input type="file" name="gambar" id="gambar"
                            class="w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:bg-blue-600 file:text-white file:px-4 file:py-2 file:border-0 file:mr-4 hover:file:bg-blue-700">
                        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
                        @error('gambar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi
                            Artikel</label>
                        <textarea name="isi" id="isi" rows="10"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                            required>{{ old('isi', $artikel->isi) }}</textarea>
                        @error('isi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('admin.artikel') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @endsection