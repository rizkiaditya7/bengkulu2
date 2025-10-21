<div class="space-y-4">
    <!-- Gambar Struktur -->
    <div>
        <label class="block font-medium text-gray-800 mb-2">Gambar Struktur Organisasi</label>
        @if(isset($profil_organisasi) && $profil_organisasi->gambar_struktur)
        <div class="mb-3">
            <img src="{{ asset('storage/'.$profil_organisasi->gambar_struktur) }}" alt="Struktur Organisasi"
                class="w-40 rounded-lg shadow">
        </div>
        @endif
        <input type="file" name="gambar_struktur"
            class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Sumber -->
    <div>
        <label class="block font-medium text-gray-800 mb-2">Sumber</label>
        <input type="text" name="sumber" value="{{ old('sumber', $profil_organisasi->sumber ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Lokasi -->
    <div>
        <label class="block font-medium text-gray-800 mb-2">Lokasi</label>
        <input type="text" name="lokasi" value="{{ old('lokasi', $profil_organisasi->lokasi ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Embed Map -->
    <div>
        <label class="block font-medium text-gray-800 mb-2">Embed Map (Kode Google Maps)</label>
        <textarea name="embed_map" rows="3"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('embed_map', $profil_organisasi->embed_map ?? '') }}</textarea>
        <p class="text-sm text-gray-500 mt-1">Masukkan kode embed Google Maps (iframe).</p>
    </div>

    <!-- Keterangan -->
    <div>
        <label class="block font-medium text-gray-800 mb-2">Keterangan</label>
        <textarea name="keterangan" rows="3"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('keterangan', $profil_organisasi->keterangan ?? '') }}</textarea>
    </div>

    <!-- Email -->
    <div>
        <label class="block font-medium text-gray-800 mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email', $profil_organisasi->email ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Website -->
    <div>
        <label class="block font-medium text-gray-800 mb-2">Website</label>
        <input type="text" name="website" value="{{ old('website', $profil_organisasi->website ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
</div>