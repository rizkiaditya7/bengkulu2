@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden text-black">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Proses Fasilitasi</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-700 font-medium">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover border border-gray-300"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
        </div>
    </header>

    <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Data Proses Fasilitasi</h2>
            <a href="{{ route('admin.proses_fasilitasi.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition">
                + Tambah Data
            </a>
        </div>

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">#</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ikon</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tahap</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Deskripsi</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $d)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b text-gray-600">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 border-b text-blue-600 text-xl">
                            <i class="fas {{ $d->ikon ?? 'fa-circle-info' }}"></i>
                        </td>
                        <td class="px-4 py-3 border-b font-medium text-gray-800">{{ $d->tahap }}</td>
                        <td class="px-4 py-3 border-b text-gray-700">{{ $d->deskripsi ?? '-' }}</td>
                        <td class="px-4 py-3 border-b text-center space-x-2">
                            <a href="{{ route('admin.proses_fasilitasi.edit', $d->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm font-medium transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.proses_fasilitasi.destroy', $d->id) }}" method="POST"
                                class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus data ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm font-medium transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">Belum ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection