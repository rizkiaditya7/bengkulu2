@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Edit Profil</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-700">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Profil Lembaga</h2>

            <form action="{{ route('admin.visi.update', $profil->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Visi</label>
                    <textarea name="visi" rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $profil->visi }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Misi</label>
                    <textarea name="misi" rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $profil->misi }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Selayang Pandang</label>
                    <textarea name="selayang_pandang" rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $profil->selayang_pandang }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tugas & Fungsi</label>
                    <textarea name="tugas_fungsi" rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $profil->tugas_fungsi }}</textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.visi.index') }}"
                        class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-medium transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection