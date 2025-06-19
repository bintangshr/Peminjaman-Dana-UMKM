<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#16a34a',
                        accent: '#22c55e',
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 bg-[url('/images/hero1.jpg')] bg-cover bg-center bg-no-repeat relative">
    <div class="absolute inset-0 bg-black/40 -z-10"></div>
    <!-- Decorative Elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <!-- Top-right blob -->
        <div class="absolute -top-64 -right-64 w-96 h-96 rounded-full bg-gradient-to-br from-primary/20 to-accent/20 blur-3xl"></div>
        <!-- Bottom-left blob -->
        <div class="absolute -bottom-64 -left-64 w-96 h-96 rounded-full bg-gradient-to-tr from-accent/20 to-primary/20 blur-3xl"></div>
    </div>

    <!-- Decorative Blobs -->
    <!-- <div class="blob w-96 h-96 bg-green-200/50 -top-48 -left-48"></div>
    <div class="blob w-96 h-96 bg-emerald-200/50 -bottom-48 -right-48"></div> -->

    <!-- Back to Home -->
    <a href="/" class="absolute top-6 left-6 text-xl text-white hover:text-gray-100 transition-colors duration-300 flex items-center gap-2 group">
    <svg class="w-5 h-5 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    <span>Kembali ke Beranda</span>
    </a>

    <!-- Register Container -->
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-2xl p-10 space-y-8 z-20">
        <!-- Logo -->
        <div class="text-center p-6 border-b border-gray-100">
            <div class="text-5xl mb-2">🌾</div>
            <h1 class="text-3xl font-bold text-green-500">DANA UMKM DESA</h1>
            <p class="text-gray-500 mt-2">Pendaftaran Anggota Baru</p>
        </div>

        <div class="p-6">
            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 rounded-xl bg-green-50 border-l-4 border-green-500 text-green-700 animate-fade-in">
                    {{ session('status') }}

                </div>
                <h1 class="text-xl font-bold gradient-text">DANA UMKM DESA</h1>
            </a>
        </div>
    </header>
    <main class="flex flex-col items-center justify-center min-h-[80vh] px-4">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 md:p-10 mt-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Daftar Akun Baru</h2>
            <p class="text-gray-500 mb-6 text-center">Bergabung dan dapatkan kemudahan akses layanan UMKM Desa.</p>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block font-medium text-gray-700 mb-1">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="block w-full bg-gray-50 border border-gray-200 text-gray-700 focus:border-primary focus:ring-primary rounded-lg shadow-sm px-4 py-3">
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="block w-full bg-gray-50 border border-gray-200 text-gray-700 focus:border-primary focus:ring-primary rounded-lg shadow-sm px-4 py-3">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="block w-full bg-gray-50 border border-gray-200 text-gray-700 focus:border-primary focus:ring-primary rounded-lg shadow-sm px-4 py-3">
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="block w-full bg-gray-50 border border-gray-200 text-gray-700 focus:border-primary focus:ring-primary rounded-lg shadow-sm px-4 py-3">
                    @error('password_confirmation')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-accent text-white font-bold rounded-xl py-3 transition-all duration-300 shadow">
                    Daftar
                </button>
            </form>
            <div class="mt-6 text-center text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Login di sini</a>
            </div>
        </div>
    </main>
</body>
</html>
