<header class="sticky top-0 z-50 shadow-lg backdrop-blur-md">
    {{-- Top bar --}}
    <div class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white text-xs">
        <div class="container mx-auto px-6 py-2 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-envelope text-white/90"></i>
                <span class="font-medium tracking-wide">{{ $profil->email ?? '' }}</span>
            </div>
            <div class="flex items-center space-x-4">
                @foreach ($media as $item)
                <a href="{{ $item->link }}" target="_blank" class="hover:text-yellow-300 transition-colors">
                    <i class="{{ $item->icon }}"></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="bg-gradient-to-r from-blue-50 via-blue-100 to-blue-200 shadow-sm">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-3">

                <div>
                    <p class="text-blue-900 font-bold text-xl leading-tight tracking-tight">
                    </p>
                    <p class="text-blue-700 font-bold text-xl leading-tight tracking-tight">
                    </p>
                </div>
            </a>
            {{-- Teks Tengah --}}
            <div class="hidden md:block">
                <p class="text-blue-900 font-bold text-lg tracking-wide">
                    BUKU TAMU DIGITAL UPT BKN BENGKULU
                </p>
            </div>

            {{-- Toggle for mobile --}}
            <button id="menu-toggle"
                class="text-blue-700 text-3xl md:hidden focus:outline-none hover:text-blue-900 transition">
                <i class="fas fa-bars"></i>
            </button>

            {{-- Menu Items --}}
            <div id="menu"
                class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-4 text-blue-800 font-medium absolute md:static top-full left-0 w-full md:w-auto bg-blue-50 md:bg-transparent shadow-lg md:shadow-none px-6 md:px-0 py-4 md:py-0 space-y-2 md:space-y-0 rounded-b-2xl md:rounded-none">

                {{-- Dropdown: Pemerintahan --}}
                <!-- <div class="relative group">
                    <button
                        class="w-full text-left px-4 py-2 rounded-md hover:bg-blue-200/70 transition flex items-center justify-between md:justify-start">
                        Pemerintahan <i class="fas fa-chevron-down text-xs ml-2"></i>
                    </button>
                    <div
                        class="dropdown-menu hidden group-hover:block md:absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-sm rounded-lg shadow-xl py-1 z-20 border border-blue-100">
                        <div class="relative">
                            <a href="#"
                                class="submenu-toggle block px-4 py-2 text-sm text-blue-800 hover:bg-blue-100 flex justify-between">
                                Kepala Daerah <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                            <div
                                class="submenu hidden absolute left-full top-0 w-56 bg-white/95 rounded-lg shadow-xl py-1 z-30 border border-blue-100">
                                <a href="{{ route('user.bupati') }}"
                                    class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Bupati</a>
                                <a href="{{ route('user.wakil-bupati') }}"
                                    class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Wakil Bupati</a>
                            </div>
                        </div>
                        <a href="{{ route('user.visi-misi') }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Visi dan Misi</a>
                    </div>
                </div> -->

                {{-- Dropdown: Profil Daerah --}}
                <!-- <div class="relative group">
                    <button
                        class="w-full text-left px-4 py-2 rounded-md hover:bg-blue-200/70 transition flex items-center justify-between md:justify-start">
                        Profil Daerah <i class="fas fa-chevron-down text-xs ml-2"></i>
                    </button>
                    <div
                        class="dropdown-menu hidden group-hover:block md:absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-sm rounded-lg shadow-xl py-1 z-20 border border-blue-100">
                        <a href="{{ route('user.gambaran-umum') }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Gambaran Umum</a>
                        <a href="{{ route('user.data-statistik') }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Data Statistik</a>
                    </div>
                </div> -->

                {{-- Dropdown: Media Informasi --}}
                <!-- <div class="relative group">
                    <button
                        class="w-full text-left px-4 py-2 rounded-md hover:bg-blue-200/70 transition flex items-center justify-between md:justify-start">
                        Media Informasi <i class="fas fa-chevron-down text-xs ml-2"></i>
                    </button>
                    <div
                        class="dropdown-menu hidden group-hover:block md:absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-sm rounded-lg shadow-xl py-1 z-20 border border-blue-100">
                        <a href="{{ route('user.berita') }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Berita</a>
                        <a href="{{ route('user.galeri') }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Galeri</a>
                        <a href="{{ route('user.artikel') }}"
                            class="block px-4 py-2 text-sm hover:bg-blue-100 text-blue-800">Artikel</a>
                    </div>
                </div> -->

                {{-- Simple Links --}}
                <!-- <a href="{{ route('user.penghargaan') }}"
                    class="block md:inline-block px-4 py-2 rounded-md hover:bg-blue-200/70 transition">
                    Penghargaan
                </a> -->
                <!-- <a href="{{ route('bukutamu.front') }}"
                    class="block md:inline-block px-4 py-2 rounded-md hover:bg-blue-200/70 transition">
                    Buku Tamu
                </a> -->
                <!-- <a href="/" class="block md:inline-block px-4 py-2 rounded-md hover:bg-blue-200/70 transition">
                    <i class="fas fa-camera-retro w-6"></i> Absen

                </a> -->
                @auth
                {{-- Jika user sudah login --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="block md:inline-block px-4 py-2 rounded-md hover:bg-green-600 hover:text-white transition bg-green-500 text-white md:bg-transparent md:text-green-800 md:hover:bg-green-600 md:hover:text-white">
                    Home
                </a>
                @else
                {{-- Jika user belum login --}}
                <a href="{{ route('login') }}"
                    class="block md:inline-block px-4 py-2 rounded-md hover:bg-blue-600 hover:text-white transition bg-blue-500 text-white md:bg-transparent md:text-blue-800 md:hover:bg-blue-600 md:hover:text-white">
                    Login
                </a>
                @endauth

            </div>
        </div>
    </nav>
</header>