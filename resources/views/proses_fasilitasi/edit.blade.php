@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden text-black">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Edit Proses Fasilitasi</h2>
    </header>

    <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
        <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
            <form action="{{ route('admin.proses_fasilitasi.update', $prosesFasilitasi->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Tahap</label>
                    <input type="text" name="tahap" value="{{ old('tahap', $prosesFasilitasi->tahap) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Ikon (FontAwesome)</label>
                    <input type="text" name="ikon" value="{{ old('ikon', $prosesFasilitasi->ikon) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <p class="text-sm text-gray-500 mt-1">Lihat daftar ikon di <a href="https://fontawesome.com/icons"
                            target="_blank" class="text-blue-600 hover:underline">fontawesome.com/icons</a></p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('deskripsi', $prosesFasilitasi->deskripsi) }}</textarea>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.proses_fasilitasi.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg transition">Batal</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection