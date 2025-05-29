<header class="bg-green-800 text-white p-4 shadow-md">
    <div class="container mx-auto flex items-center">
        <div class="flex items-center w-full max w-7x1 mx-auto gap-4 text-2xl">
            <div>🌾</div>
            <h1 class="font-bold">DANA UMKM DESA</h1>
        </div>

        <!-- Dropdown Profil Breeze -->
        <div class="ml-auto relative inline-block text-left">
            <button onclick="toggleDropdown()" class="flex items-center gap-2 text-white font-medium hover:underline focus:outline">
                {{ Auth::user()->name }}
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414L10 13.414l-4.707-4.707a1 1 0 010-1.414z"/>
                </svg>
            </button>

            <div id="dropdown" class="hidden absolute right-0 mt-2 w-40 bg-green-700 text-white rounded-md shadow-lg z-50">
    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-green-600 hover:text-white">Profil</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button method="submit" class="block px-4 py-2 hover:bg-green-600 hover:text-white">Keluar</button>
    </form>
</div>

        </div>
    </div>
</header>


<nav class="bg-green-900 text-white">
    <div class="container mx-auto">
        <ul class="flex space-x-8 p-3 flex-wrap md:flex-nowrap">
            <li><a href="{{ route('dashboard') }}" class="hover:underline">Beranda</a></li>
            
            <li><a href="{{ url('datadiri') }}" class="hover:underline">Ajukan Pinjaman</a></li>
            <li><a href="#program" class="hover:underline">Program</a></li>
            <li><a href="{{ url('status') }}" class="hover:underline">Status Pengajuan</a></li>
            <li><a href="#berita" class="hover:underline">Berita & Info</a></li>
            <li><a href="#tentang" class="hover:underline">Tentang Kami</a></li>
        </ul>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Optional: Tutup dropdown saat klik di luar
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown');
        const button = event.target.closest('button');
        if (!event.target.closest('#dropdown') && !button) {
            dropdown.classList.add('hidden');
        }
    });
</script>
