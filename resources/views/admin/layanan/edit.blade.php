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
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Edit Layanan</h2>
            </header>

            <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
                <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-6">
                    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <table class="w-full text-gray-800">
                            <tr class="border-b">
                                <th class="text-left py-3 w-40">Nama</th>
                                <td>
                                    <input type="text" name="nama" class="w-full border-gray-300 rounded-lg p-2"
                                        value="{{ old('nama', $layanan->nama) }}" required>
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Icon (FontAwesome)</th>
                                <td>
                                    <input type="text" name="icon" class="w-full border-gray-300 rounded-lg p-2"
                                        value="{{ old('icon', $layanan->icon) }}" required>
                                    <div class="mt-2 text-gray-500 text-sm">Contoh: <code>fas fa-info-circle</code>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Warna Latar</th>
                                <td>
                                    <input type="color" name="warna" class="w-16 h-10 p-1 border rounded-lg"
                                        value="{{ old('warna', $layanan->warna) }}">
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Link</th>
                                <td>
                                    <input type="text" name="link" class="w-full border-gray-300 rounded-lg p-2"
                                        value="{{ old('link', $layanan->link) }}">
                                </td>
                            </tr>
                        </table>

                        <div class="flex justify-between mt-6">
                            <a href="{{ route('admin.layanan.index') }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Kembali</a>
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Perbarui</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </main>
    @endsection