@extends('front.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">
        📖 Buku Tamu Digital UPT BKN PALU
    </h2>

    {{-- Tombol tambah --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('bukutamu.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md transition">
            + Tambah Tamu
        </a>
        <a href="{{ route('bukutamu.export') }}"
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-md transition">
            ⬇️ Export Excel
        </a>
        <a href="{{ route('bukutamu.export.pdf') }}"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition">
            🧾 Export PDF
        </a>

    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Data --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
        <table id="bukutamuTable" class="min-w-full border border-blue-100">
            <thead class="bg-gradient-to-r from-sky-400 to-blue-500 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold">No</th>
                    <th class="py-3 px-4 text-left font-semibold">Nama</th>
                    <th class="py-3 px-4 text-left font-semibold">No. HP</th>
                    <th class="py-3 px-4 text-left font-semibold">Jabatan</th>
                    <th class="py-3 px-4 text-left font-semibold">Instansi</th>
                    <th class="py-3 px-4 text-left font-semibold">Foto</th>
                    <th class="py-3 px-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-100">
                @foreach ($data as $item)
                <tr class="hover:bg-blue-50 transition">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4 font-medium text-gray-800">{{ $item->nama }}</td>
                    <td class="py-3 px-4">{{ $item->no_hp }}</td>
                    <td class="py-3 px-4">{{ $item->jabatan }}</td>
                    <td class="py-3 px-4">{{ $item->instansi }}</td>
                    <td class="py-3 px-4">
                        @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}"
                            class="w-16 h-16 object-cover rounded-md border border-blue-200">
                        @else
                        <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center space-x-1">
                        <a href="{{ route('bukutamu.show', $item->id) }}"
                            class="inline-block bg-sky-500 hover:bg-sky-600 text-white px-3 py-1 rounded-md text-sm transition">
                            Lihat
                        </a>
                        <a href="{{ route('bukutamu.edit', $item->id) }}"
                            class="inline-block bg-amber-400 hover:bg-amber-500 text-white px-3 py-1 rounded-md text-sm transition">
                            Edit
                        </a>
                        <form action="{{ route('bukutamu.destroy', $item->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-rose-500 hover:bg-rose-600 text-white px-3 py-1 rounded-md text-sm transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- DataTables CDN --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.tailwindcss.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.tailwindcss.js"></script>

<script>
$(document).ready(function() {
    $('#bukutamuTable').DataTable({
        responsive: true,
        pageLength: 10,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Tidak ada data ditemukan",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data tersedia",
            infoFiltered: "(difilter dari total _MAX_ data)"
        }
    });
});
</script>
@endpush
@endsection