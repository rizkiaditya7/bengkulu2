@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Tambah Profil</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-700">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Tambah Profil Lembaga</h2>

            <form action="{{ route('admin.visi.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Visi -->
                <div>
                    <label for="visi" class="block text-gray-700 font-medium mb-1">Visi</label>
                    <textarea name="visi" id="visi" rows="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500">{{ old('visi') }}</textarea>
                    @error('visi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Misi -->
                <div>
                    <label for="misi" class="block text-gray-700 font-medium mb-1">Misi</label>
                    <textarea name="misi" id="misi" rows="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500">{{ old('misi') }}</textarea>
                    @error('misi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Selayang Pandang -->
                <div>
                    <label for="selayang_pandang" class="block text-gray-700 font-medium mb-1">Selayang Pandang</label>
                    <textarea name="selayang_pandang" id="selayang_pandang" rows="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500">{{ old('selayang_pandang') }}</textarea>
                    @error('selayang_pandang')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tugas & Fungsi -->
                <div>
                    <label for="tugas_fungsi" class="block text-gray-700 font-medium mb-1">Tugas & Fungsi</label>
                    <textarea name="tugas_fungsi" id="tugas_fungsi" rows="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500">{{ old('tugas_fungsi') }}</textarea>
                    @error('tugas_fungsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.visi.index') }}"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg shadow text-sm font-medium transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow text-sm font-medium transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection