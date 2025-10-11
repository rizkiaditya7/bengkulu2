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

    <div class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-b from-blue-100 via-sky-100 to-white">
        <div
            class="w-full max-w-4xl lg:grid lg:grid-cols-2 bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden border border-blue-100">

            <!-- Sisi kiri -->
            <div
                class="hidden lg:flex flex-col items-center justify-center bg-gradient-to-br from-sky-600 to-blue-700 p-12 text-white text-center">
                <img src="{{ asset('storage/' . ($profil->logo ?? '')) }}" alt="Logo Kabupaten helium01"
                    class="w-28 h-28 mb-4">
                <h1 class="text-3xl font-extrabold tracking-wide">{{ $profil->nama ?? 'Nama Perusahaan' }}</h1>
                <p class="mt-2 text-sky-200 text-lg">Portal Masuk Panel Admin</p>
            </div>

            <!-- Sisi kanan (form login) -->
            <div class="p-8 md:p-12">
                <!-- Logo mobile -->
                <div class="lg:hidden text-center mb-8">
                    <img src="data:image/png;base64,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"
                        alt="Logo Kabupaten helium01" class="w-20 h-20 mx-auto mb-2">
                    <h2 class="text-2xl font-bold text-gray-800">Admin Login</h2>
                </div>

                <h2 class="hidden lg:block text-3xl font-bold text-blue-800 mb-2">Selamat Datang</h2>
                <p class="hidden lg:block text-gray-600 mb-8">Silakan masuk untuk melanjutkan</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" value="Alamat Email" class="font-semibold text-gray-700" />
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <x-text-input id="email"
                                class="block w-full pl-10 border-gray-300 focus:border-sky-500 focus:ring-sky-500"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" placeholder="nama@email.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" value="Password" class="font-semibold text-gray-700" />
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <x-text-input id="password"
                                class="block w-full pl-10 border-gray-300 focus:border-sky-500 focus:ring-sky-500"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4 text-sm">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-sky-600 shadow-sm focus:ring-sky-500"
                                name="remember">
                            <span class="ms-2 text-gray-600">Ingat Saya</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class="underline text-sky-700 hover:text-blue-700" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                        @endif
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 rounded-md text-sm font-semibold text-white bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 transition-all shadow-md">
                            Log In
                        </button>
                    </div>

                    <div class="mt-8 text-center text-sm">
                        <a href="{{ url('/') }}" class="text-gray-600 hover:text-sky-700 transition-colors">
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