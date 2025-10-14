@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Profil Kepala Daerah</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                @foreach ($data as $d)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $d->jabatan }}</h3>
                        <a href="{{ route('admin.edit-kepala-daerah', $d->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg text-sm transition-colors">
                            <i class="fas fa-pencil-alt mr-2"></i>Edit Profil
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <img src="{{ $d->foto ? asset('storage/' . $d->foto) : asset('images/default.jpg') }}"
                            alt="Foto {{ $d->nama }}" class="w-24 h-32 object-cover rounded-md flex-shrink-0">

                        <div class="text-gray-700">
                            <p class="font-bold text-lg">{{ $d->nama }}</p>
                            <p class="text-sm mt-2"><i class="fas fa-map-marker-alt w-4 mr-1 text-gray-400"></i>
                                helium01</p>
                            <p class="text-sm"><i class="fas fa-user-shield w-4 mr-1 text-gray-400"></i>
                                Kepala
                                Daerah</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </main>
</div>
</div>
@endsection