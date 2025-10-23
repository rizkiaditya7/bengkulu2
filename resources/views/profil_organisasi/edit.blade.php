@extends('admin.layout')

@section('content')
<div class="flex-1 flex flex-col overflow-hidden text-black">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Edit Profil Lembaga</h2>
        <a href="{{ route('admin.organisasi.index') }}" class="text-blue-600 hover:underline">← Kembali</a>
    </header>

    <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.organisasi.update', $profil_organisasi->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                @include('profil_organisasi.form')

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-5 py-2 rounded-lg transition">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection