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
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
            <h1 class="text-xl font-semibold text-gray-900 mb-6">Edit Hero</h1>

            <form action="{{ route('admin.heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div>
                    <label for="title" class="block text-gray-800 font-medium mb-1">Judul</label>
                    <input type="text" name="title" id="title"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        value="{{ old('title', $hero->title) }}" required>
                    @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sub Judul -->
                <div>
                    <label for="subtitle" class="block text-gray-800 font-medium mb-1">Sub Judul</label>
                    <textarea name="subtitle" id="subtitle" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('subtitle', $hero->subtitle) }}</textarea>
                    @error('subtitle')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar -->
                <div>
                    <label for="image" class="block text-gray-800 font-medium mb-1">Gambar</label>

                    @if($hero->image)
                    <div class="mb-3">
                        <img src="{{ asset($hero->image) }}" alt="Hero Image" class="w-40 h-auto rounded-lg border">
                    </div>
                    @endif

                    <input type="file" name="image" id="image"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex items-center space-x-3 pt-3">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow">
                        Update
                    </button>
                    <a href="{{ route('admin.heroes.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-900 font-semibold px-5 py-2 rounded-lg shadow">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection