@extends('admin.layout')
@section('content')
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Tambah Penghargaan Baru</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto max-w-3xl">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <form action="{{ route('admin.penghargaan-store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_penghargaan" class="block text-gray-700 text-sm font-bold mb-2">Nama
                            Penghargaan</label>
                        <input type="text" name="nama_penghargaan" id="nama_penghargaan"
                            value="{{ old('nama_penghargaan') }}"
                            class="shadow appearance-none border @error('nama_penghargaan') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                        @error('nama_penghargaan')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="pemberi" class="block text-gray-700 text-sm font-bold mb-2">Pemberi
                            Penghargaan</label>
                        <input type="text" name="pemberi" id="pemberi" value="{{ old('pemberi') }}"
                            class="shadow appearance-none border @error('pemberi') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700"
                            required>
                        @error('pemberi')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tahun" class="block text-gray-700 text-sm font-bold mb-2">Tahun</label>
                        <input type="number" name="tahun" id="tahun" value="{{ old('tahun') }}"
                            class="shadow appearance-none border @error('tahun') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700"
                            placeholder="Contoh: 2025" required>
                        @error('tahun')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi
                            (Opsional)</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('admin.penghargaan') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection