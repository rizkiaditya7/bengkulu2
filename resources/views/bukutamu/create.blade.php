@extends('front.layout')

@section('content')
<div class="w-full text-center mt-8 text-xl font-bold text-gray-700 mb-4">
    <div id="date"></div>
    <span id="clock"></span>
</div>

<div class="max-w-6xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
    <h3 class="text-2xl font-semibold text-blue-700 mb-6 text-center">📸 Tambah Buku Tamu Digital</h3>

    <form action="{{ route('bukutamu.store') }}" method="POST" enctype="multipart/form-data"
        class="grid md:grid-cols-2 gap-6">
        @csrf

        <!-- Bagian Kiri: Input Data -->
        <div class="space-y-4">
            <div>
                <label class="block font-medium mb-1 text-gray-700">Nama</label>
                <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                    required>
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">No. Handphone</label>
                <input type="text" name="no_hp"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Jabatan</label>
                <input type="text" name="jabatan"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Instansi</label>
                <input type="text" name="instansi"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block font-medium mb-1 text-gray-700">Tujuan Kunjungan</label>
                <select id="tujuan" name="tujuan" class="w-full border rounded-lg px-3 py-2">
                    <option value="">-- Pilih Tujuan --</option>

                    <option value="Mutasi">Mutasi</option>
                    <option value="Pengadaan CASN">Pengadaan CASN</option>
                    <option value="Pengangkatan">Pengangkatan</option>
                    <option value="Pemberhentian">Pemberhentian</option>
                    <option value="Pensiun">Pensiun</option>

                    <option value="Pembinaan">Pembinaan</option>
                    <option value="Pengawasan">Pengawasan</option>
                    <option value="Uji Kompetensi / Ujian Dinas">Uji Kompetensi / Ujian Dinas</option>
                    <option value="Kenaikan Pangkat">Kenaikan Pangkat</option>

                    <option value="Jenjang / Jabatan">Jenjang / Jabatan</option>
                    <option value="Kendala Aplikasi BKN">Kendala Aplikasi BKN</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>


            <!-- <div>
                <label class="block font-medium mb-1 text-gray-700">Atau Upload Manual</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            </div> -->
        </div>

        <!-- Bagian Kanan: Kamera -->
        <div class="flex flex-col items-center">
            <label class="block font-medium mb-2 text-gray-700">Ambil Foto (Kamera)</label>

            <video id="camera" width="320" height="240" autoplay class="border rounded-lg shadow-md"></video>

            <button type="button" id="capture"
                class="mt-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                📸 Ambil Foto
            </button>

            <canvas id="canvas" width="320" height="240" class="hidden mt-3 border rounded-lg shadow-md"></canvas>

            <div id="preview-container" class="mt-3 hidden">
                <p class="text-gray-600 text-sm mb-1 text-center">📷 Hasil Jepretan:</p>
                <img id="preview-image" src="" alt="Hasil Foto" class="rounded-lg shadow-lg border w-80">
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
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                💾 Simpan
            </button>
        </div>
    </form>
</div>

<!-- Script Kamera -->
<!-- TomSelect (Searchable Dropdown) -->
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

// Ambil foto
captureBtn.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataURL = canvas.toDataURL('image/png');
    fotoData.value = dataURL;

    // Tampilkan hasil jepretan
    previewContainer.classList.remove('hidden');
    previewImage.src = dataURL;
});

function updateDateTime() {
    const now = new Date();

    // Format tanggal Indonesia
    const dateOptions = {
        weekday: 'long',
        day: '2-digit',
        month: 'long',
        year: 'numeric',
        timeZone: 'Asia/Jakarta'
    };

    const timeOptions = {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false,
        timeZone: 'Asia/Jakarta'
    };

    document.getElementById('date').innerText =
        now.toLocaleDateString('id-ID', dateOptions);

    document.getElementById('clock').innerText =
        now.toLocaleTimeString('id-ID', timeOptions);
}

setInterval(updateDateTime, 1000);
updateDateTime();
</script>
@endsection