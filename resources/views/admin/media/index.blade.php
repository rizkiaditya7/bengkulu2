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
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Daftar Media Sosial</h2>

        <a href="{{ route('admin.media.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-4 inline-block">
            + Tambah Media Sosial
        </a>

        @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-3">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="w-full border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Icon</th>
                        <th class="p-3 text-left">Link</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 text-gray-600 ">{{ $loop->iteration }}</td>
                        <td class="p-3 text-gray-600 ">{{ $item->nama }}</td>
                        <td class="p-3">
                            <i class="{{ $item->icon }} text-xl text-gray-700"></i>
                            <span class="ml-2 text-gray-600">{{ $item->icon }}</span>
                        </td>
                        <td class="p-3">
                            @if($item->link)
                            <a href="{{ $item->link }}" target="_blank" class="text-blue-600 hover:underline">
                                {{ $item->link }}
                            </a>
                            @else
                            <span class="text-gray-400 italic">Tidak ada link</span>
                            @endif
                        </td>
                        <td class="p-3 text-center">
                            <a href="{{ route('admin.media.edit', $item->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
    @endsection