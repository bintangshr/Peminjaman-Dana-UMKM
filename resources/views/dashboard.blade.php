@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/hero1.jpg') no-repeat center center; background-size: cover; height: 660px; display: flex; align-items: center; justify-content: center; text-align: center; color: white;">
    <div class="hero-content max-w-3xl p-8">
        <h2 class="text-4xl mb-10">Solusi Pembiayaan UMKM di Desa Anda</h2>
        <p class="text-xl mb-6">Memberikan pendanaan dan pendampingan terbaik untuk mengembangkan usaha mikro, kecil, dan menengah.</p>
        <a href="{{ url('datadiri') }}" class="btn inline-block bg-green-400 hover:bg-green-500 text-white font-bold py-3 px-6 rounded">Ajukan Pinjaman Sekarang</a>
    </div>
</section>

<!-- Program Pinjaman Section -->
<section id="program" class="features bg-green-50 py-16">
    <div class="section-title mb-12">
        <h2 class="text-3xl font-semibold text-green-800 relative inline-block pb-2">Program Pinjaman</h2>
    </div>
    <div class="feature-container">
        <div class="feature-card">
            <div class="feature-icon">💰</div>
            <h3 class="text-xl font-semibold text-green-900 text-center mb-4">Pinjaman Modal Usaha</h3>
            <p>Membantu modal kerja bagi pelaku usaha mikro untuk pengembangan bisnis dengan bunga ringan dan proses cepat.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🏠</div>
            <h3 class="text-xl font-semibold text-green-900 text-center mb-4">Pinjaman Investasi</h3>
            <p>Dana investasi untuk pembelian aset usaha, alat produksi, dan perbaikan fasilitas usaha yang dibutuhkan.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🤝</div>
            <h3 class="text-xl font-semibold text-green-900 text-center mb-4">Pendampingan Usaha</h3>
            <p>Pendampingan bisnis untuk membantu pelaku UMKM meningkatkan kapasitas usaha dan pemasaran produk.</p>
        </div>
    </div>
</section>

<!-- Proses Peminjaman -->
<section id="tentang" class="loan-process py-16 bg-white">
    <div class="section-title mb-12">
        <h2 class="text-3xl font-semibold text-green-800 relative inline-block pb-2">Proses Peminjaman</h2>
    </div>
    <div class="process-steps flex flex-wrap justify-center gap-6">
        <div class="step max-w-xs text-center">
            <div class="step-number mx-auto mb-4">1</div>
            <div class="step-content p-6 bg-green-50 rounded shadow h-full">
                <h3 class="step-title font-semibold text-green-900 mb-2">Pengajuan Online</h3>
                <p>Mengisi formulir pengajuan pinjaman melalui website kami secara mudah dan cepat.</p>
            </div>
        </div>
        <div class="step max-w-xs text-center">
            <div class="step-number mx-auto mb-4">2</div>
            <div class="step-content p-6 bg-green-50 rounded shadow h-full">
                <h3 class="step-title font-semibold text-green-900 mb-2">Verifikasi</h3>
                <p>Tim kami akan memverifikasi data dan kelengkapan dokumen pengajuan pinjaman.</p>
            </div>
        </div>
        <div class="step max-w-xs text-center">
            <div class="step-number mx-auto mb-4">3</div>
            <div class="step-content p-6 bg-green-50 rounded shadow h-full">
                <h3 class="step-title font-semibold text-green-900 mb-2">Pencairan Dana</h3>
                <p>Dana pinjaman akan dicairkan setelah proses persetujuan dan penandatanganan kontrak.</p>
            </div>
        </div>
        <div class="step max-w-xs text-center">
            <div class="step-number mx-auto mb-4">4</div>
            <div class="step-content p-6 bg-green-50 rounded shadow h-full">
                <h3 class="step-title font-semibold text-green-900 mb-2">Pendampingan</h3>
                <p>Kami memberikan pendampingan usaha agar pinjaman dapat digunakan secara optimal.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section id="berita" class="testimonials py-16 bg-white">
    <div class="section-title mb-12">
        <h2 class="text-3xl font-semibold text-green-800 relative inline-block pb-2">Testimoni</h2>
    </div>
    <div class="testimonial-container flex flex-wrap justify-center gap-6">
        <div class="testimonial max-w-xs bg-green-50 p-6 rounded shadow">
            <p class="testimonial-text italic relative mb-4">"Dana UMKM Desa sangat membantu saya dalam mengembangkan usaha kecil saya. Prosesnya cepat dan mudah."</p>
            <div class="testimonial-author flex items-center gap-4">
                <div class="author-avatar rounded-full bg-gray-300 w-12 h-12 overflow-hidden"></div>
                <div class="author-info">
                    <h4 class="font-semibold">Siti Nurhaliza</h4>
                    <p class="text-sm text-gray-700">Pengusaha Makanan Ringan</p>
                </div>
            </div>
        </div>
        <div class="testimonial max-w-xs bg-green-50 p-6 rounded shadow">
            <p class="testimonial-text italic relative mb-4">"Pendampingan yang diberikan membuat usaha saya semakin maju dan terstruktur dengan baik."</p>
            <div class="testimonial-author flex items-center gap-4">
                <div class="author-avatar rounded-full bg-gray-300 w-12 h-12 overflow-hidden"></div>
                <div class="author-info">
                    <h4 class="font-semibold">Budi Santoso</h4>
                    <p class="text-sm text-gray-700">Pemilik Toko Kelontong</p>
                </div>
            </div>
        </div>
        <div class="testimonial max-w-xs bg-green-50 p-6 rounded shadow">
            <p class="testimonial-text italic relative mb-4">"Terima kasih Dana UMKM Desa, usaha saya jadi lebih berkembang dan pendapatan meningkat."</p>
            <div class="testimonial-author flex items-center gap-4">
                <div class="author-avatar rounded-full bg-gray-300 w-12 h-12 overflow-hidden"></div>
                <div class="author-info">
                    <h4 class="font-semibold">Ani Wijaya</h4>
                    <p class="text-sm text-gray-700">Penjahit Pakaian</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
