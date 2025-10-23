@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden text-black">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Profil Lembaga</h2>
        <a href="{{ route('admin.organisasi.index') }}" class="text-blue-600 hover:underline">← Kembali</a>
    </header>

    <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.organisasi.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @include('profil_organisasi.form')

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg transition">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection