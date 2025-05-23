<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard') - Dana UMKM Desa</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-800">

    

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <footer class="bg-green-900 text-white p-6 mt-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <h3 class="font-bold mb-3">Dana UMKM Desa</h3>
                <p>Program pembiayaan dan pendampingan untuk mendukung pertumbuhan usaha mikro, kecil, dan menengah di desa.</p>
            </div>
            <div>
                <h3 class="font-bold mb-3">Kontak Kami</h3>
                <p>Kantor Desa Sejahtera</p>
                <p>Jl. Raya Desa No. 123</p>
                <p>Email: info@danaumkmdesa.id</p>
                <p>Telp: (021) 1234-5678</p>
            </div>
            <div>
                <h3 class="font-bold mb-3">Jam Operasional</h3>
                <p>Senin - Jumat: 08.00 - 16.00</p>
                <p>Sabtu: 09.00 - 13.00</p>
                <p>Minggu & Hari Libur: Tutup</p>
            </div>
            <div>
                <h3 class="font-bold mb-3">Tautan Penting</h3>
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="hover:underline">Beranda</a></li>
                    <li><a href="#tentang" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#program" class="hover:underline">Program Pinjaman</a></li>
                    <li><a href="{{ url('datadiri') }}" class="hover:underline">Ajukan Pinjaman</a></li>
                    <li><a href="#berita" class="hover:underline">Berita & Info</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-6 border-t border-green-700 pt-4">
            &copy; 2025 Dana UMKM Desa. Hak Cipta Dilindungi.
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
