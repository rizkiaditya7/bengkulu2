@extends('front.layout')
@section('content')
<main>
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6 text-gray-900">
        <h2 class="text-2xl font-bold mb-4 text-blue-700">📝 Isi Survei</h2>

        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('survei.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold">Nama (Opsional)</label>
                    <input type="text" name="nama" class="w-full border rounded px-3 py-2 text-gray-900">
                </div>
                <div>
                    <label class="block font-semibold">Email (Opsional)</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2 text-gray-900">
                </div>
            </div>

            <hr class="my-4">

            @foreach ($pertanyaans as $pertanyaan)
            <div class="mb-3">
                <label class="block font-semibold mb-1">{{ $loop->iteration }}. {{ $pertanyaan->judul }}</label>

                @switch($pertanyaan->tipe)
                @case('text')
                <input type="text" name="jawaban[{{ $pertanyaan->id }}]" class="w-full border rounded px-3 py-2">
                @break

                @case('radio')
                @foreach ($pertanyaan->opsi as $opsi)
                <label class="block">
                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $opsi }}" class="mr-2">
                    {{ $opsi }}
                </label>
                @endforeach
                @break

                @case('checkbox')
                @foreach ($pertanyaan->opsi as $opsi)
                <label class="block">
                    <input type="checkbox" name="jawaban[{{ $pertanyaan->id }}][]" value="{{ $opsi }}" class="mr-2">
                    {{ $opsi }}
                </label>
                @endforeach
                @break

                @case('select')
                <select name="jawaban[{{ $pertanyaan->id }}]" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih --</option>
                    @foreach ($pertanyaan->opsi as $opsi)
                    <option value="{{ $opsi }}">{{ $opsi }}</option>
                    @endforeach
                </select>
                @break

                @case('rating')
                <div class="flex space-x-2">
                    @for ($i = 1; $i <= 4; $i++) <label>
                        <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $i }}" class="mr-1">
                        {{ $i }}
                        </label>
                        @endfor
                </div>
                @break
                @endswitch
            </div>
            @endforeach

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Kirim Survei
                </button>
            </div>
        </form>
    </div>
</main>
@endsection