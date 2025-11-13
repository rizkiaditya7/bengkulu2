<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->nama ?? 'Nama Perusahaan' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    @include('front.sessions.navbar')

    <main>
        @yield('content')
    </main>
    @include('front.sessions.footer')
    @stack('scripts')

    <script>
    // Menunggu hingga seluruh dokumen HTML selesai dimuat
    document.addEventListener('DOMContentLoaded', function() {

        // Mengambil semua tombol yang akan memicu dropdown
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(event) {
                // Menghentikan event agar tidak langsung ditangkap oleh 'window'
                event.stopPropagation();

                // Menemukan menu dropdown yang sesuai (elemen saudara berikutnya)
                const dropdownMenu = this.nextElementSibling;

                // Menutup semua dropdown lain yang mungkin sedang terbuka
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) {
                        menu.classList.add('hidden');
                    }
                });

                // Membuka atau menutup dropdown yang diklik
                dropdownMenu.classList.toggle('hidden');
            });
        });

        // 3. Logika untuk Submenu (nested dropdown)
        const submenuToggles = document.querySelectorAll('.submenu-toggle');

        submenuToggles.forEach(toggle => {
            toggle.addEventListener('click', function(event) {
                // Cegah link berpindah halaman saat diklik
                event.preventDefault();
                event.stopPropagation();

                const submenu = this.nextElementSibling;

                // Tutup semua submenu lain pada level yang sama
                const parentMenu = this.closest('.dropdown-menu');
                parentMenu.querySelectorAll('.submenu').forEach(s => {
                    if (s !== submenu) {
                        s.classList.add('hidden');
                    }
                });

                submenu.classList.toggle('hidden');
            });
        });

        window.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        });
    });
    </script>

    <script>
    // Toggle menu pada mobile
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('menu').classList.toggle('hidden');
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    const swiper = new Swiper('.hero-slider', {
        // Opsi untuk membuat slider berputar terus menerus
        loop: true,

        // Opsi untuk efek transisi (bisa 'slide' atau 'fade')
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },

        // Opsi untuk gambar bergeser otomatis
        autoplay: {
            delay: 5000, // Waktu dalam milidetik (5 detik)
            disableOnInteraction: false, // Terus berjalan meskipun di-klik
        },

        // Paginasi (titik-titik navigasi)
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Tombol navigasi (panah kiri dan kanan)
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    </script>

</body>

</html>