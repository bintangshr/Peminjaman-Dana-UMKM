{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMKM Desa - Peminjaman Dana</title>

    <!-- Gunakan CSS Breeze default atau custom CSS kamu -->
    <link href="{{ asset('css/landingpage.css') }}" rel="stylesheet">
    
    {{-- Bisa juga masukkan style di sini jika ingin inline --}}
</head>

<body>
    <!-- Header -->
    <header id="header">
        <div class="header-container">
            <div class="logo-container">
                <a href="{{ url('/') }}" class="logo">
                    <div class="logo-icon">🌾</div>
                    <h1>DANA UMKM DESA</h1>
                </a>
            </div>

            <div class="menu-toggle" id="menu-toggle">☰</div>

            <nav>
                <ul class="nav-links" id="nav-links">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#program">Program</a></li>
                    <li><a href="#proses">Proses</a></li>
                    <li><a href="{{ route('login') }}">Ajukan</a></li>
                    <li><a href="#testimoni">Testimoni</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
                <div class="auth-buttons">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline" style="border:none; background:none; cursor:pointer; padding:0; font:inherit; color:var(--primary);">
                                    Keluar
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="beranda" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/hero1.jpg') no-repeat center center; background-size: cover; height: 780px; display: flex; align-items: center; justify-content: center; text-align: center; color: white;">
        <div class="hero-content">
            <h2>Dukung UMKM Desa, Bangkitkan Ekonomi Lokal</h2>
            <p>Solusi pembiayaan dan pendampingan untuk membantu usaha mikro, kecil, dan menengah di desa Anda berkembang dan mencapai potensi maksimal.</p>
            <div class="hero-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary btn-large">Ajukan Pinjaman</a>
                <a href="#program" class="btn btn-outline btn-large">Pelajari Program</a>
            </div>
        </div>
        <div class="scroll-down" id="scroll-down">↓</div>
    </section>

    <!-- Features Section -->
    <section class="features section-light" id="program">
        <div class="container">
            <div class="section-title">
                <h2>Program Pinjaman Kami</h2>
            </div>
            <p class="section-subtitle">Kami menawarkan berbagai program pembiayaan yang dirancang khusus untuk kebutuhan UMKM di desa dengan suku bunga rendah dan proses yang mudah.</p>
            <div class="feature-container">
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Pinjaman Modal Usaha</h3>
                    <p>Pinjaman untuk modal kerja, pengembangan usaha, atau memulai usaha baru dengan suku bunga rendah mulai dari 3% per tahun dan tenor hingga 36 bulan.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛠️</div>
                    <h3>Pembiayaan Alat Produksi</h3>
                    <p>Dana khusus untuk pembelian peralatan, mesin, atau teknologi yang dibutuhkan untuk meningkatkan kapasitas dan kualitas produksi usaha Anda.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌱</div>
                    <h3>Dana Pertanian & Peternakan</h3>
                    <p>Program pembiayaan khusus untuk petani, peternak, dan usaha pengolahan hasil pertanian dengan jadwal pembayaran yang disesuaikan dengan masa panen.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Loan Process -->
    <section class="loan-process section-white" id="proses">
        <div class="container">
            <!-- Isi konten loan process jika ada -->
        </div>
    </section>

    <!-- Tambahkan section testimoni, kontak, dll sesuai kebutuhan -->

    <script>
        // Script toggle menu untuk mobile (jika kamu ingin implementasi)
        const menuToggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>
