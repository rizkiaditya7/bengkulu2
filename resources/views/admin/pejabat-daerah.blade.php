@extends('admin.layout')
@section('content')
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <button id="menu-toggle" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <h2 class="text-2xl font-bold text-gray-800">Profil Pejabat Daerah</h2>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Admin</span>
            <img class="h-10 w-10 rounded-full object-cover"
                src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        <div class="container mx-auto">
            <div class="mb-6 text-right">
                <a href="{{ route('admin.tambah-pejabat-daerah') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors inline-block">
                    <i class="fas fa-plus mr-2"></i>Tambah Pejabat
                </a>

            </div>

            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <tr>
                            <th class="py-3 px-5 text-left">Foto</th>
                            <th class="py-3 px-5 text-left">Nama Pejabat</th>
                            <th class="py-3 px-5 text-left">Jabatan</th>
                            <th class="py-3 px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($data as $d)
                        <tr>
                            <td class="py-3 px-5 border-b border-gray-200">
                                @if ($d->foto)
                                <img src="{{ asset('storage/' . $d->foto) }}" alt="Foto {{ $d->nama }}"
                                    class="h-12 w-12 object-cover rounded-full">
                                @else
                                <img src="https://placehold.co/100x100" alt="Foto Default"
                                    class="h-12 w-12 object-cover rounded-full">
                                @endif
                            </td>
                            <td class="py-3 px-5 border-b border-gray-200">
                                <p class="font-semibold">{{ $d->nama }}</p>
                            </td>
                            <td class="py-3 px-5 border-b border-gray-200">
                                <span
                                    class="bg-purple-200 text-purple-700 py-1 px-3 rounded-full text-xs">{{ $d->jabatan }}</span>
                            </td>
                            <td class="py-3 px-5 border-b border-gray-200 text-center">
                                <a href="{{ route('admin.edit-pejabat-daerah', $d->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700 mr-4" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('admin.pejabat-daerah-destroy', $d->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</div>
@endsection