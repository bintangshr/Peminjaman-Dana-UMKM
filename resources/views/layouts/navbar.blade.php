<header class="bg-green-800 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center gap-4 text-2xl">
            <div>🌾</div>
            <h1 class="font-bold">DANA UMKM DESA</h1>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded font-semibold">Logout</button>
        </form>
    </div>
</header>

<nav class="bg-green-900 text-white">
    <div class="container mx-auto">
        <ul class="flex space-x-8 p-3 flex-wrap md:flex-nowrap">
            <li><a href="{{ route('dashboard') }}" class="hover:underline">Beranda</a></li>
            <li><a href="{{ route('profile.show') }}" class="hover:underline">Profil</a></li>
            <li><a href="{{ url('datadiri') }}" class="hover:underline">Ajukan Pinjaman</a></li>
            <li><a href="#program" class="hover:underline">Program</a></li>
            <li><a href="{{ url('status') }}" class="hover:underline">Status Pengajuan</a></li>
            <li><a href="#berita" class="hover:underline">Berita & Info</a></li>
            <li><a href="#tentang" class="hover:underline">Tentang Kami</a></li>
        </ul>
    </div>
</nav>
