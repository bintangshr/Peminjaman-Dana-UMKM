<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- --}}
        
        <style>
            body { margin: 0; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-green-50 dark:bg-gray-900"> {{-- Ubah background utama jika diinginkan, misal bg-green-50 --}}
            {{-- Navigasi Khusus Admin dengan Tema Hijau --}}
            <nav x-data="{ open: false }" class="bg-green-800 dark:bg-green-900 border-b border-green-700 dark:border-green-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('admin.dashboard') }}">
                                    {{-- Ganti dengan logo admin Anda jika ada --}}
                                    {{-- Untuk sementara bisa pakai teks atau emoji seperti di navbar user --}}
                                    <div class="text-white text-2xl">🌾</div> 
                                </a>
                                <span class="ml-3 font-semibold text-xl text-white dark:text-green-100">Admin DANA UMKM</span>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                                    class="text-green-100 hover:text-white dark:text-green-300 dark:hover:text-green-100 focus:border-green-300">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                                {{-- 
                                <x-nav-link :href="route('admin.applications.index')" :active="request()->routeIs('admin.applications.*')"
                                    class="text-green-100 hover:text-white dark:text-green-300 dark:hover:text-green-100 focus:border-green-300">
                                    {{ __('Pengajuan') }}
                                </x-nav-link>
                                <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')"
                                    class="text-green-100 hover:text-white dark:text-green-300 dark:hover:text-green-100 focus:border-green-300">
                                    {{ __('Pengguna') }}
                                </x-nav-link>
                                --}}
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-green-100 dark:text-green-300 bg-green-800 dark:bg-green-900 hover:text-white dark:hover:text-green-100 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="contentClasses">py-1 bg-green-700 dark:bg-green-800</x-slot> {{-- Sesuaikan warna dropdown --}}
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')" class="text-green-100 hover:bg-green-600 dark:text-green-200 dark:hover:bg-green-700">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                                class="text-green-100 hover:bg-green-600 dark:text-green-200 dark:hover:bg-green-700">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <div class="-me-2 flex items-center sm:hidden">
                             <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-green-200 dark:text-green-400 hover:text-white dark:hover:text-green-100 hover:bg-green-700 dark:hover:bg-green-800 focus:outline-none focus:bg-green-700 dark:focus:bg-green-800 focus:text-white dark:focus:text-green-100 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-green-800 dark:bg-green-900">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                            class="text-green-100 border-green-300 focus:text-white focus:bg-green-700 focus:border-green-300 dark:text-green-200 dark:border-green-700 dark:focus:text-green-100 dark:focus:bg-green-800 dark:focus:border-green-600">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                        {{-- Tambahkan responsive link admin lain di sini --}}
                    </div>

                    <div class="pt-4 pb-1 border-t border-green-600 dark:border-green-700">
                        <div class="px-4">
                            <div class="font-medium text-base text-white dark:text-green-100">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-green-300 dark:text-green-400">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')"
                                class="text-green-100 border-transparent hover:text-white hover:bg-green-700 hover:border-green-300 focus:text-white focus:bg-green-700 focus:border-green-300 dark:text-green-200 dark:hover:text-green-100 dark:hover:bg-green-800 dark:hover:border-green-600">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-green-100 border-transparent hover:text-white hover:bg-green-700 hover:border-green-300 focus:text-white focus:bg-green-700 focus:border-green-300 dark:text-green-200 dark:hover:text-green-100 dark:hover:bg-green-800 dark:hover:border-green-600">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>