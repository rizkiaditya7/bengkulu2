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
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-blue-700">📋 Daftar Profil</h2>
                <a href="{{ route('admin.profil.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-lg shadow">
                    + Tambah Profil
                </a>
            </div>

            @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-300 rounded p-3 mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-blue-100 text-blue-800">
                        <tr class="text-center text-sm font-semibold">
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Logo</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Telp</th>
                            <th class="px-4 py-2 border">Alamat</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 text-sm">
                        @forelse ($data as $item)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 text-center">
                                @if($item->logo)
                                <img src="{{ asset('storage/' . $item->logo) }}" alt="Logo"
                                    class="w-12 h-12 object-cover mx-auto rounded">
                                @else
                                <span class="text-gray-400 italic">-</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">{{ $item->nama }}</td>
                            <td class="border px-4 py-2">{{ $item->email }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->telp }}</td>
                            <td class="border px-4 py-2">{{ $item->alamat }}</td>
                            <td class="border px-4 py-2">{{ Str::limit($item->deskripsi, 50) }}</td>
                            <td class="border px-4 py-2 text-center space-x-2">
                                <a href="{{ route('admin.profil.edit', $item->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.profil.destroy', $item->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-4 italic">Belum ada data profil.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    @endsection