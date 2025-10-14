@extends('admin.layout')
@section('content')
<!-- Overlay untuk mobile -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

<div class="flex-1 flex flex-col overflow-hidden">
    <!-- Awal Header Utama -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Penghargaan</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>
    <!-- Akhir Header Utama -->

    <!-- Awal Konten Utama -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-gray-700 text-2xl font-semibold">Daftar Penghargaan</h3>
                <a href="{{ route('admin.tambah-penghargaan') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                    <i class="fas fa-plus mr-2"></i>Tambah Penghargaan
                </a>
            </div>

            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <tr>
                            <th class="py-3 px-5 text-left">No</th>
                            <th class="py-3 px-5 text-left">Nama Penghargaan</th>
                            <th class="py-3 px-5 text-left">Pemberi</th>
                            <th class="py-3 px-5 text-left">Tahun</th>
                            <th class="py-3 px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($penghargaans as $penghargaan)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-5">{{ $loop->iteration + $penghargaans->firstItem() - 1 }}
                            </td>
                            <td class="py-3 px-5">{{ $penghargaan->nama_penghargaan }}</td>
                            <td class="py-3 px-5">{{ $penghargaan->pemberi }}</td>
                            <td class="py-3 px-5">{{ $penghargaan->tahun }}</td>
                            <td class="py-3 px-5 text-center">
                                <a href="{{ route('admin.edit-penghargaan', $penghargaan->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700 mr-4"><i
                                        class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.penghargaan.destroy', $penghargaan->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Belum ada data penghargaan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $penghargaans->links() }}
            </div>
        </div>
    </main>
    <!-- Akhir Konten Utama -->
</div>
</div>
@endsection