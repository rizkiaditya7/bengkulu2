{{-- MODAL UNTUK TAMBAH ALBUM BARU --}}
<div id="tambah-modal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 p-6 text-gray-800">
        <h3 class="text-xl font-bold mb-4">Tambah Album Baru</h3>
        <form action="{{ route('admin.album.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block font-medium mb-2">Nama Album</label>
                <input type="text" name="nama" id="nama" class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                    required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg"></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" id="close-tambah-modal-btn"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">Batal</button>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL UNTUK EDIT ALBUM --}}
<div id="edit-modal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 p-6 text-gray-800">
        <h3 class="text-xl font-bold mb-4">Edit Album</h3>
        <form id="edit-album-form" action="" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="edit_nama" class="block font-medium mb-2">Nama Album</label>
                <input type="text" name="nama" id="edit_nama" class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                    required>
            </div>
            <div class="mb-4">
                <label for="edit_deskripsi" class="block font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="edit_deskripsi" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg"></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" id="close-edit-modal-btn"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">Batal</button>
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', () => {
    // Modal Tambah
    const tambahModal = document.getElementById('tambah-modal');
    document.getElementById('open-tambah-modal-btn').addEventListener('click', () => tambahModal.classList
        .add('active'));
    document.getElementById('close-tambah-modal-btn').addEventListener('click', () => tambahModal.classList
        .remove('active'));

    // Modal Edit
    const editModal = document.getElementById('edit-modal');
    const editForm = document.getElementById('edit-album-form');
    document.querySelectorAll('.open-edit-modal-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            editForm.action = btn.dataset.action;
            document.getElementById('edit_nama').value = btn.dataset.nama;
            document.getElementById('edit_deskripsi').value = btn.dataset.deskripsi;
            editModal.classList.add('active');
        });
    });
    document.getElementById('close-edit-modal-btn').addEventListener('click', () => editModal.classList
        .remove('active'));

    // Hapus Album
    document.querySelectorAll('.delete-album-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const albumId = btn.dataset.id;
            Swal.fire({
                title: 'Anda yakin ingin menghapus album ini?',
                text: "Semua foto di dalamnya juga akan terhapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${albumId}`).submit();
                }
            });
        });
    });
});
</script>