@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Album</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">

            <div class="bg-white shadow-md rounded-lg p-8">
                <form action="{{ route('admin.update-berita', $berita->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf @method('PUT') <div class="mb-6">
                        <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul
                            Berita</label>
                        <input type="text" id="judul" name="judul" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan judul berita" value="{{ $berita->judul }}">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori
                                Berita</label>
                            <select id="kategori_id" name="kategori_id" required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option disabled>Pilih Kategori</option>
                                <option value="1" {{ $berita->kategori_id == 1 ? 'selected' : '' }}>
                                    Teknologi</option>
                                <option value="2" {{ $berita->kategori_id == 2 ? 'selected' : '' }}>
                                    Pemerintahan</option>
                                <option value="3" {{ $berita->kategori_id == 3 ? 'selected' : '' }}>
                                    Kunjungan</option>
                            </select>
                        </div>
                        <div>
                            <label for="tanggal_kejadian" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                                Kejadian</label>
                            <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                value="{{ $berita->tanggal_kejadian }}">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto
                            (Opsional)</label>
                        <div class="mb-2">
                            <span class="block text-sm text-gray-600 mb-1">Foto saat ini:</span>
                            <img src="{{ asset('storage/foto_berita/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                                class="h-24 w-auto rounded object-cover">
                        </div>
                        <input type="file" id="foto" name="foto"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengganti foto.
                        </p>
                    </div>

                    <div class="mb-6">
                        <label for="isi_berita" class="block text-gray-700 text-sm font-bold mb-2">Isi
                            Berita</label>
                        <textarea id="isi_berita" name="isi_berita" rows="10" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Tulis isi berita di sini...">{{ $berita->isi_berita }}</textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('admin.berita') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Berita
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </main>

    @endsection