<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - {{ config('app.name', 'UMKM App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    
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
                        'fade-in-up': 'fadeInUp 0.5s ease-out',
                        'fade-in': 'fadeIn 0.5s ease-out',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
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

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            z-index: -1;
        }

        input:focus {
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
            border-color: #16a34a;
        }

        .gradient-text {
            background-image: linear-gradient(to right, #16a34a, #15803d, #22c55e);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
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
            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border-l-4 border-red-500 text-red-700 animate-fade-in">
                    <p class="font-semibold">Mohon periksa form berikut:</p>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
    
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                            class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                            placeholder="Masukkan nama lengkap">
                        @if ($errors->has('name'))
                            <div class="mt-2 text-sm text-red-600">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                            placeholder="nama@email.com">
                        @if ($errors->has('email'))
                            <div class="mt-2 text-sm text-red-600">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required
                            class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                            placeholder="Minimal 8 karakter">
                        @if ($errors->has('password'))
                            <div class="mt-2 text-sm text-red-600">
                                {{ $errors->first('password') }}
                            </div> 
                        @endif
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all"
                            placeholder="Ulangi password">
                        @if ($errors->has('password_confirmation'))
                            <div class="mt-2 text-sm text-red-600">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Register Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 rounded-xl bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white font-semibold shadow-lg shadow-green-500/30 transition-all duration-300 hover:shadow-green-600/40">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
