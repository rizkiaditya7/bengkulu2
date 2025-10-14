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

    <main class="flex-1 overflow-y-auto bg-gray-100 p-6 text-gray-900">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold text-blue-700">📋 Master Pertanyaan Survei</h2>
            <a href="{{ route('admin.pertanyaan.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">+ Tambah Pertanyaan</a>
        </div>

        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table id="pertanyaanTable" class="min-w-full border text-sm text-gray-900">
                <thead class="bg-blue-100 text-blue-800">
                    <tr>
                        <th class="px-3 py-2 border">No</th>
                        <th class="px-3 py-2 border">Kode</th>
                        <th class="px-3 py-2 border">Pertanyaan</th>
                        <th class="px-3 py-2 border">Tipe</th>
                        <th class="px-3 py-2 border">Opsi</th>
                        <th class="px-3 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="hover:bg-blue-50">
                        <td class="px-3 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-3 py-2 border">{{ $item->kode }}</td>
                        <td class="px-3 py-2 border">{{ $item->judul }}</td>
                        <td class="px-3 py-2 border capitalize">{{ $item->tipe }}</td>
                        <td class="px-3 py-2 border">
                            @if($item->opsi)
                            <ul class="list-disc ml-4 text-gray-900">
                                @foreach($item->opsi as $opsi)
                                <li>{{ $opsi }}</li>
                                @endforeach
                            </ul>
                            @else
                            <span class="text-gray-400 italic">-</span>
                            @endif
                        </td>
                        <td class="px-3 py-2 border text-center">
                            <form action="{{ route('admin.pertanyaan.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus pertanyaan ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>

{{-- DataTables --}}
@push('scripts')
<script>
$(document).ready(function() {
    $('#pertanyaanTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
        }
    });
});
</script>
@endpush
@endsection