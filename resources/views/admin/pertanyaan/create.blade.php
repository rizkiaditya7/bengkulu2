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
        <h2 class="text-xl font-bold mb-4 text-blue-700">➕ Tambah Pertanyaan</h2>

        <form action="{{ route('admin.pertanyaan.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700">Kode Pertanyaan (Opsional)</label>
                <input type="text" name="kode" class="w-full border rounded-lg px-3 py-2 text-gray-900"
                    placeholder="Contoh: Q001">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Teks Pertanyaan</label>
                <input type="text" name="judul" class="w-full border rounded-lg px-3 py-2 text-gray-900" required
                    placeholder="Masukkan pertanyaan survei">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Tipe Jawaban</label>
                <select name="tipe" class="w-full border rounded-lg px-3 py-2 text-gray-900">
                    <option value="text">Teks</option>
                    <option value="radio">Radio (Pilih Salah Satu)</option>
                    <option value="checkbox">Checkbox (Bisa Lebih dari Satu)</option>
                    <option value="select">Dropdown</option>
                    <option value="rating">Rating (1–4)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Opsi Jawaban (pisahkan dengan koma)</label>
                <input type="text" name="opsi" class="w-full border rounded-lg px-3 py-2 text-gray-900"
                    placeholder="Contoh: Sangat Puas, Puas, Cukup, Kurang">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.pertanyaan.index') }}"
                    class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Kembali</a>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </main>
</div>
@endsection