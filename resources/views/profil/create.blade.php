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
    <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Tambah Profil Baru</h3>

            <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6 text-gray-900">
                @csrf

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-900 mb-1">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Logo -->
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-900 mb-1">Logo</label>
                    <input type="file" id="logo" name="logo"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900 mb-1">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Telepon -->
                <div>
                    <label for="telp" class="block text-sm font-medium text-gray-900 mb-1">Telepon</label>
                    <input type="text" id="telp" name="telp"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-900 mb-1">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="2"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-900 mb-1">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('admin.profil.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">Kembali</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition">Simpan</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection