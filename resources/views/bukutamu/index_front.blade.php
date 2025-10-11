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
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif


</div>

{{-- DataTables CDN --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.tailwindcss.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.tailwindcss.js"></script>

@endpush
@endsection