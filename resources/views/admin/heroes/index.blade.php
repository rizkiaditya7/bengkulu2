@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden bg-gray-50 text-gray-900">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-800">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-900">Manajemen Artikel</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-900 font-medium">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover border"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
        </div>
    </header>

    <!-- Main -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-900">Daftar Hero Section</h1>
            <a href="{{ route('admin.heroes.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                + Tambah Hero
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100 text-gray-900">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold border-b">Judul</th>
                        <th class="py-3 px-4 text-left font-semibold border-b">Sub Judul</th>
                        <th class="py-3 px-4 text-left font-semibold border-b">Gambar</th>
                        <th class="py-3 px-4 text-left font-semibold border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($heroes as $hero)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $hero->title }}</td>
                        <td class="py-3 px-4">{{ $hero->subtitle }}</td>
                        <td class="py-3 px-4">
                            @if($hero->image)
                            <img src="{{ asset($hero->image) }}" class="w-24 h-auto rounded shadow-sm border"
                                alt="Hero Image">
                            @else
                            <span class="text-gray-500">-</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 space-x-2">
                            <a href="{{ route('admin.heroes.edit', $hero->id) }}"
                                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-3 py-1 rounded-md">
                                Edit
                            </a>

                            <form action="{{ route('admin.heroes.destroy', $hero->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Yakin mau hapus?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-1 rounded-md">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-600">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection