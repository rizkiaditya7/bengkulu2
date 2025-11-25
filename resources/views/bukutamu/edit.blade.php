@extends('front.layout')

@section('content')
<div class="w-full text-center mt-8 text-xl font-bold text-gray-700 mb-4">
    <div id="date"></div>
    <span id="clock"></span>
</div>

<div class="max-w-6xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
    <h3 class="text-2xl font-semibold text-blue-700 mb-6 text-center">
        ✏️ Edit Buku Tamu Digital
    </h3>

    <form action="{{ route('bukutamu.update', $bukutamu->id) }}" method="POST" enctype="multipart/form-data"
        class="grid md:grid-cols-2 gap-6">
        @csrf
        @method('PUT')

        <!-- Bagian Kiri -->
        <div class="space-y-4">
            <div>
                <label class="block font-medium mb-1 text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ $bukutamu->nama }}"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">No. Handphone</label>
                <input type="text" name="no_hp" value="{{ $bukutamu->no_hp }}"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $bukutamu->jabatan }}"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Instansi</label>
                <input type="text" name="instansi" value="{{ $bukutamu->instansi }}"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Tujuan Kunjungan</label>
                <select id="tujuan" name="tujuan"
                    class="w-full border rounded-lg px-4 py-3 text-lg focus:ring focus:ring-blue-300">
                    <option value="">-- Pilih Tujuan --</option>

                    @foreach([
                    'Mutasi','Pengadaan CASN','Pengangkatan','Pemberhentian',
                    'Pensiun','Pembinaan','Pengawasan',
                    'Uji Kompetensi / Ujian Dinas','Kenaikan Pangkat',
                    'Jenjang / Jabatan','Kendala Aplikasi BKN','Lainnya'
                    ] as $item)
                    <option value="{{ $item }}" {{ $bukutamu->tujuan == $item ? 'selected' : '' }}>
                        {{ $item }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Bagian Kanan: Kamera -->
        <div class="flex flex-col items-center">

            <label class="block font-medium mb-2 text-gray-700">Foto Saat Ini</label>

            @if($bukutamu->foto)
            <img src="{{ asset($bukutamu->foto) }}" class="w-56 rounded-lg shadow-md mb-4">
            @else
            <p class="text-gray-500">Belum ada foto</p>
            @endif

            <label class="block font-medium mb-2 text-gray-700">Ambil Foto Baru (Opsional)</label>

            <video id="camera" width="320" height="240" autoplay class="border rounded-lg shadow-md"></video>

            <button type="button" id="capture"
                class="mt-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                📸 Ambil Foto Baru
            </button>

            <canvas id="canvas" width="320" height="240" class="hidden mt-3 border rounded-lg shadow-md"></canvas>

            <div id="preview-container" class="mt-3 hidden">
                <p class="text-gray-600 text-sm mb-1 text-center">📷 Hasil Foto Baru:</p>
                <img id="preview-image" src="" class="rounded-lg shadow-lg border w-80">
            </div>

            <input type="hidden" name="foto_data" id="foto_data">
        </div>

        <!-- Tombol Aksi -->
        <div class="col-span-2 flex justify-end mt-6 space-x-3">
            <a href="{{ route('bukutamu.index') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg transition">
                ← Kembali
            </a>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 text-lg rounded-lg transition">
                💾 Update
            </button>
        </div>
    </form>
</div>

<!-- TomSelect -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
new TomSelect("#tujuan", {
    create: false,
    sortField: {
        field: "text",
        direction: "asc"
    },
    placeholder: "Cari tujuan kunjungan..."
});
</script>

<!-- Script Kamera -->
<script>
const video = document.getElementById('camera');
const canvas = document.getElementById('canvas');
const captureBtn = document.getElementById('capture');
const fotoData = document.getElementById('foto_data');
const previewContainer = document.getElementById('preview-container');
const previewImage = document.getElementById('preview-image');

// Aktifkan kamera
navigator.mediaDevices.getUserMedia({
        video: true
    })
    .then(stream => video.srcObject = stream)
    .catch(err => alert('Tidak dapat mengakses kamera: ' + err));

// Ambil foto baru
captureBtn.addEventListener('click', () => {
    const ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataURL = canvas.toDataURL('image/png');
    fotoData.value = dataURL;

    previewContainer.classList.remove('hidden');
    previewImage.src = dataURL;
});

// Jam real-time
function updateDateTime() {
    const now = new Date();
    document.getElementById('date').innerText =
        now.toLocaleDateString('id-ID', {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric',
            timeZone: 'Asia/Jakarta'
        });

    document.getElementById('clock').innerText =
        now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false,
            timeZone: 'Asia/Jakarta'
        });
}
setInterval(updateDateTime, 1000);
updateDateTime();
</script>
@endsection