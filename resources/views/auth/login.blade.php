<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMKM Desa - Peminjaman Dana</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Custom Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#16a34a',
                        secondary: '#15803d',
                        accent: '#22c55e',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'fade-in-down': 'fadeInDown 0.6s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                    }
                }
            }
        }
    </script>

    <!-- Custom Animation CSS -->
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>



<div class="min-h-screen flex items-center justify-center px-4 bg-[url('/images/hero1.jpg')] bg-cover bg-center bg-no-repeat relative">
    <div class="absolute inset-0 bg-black/40 z-10"></div>

    <div class="w-full max-w-xl bg-white rounded-2xl shadow-2xl p-10 space-y-8 z-20">
        <!-- Back to Home -->
    <a href="/" class="absolute top-6 left-6 text-xl text-white hover:text-gray-100 transition-colors duration-300 flex items-center gap-2 group">
    <svg class="w-5 h-5 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    <span>Kembali ke Beranda</span>
    </a>

        <!-- Logo -->
        <div class="text-center">
            <div class="text-5xl mb-2">🌾</div>
            <h1 class="text-3xl font-bold text-green-500">DANA UMKM DESA</h1>
            <h2 class="text-gray-500 mt-2 ">Login Pengguna</h2>
        </div>

        

        @if ($errors->any())
            <div class="text-red-400 text-base text-center">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('status'))
            <div class="text-green-400 text-base text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-lg font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-2 w-full px-4 py-3 text-black border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-600 shadow-sm" />
                @error('email')
                    <span class="text-sm text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-lg font-medium">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-2 w-full px-4 py-3 text-black border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-600 shadow-sm" />
                @error('password')
                    <span class="text-sm text-red-300">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right text-base">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-green-500 hover:underline">Lupa password?</a>
                @endif
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-200 font-semibold text-lg">
                Login
            </button>
        </form>

        <div class="flex items-center my-4">
            <span class="flex-grow h-px bg-gray-300"></span>
            <p class="px-3 text-gray-300 text-base">atau</p>
            <span class="flex-grow h-px bg-gray-300"></span>
        </div>

        <p class="text-center text-lg">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-green-500 hover:underline font-semibold">Daftar</a>
        </p>
    </div>
</div>
