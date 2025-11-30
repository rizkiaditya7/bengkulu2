<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel helium01</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center p-4 
    bg-gradient-to-b from-sky-200 via-sky-100 to-white">

        <div class="w-full max-w-4xl lg:grid lg:grid-cols-2 
        bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl 
        overflow-hidden border border-sky-200">

            <!-- Sisi kiri -->
            <div class="hidden lg:flex flex-col items-center justify-center 
            bg-gradient-to-br from-blue-800 to-sky-600 p-12 text-white text-center">

                <img src="{{ asset('logo/logo_bkn.png') }}" class="w-40 h-48 mb-4">

                <p class="mt-2 text-sky-200 text-lg">Portal Masuk Panel Admin</p>
            </div>

            <!-- Sisi kanan -->
            <div class="p-8 md:p-12">

                <h2 class="hidden lg:block text-3xl font-bold text-blue-800 mb-2">
                    Selamat Datang
                </h2>
                <p class="hidden lg:block text-gray-600 mb-8">
                    Silakan masuk untuk melanjutkan
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" value="Alamat Email" class="font-semibold text-gray-700" />

                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-sky-500"></i>
                            </div>

                            <x-text-input id="email" class="block w-full pl-10 border-sky-300 
                                   focus:border-sky-500 focus:ring-sky-500" type="email" name="email"
                                placeholder="nama@email.com" required autofocus />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" value="Password" class="font-semibold text-gray-700" />

                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-sky-500"></i>
                            </div>

                            <x-text-input id="password" class="block w-full pl-10 border-sky-300
                                   focus:border-sky-500 focus:ring-sky-500" type="password" name="password"
                                placeholder="••••••••" required />
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4 text-sm">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-sky-600 
                                   shadow-sm focus:ring-sky-500">
                            <span class="ms-2 text-gray-600">Ingat Saya</span>
                        </label>

                        <!-- <a class="underline text-blue-800 hover:text-sky-600" href="{{ route('password.request') }}">
                            Lupa password?
                        </a> -->
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 rounded-md 
                               text-sm font-semibold text-white 
                               bg-gradient-to-r from-blue-800 to-sky-500 
                               hover:from-blue-900 hover:to-sky-600 
                               transition-all shadow-md">
                            Log In
                        </button>
                    </div>

                    <div class="mt-8 text-center text-sm">
                        <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-800 transition-colors">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Kembali ke Portal Utama
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>



</body>

</html>