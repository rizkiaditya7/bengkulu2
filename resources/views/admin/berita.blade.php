@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Berita</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div>
                    <h3 class="text-gray-800 text-2xl font-semibold">Daftar Berita</h3>
                    <p class="text-gray-500 text-sm mt-1">Kelola semua berita yang ada di website.</p>
                </div>
                <a href="{{ route('admin.tambah-berita') }}"
                    class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors inline-flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Berita Baru
                </a>
            </div>

            @if (session('success'))
            <div id="success-alert"
                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md relative flex items-center mb-6"
                role="alert">
                <i class="fas fa-check-circle mr-3"></i>
                <span class="block sm:inline flex-grow">{{ session('success') }}</span>
                <button onclick="document.getElementById('success-alert').remove()"
                    class="ml-4 text-green-800 hover:text-green-600 font-bold">&times;</button>
            </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-sm font-semibold">
                        <tr>
                            <th class="py-3 px-5 text-center">No</th>
                            <th class="py-3 px-5 text-left">Gambar</th>
                            <th class="py-3 px-5 text-left">Judul Berita</th>
                            <th class="py-3 px-5 text-left">Kategori</th>
                            <th class="py-3 px-5 text-left">Tanggal</th>
                            <th class="py-3 px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 divide-y divide-gray-200">
                        @forelse ($data as $d)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-5 text-center">{{ $loop->iteration }}</td>
                            <td class="py-4 px-5">
                                <img src="{{ $d->foto ? asset('storage/' . $d->foto) : asset('images/default.jpg') }}"
                                    alt="Gambar Berita" class="h-12 w-20 object-cover rounded-md">
                            </td>
                            <td class="py-4 px-5 font-medium">{{ $d->judul }}</td>
                            <td class="py-4 px-5">
                                <span
                                    class="bg-gray-200 text-gray-700 text-xs font-semibold px-2 py-1 rounded-full">{{ $d->kategori->nama_kategori ?? '-' }}</span>
                            </td>
                            <td class="py-4 px-5 text-sm">
                                {{ \Carbon\Carbon::parse($d->tanggal_kejadian)->translatedFormat('d M Y') }}
                            </td>
                            <td class="py-4 px-5">
                                <div class="flex items-center justify-center gap-4">
                                    <a href="{{ route('admin.edit-berita', $d->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                        <i class="fas fa-pencil-alt text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.berita-destroy', $d->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                            <i class="fas fa-trash-alt text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-gray-500">Belum ada berita yang
                                ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{-- Pastikan controller mengirim data paginasi ($data->links()) --}}
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
    </main>

    @endsection