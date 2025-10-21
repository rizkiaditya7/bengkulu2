<aside id="sidebar"
    class="w-64 bg-gray-800 p-4 flex-shrink-0 flex flex-col fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out z-40 sidebar-scroll overflow-y-auto">

    <!-- Tombol close hanya muncul di mode HP -->
    <div class="flex items-center justify-between md:justify-center py-4 mb-4 border-b border-gray-700">
        <div class="flex items-center">
            <i class="fas fa-shield-alt text-3xl text-blue-400"></i>
            <h1 class="text-2xl font-bold ml-3 text-white">Admin Panel</h1>
        </div>
        <button id="close-sidebar" class="md:hidden text-gray-300 hover:text-white">
            <i class="fas fa-times text-2xl"></i>
        </button>
    </div>

    <nav class="flex-grow">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-tachometer-alt w-6"></i>
            <span class="ml-4">Dashboard</span>
        </a>

        <p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">Profil</p>
        <a href="{{ route('admin.profil.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-user-tie w-6"></i>
            <span class="ml-4">Profil Daerah</span>
        </a>
        <a href="{{ route('admin.organisasi.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-user-tie w-6"></i>
            <span class="ml-4">Profil Organisasi</span>
        </a>
        <a href="{{ route('admin.media.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-user-tie w-6"></i>
            <span class="ml-4">Media Daerah</span>
        </a>
        <a href="{{ route('admin.heroes.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-user-tie w-6"></i>
            <span class="ml-4">Hero Media</span>
        </a>
        <a href="{{ route('admin.layanan.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-user-tie w-6"></i>
            <span class="ml-4">Layanan Daerah</span>
        </a>
        <a href="{{ route('admin.kepala-daerah') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-user-tie w-6"></i>
            <span class="ml-4">Kepala Daerah</span>
        </a>
        <a href="{{ route('admin.pejabat-daerah') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-users w-6"></i>
            <span class="ml-4">Pejabat Daerah</span>
        </a>

        <p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">Konten</p>
        <a href="{{ route('admin.berita') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-newspaper w-6"></i>
            <span class="ml-4">Berita</span>
        </a>
        <a href="{{ route('admin.artikel') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-pen-alt w-6"></i>
            <span class="ml-4">Artikel</span>
        </a>
        <a href="{{ route('admin.album') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-images w-6"></i>
            <span class="ml-4">Galeri</span>
        </a>
        <a href="{{ route('admin.visi.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-images w-6"></i>
            <span class="ml-4">Visi Misi</span>
        </a>
        <a href="{{ route('admin.penghargaan') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-award w-6"></i>
            <span class="ml-4">Penghargaan</span>
        </a>
        <p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">survei</p>
        <a href="{{ route('admin.pertanyaan.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-newspaper w-6"></i>
            <span class="ml-4">Pertanyaan</span>
        </a>
        <a href="{{ route('survei.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-newspaper w-6"></i>
            <span class="ml-4">Hasil Survei</span>
        </a>
        <p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">absensi</p>
        <a href="{{ route('bukutamu.index') }}"
            class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
            <i class="fas fa-newspaper w-6"></i>
            <span class="ml-4">Hasil Absensi</span>
        </a>
    </nav>

    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg text-left">
                <i class="fas fa-sign-out-alt w-6"></i>
                <span class="ml-4">Logout</span>
            </button>
        </form>
    </div>

</aside>