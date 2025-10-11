@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Artikel</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="p-6 bg-gray-100 min-h-screen">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Tambah Media Sosial</h2>

            <form action="{{ route('admin.media.store') }}" method="POST"
                class="bg-white p-6 shadow rounded-lg space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-800 font-medium mb-2">Nama</label>
                    <input type="text" name="nama" class="w-full border rounded-lg p-2 text-gray-900" required>
                </div>

                <div>
                    <label class="block text-gray-800 font-medium mb-2">Icon (Font Awesome)</label>
                    <input type="text" name="icon" placeholder="contoh: fa-brands fa-facebook"
                        class="w-full border rounded-lg p-2 text-gray-900" required>
                </div>

                <div>
                    <label class="block text-gray-800 font-medium mb-2">Link</label>
                    <input type="url" name="link" class="w-full border rounded-lg p-2 text-gray-900">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.media.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </main>
    @endsection