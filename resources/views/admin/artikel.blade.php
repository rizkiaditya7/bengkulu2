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
        <div class="container mx-auto">
            <div class="mb-6 text-right">
                <a href="{{ route('admin.tambah-artikel') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors inline-block">
                    <i class="fas fa-plus mr-2"></i>Tambah Artikel Baru
                </a>

            </div>

            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <tr>
                            <th class="py-3 px-5 text-left">#</th>
                            <th class="py-3 px-5 text-left">Gambar</th>
                            <th class="py-3 px-5 text-left">Judul Artikel</th>
                            <th class="py-3 px-5 text-left">Tanggal</th>
                            <th class="py-3 px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($data as $d)
                        <tr>
                            <td class="py-3 px-5 border-b border-gray-200">{{ $loop->iteration }}</td>
                            <td class="py-3 px-5 border-b border-gray-200">
                                <img src="{{ asset('storage/' . $d->gambar) }}" alt="Gambar Artikel"
                                    class="h-12 w-20 object-cover rounded">
                            </td>
                            <td class="py-3 px-5 border-b border-gray-200">
                                {{ $d->judul }}
                            </td>
                            <td class="py-3 px-5 border-b border-gray-200"> {{ $d->tanggal }} </td>
                            <td class="py-3 px-5 border-b border-gray-200 text-center">
                                <!-- Tombol Edit (a tag) -->
                                <a href="{{ route('admin.edit-artikel', $d->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700 mr-4">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <!-- Tombol Delete (form) -->
                                <form action="{{ route('admin.artikel-destroy', $d->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    @endsection