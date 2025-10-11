@extends('front.layout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">👤 Detail Buku Tamu</h3>

    <div class="card p-4">
        <p><strong>Nama:</strong> {{ $bukutamu->nama }}</p>
        <p><strong>No. HP:</strong> {{ $bukutamu->no_hp }}</p>
        <p><strong>Jabatan:</strong> {{ $bukutamu->jabatan }}</p>
        <p><strong>Instansi:</strong> {{ $bukutamu->instansi }}</p>
        <p><strong>Tujuan Kunjungan:</strong> {{ $bukutamu->tujuan }}</p>

        <p><strong>Foto:</strong><br>
            @if ($bukutamu->foto)
            <img src="{{ asset('storage/' . $bukutamu->foto) }}" width="200">
            @else
            <span class="text-muted">Tidak ada foto</span>
            @endif
        </p>

        <a href="{{ route('bukutamu.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection