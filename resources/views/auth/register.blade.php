
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

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
