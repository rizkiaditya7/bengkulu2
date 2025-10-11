@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-800">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-900">Manajemen Artikel</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-900">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="p-6 text-gray-900">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Daftar Layanan</h2>
                <a href="{{ route('admin.layanan.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Tambah</a>
            </div>

            <table class="min-w-full bg-white rounded shadow text-gray-900">
                <thead>
                    <tr class="bg-gray-200 text-left text-gray-900">
                        <th class="p-3">Nama</th>
                        <th class="p-3">Ikon</th>
                        <th class="p-3">Warna</th>
                        <th class="p-3">Link</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($layanan as $item)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $item->nama }}</td>
                        <td class="p-3"><i class="{{ $item->icon }} text-xl"></i></td>
                        <td class="p-3">
                            <div class="w-6 h-6 rounded-full border border-gray-300"
                                style="background: {{ $item->warna }}"></div>
                        </td>
                        <td class="p-3">{{ $item->link }}</td>
                        <td class="p-3 flex space-x-2">
                            <a href="{{ route('admin.layanan.edit', $item->id) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection