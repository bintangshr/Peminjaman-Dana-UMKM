@extends('layouts.app')

@section('title', 'Dashboard')

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center hero-pattern" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)), url('/images/hero1.jpg') no-repeat center center; background-size: cover;">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in-down">
                Solusi <span class="text-accent">Pembiayaan UMKM</span> 
                <br class="hidden sm:block">di Desa Anda
            </h2>
            <p class="text-lg sm:text-xl text-gray-200 mb-8 max-w-3xl mx-auto animate-fade-in-up">
                Memberikan pendanaan dan pendampingan terbaik untuk mengembangkan usaha mikro, kecil, dan menengah.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up">
                <a href="{{ url('datadiri') }}" class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-primary to-accent hover:from-secondary hover:to-primary text-white font-semibold rounded-xl transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
                    Ajukan Pinjaman Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Program Section -->
<section id="program" class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Program <span class="gradient-text">Pinjaman Kami</span>
            </h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    💰
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Pinjaman Modal Usaha</h3>
                <p class="text-gray-600 leading-relaxed">Membantu modal kerja bagi pelaku usaha mikro untuk pengembangan bisnis dengan bunga ringan dan proses cepat.</p>
            </div>
            <!-- Card 2 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    🏠
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Pinjaman Investasi</h3>
                <p class="text-gray-600 leading-relaxed">Dana investasi untuk pembelian aset usaha, alat produksi, dan perbaikan fasilitas usaha yang dibutuhkan.</p>
            </div>
            <!-- Card 3 -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    🤝
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Pendampingan Usaha</h3>
                <p class="text-gray-600 leading-relaxed">Pendampingan bisnis untuk membantu pelaku UMKM meningkatkan kapasitas usaha dan pemasaran produk.</p>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-gradient-to-br from-primary/5 to-accent/5" id="proses">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Proses <span class="gradient-text">Pengajuan</span>
            </h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center group">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        1
                    </div>
                    <div class="hidden lg:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-primary/50 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pengajuan Online</h3>
                <p class="text-gray-600">Mengisi formulir pengajuan pinjaman melalui website kami secara mudah dan cepat.</p>
            </div>
            <!-- Step 2 -->
            <div class="text-center group">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        2
                    </div>
                    <div class="hidden lg:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-primary/50 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Verifikasi</h3>
                <p class="text-gray-600">Tim kami akan memverifikasi data dan kelengkapan dokumen pengajuan pinjaman.</p>
            </div>
            <!-- Step 3 -->
            <div class="text-center group">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        3
                    </div>
                    <div class="hidden lg:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-primary/50 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pencairan Dana</h3>
                <p class="text-gray-600">Dana pinjaman akan dicairkan setelah proses persetujuan dan penandatanganan kontrak.</p>
            </div>
            <!-- Step 4 -->
            <div class="text-center group">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        4
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pendampingan</h3>
                <p class="text-gray-600">Kami memberikan pendampingan usaha agar pinjaman dapat digunakan secara optimal.</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Statistik <span class="gradient-text">Pengajuan</span>
            </h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                Penyebaran pengajuan yang telah disetujui berdasarkan dusun.
            </p>
        </div>
        
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                <canvas id="statistikChart" class="w-full h-[400px]"></canvas>
            </div>
        </div>
    </div>
</section>

<script>
    // Fetch and render statistik chart
    fetch('/statistik-dusun?_=' + new Date().getTime())
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Statistics data:', data); // Debug log
            const ctx = document.getElementById('statistikChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Jumlah Pengajuan Disetujui',
                        data: data.data,
                        backgroundColor: '#22c55e',
                        borderColor: '#16a34a',
                        borderWidth: 1,
                        borderRadius: 8,
                        maxBarThickness: 50
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Statistik Pengajuan per Dusun'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error loading statistics:', error);
            document.getElementById('statistikChart').insertAdjacentHTML('afterend', 
                '<div class="text-red-500 text-center mt-4">Error loading statistics. Please check the console for details.</div>'
            );
        });
</script>

<!-- Testimonials Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white" id="testimoni">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Apa Kata Mereka <span class="gradient-text">Tentang Kami</span>
            </h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                Testimoni dari para pelaku UMKM yang telah merasakan manfaat dari program kami.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-accent flex items-center justify-center text-white text-xl mr-4">
                        A
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Ahmad Fauzi</h3>
                        <p class="text-gray-500">Pemilik Toko Oleh-Oleh</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "Program pinjaman modal usaha sangat membantu saya dalam mengembangkan toko oleh-oleh khas daerah. Prosesnya cepat dan mudah, serta bunganya yang rendah membuat saya terbantu sekali."
                </p>
                <div class="flex items-center">
                    <span class="text-primary font-semibold">⭐⭐⭐⭐⭐</span>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-accent flex items-center justify-center text-white text-xl mr-4">
                        S
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Siti Aminah</h3>
                        <p class="text-gray-500">Petani Sayur Organik</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "Saya sangat terbantu dengan adanya program pembiayaan alat produksi ini. Kini saya bisa membeli alat pertanian modern yang mempercepat proses panen dan meningkatkan kualitas sayur saya."
                </p>
                <div class="flex items-center">
                    <span class="text-primary font-semibold">⭐⭐⭐⭐⭐</span>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-accent flex items-center justify-center text-white text-xl mr-4">
                        R
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Rudi Hartono</h3>
                        <p class="text-gray-500">Pengusaha Kecil</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "Proses pengajuan pinjaman di DANA UMKM DESA sangat transparan dan cepat. Saya hanya perlu menunggu 2 hari kerja untuk mendapatkan kepastian. Sangat memuaskan!"
                </p>
                <div class="flex items-center">
                    <span class="text-primary font-semibold">⭐⭐⭐⭐⭐</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-primary to-accent">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6">
            Siap Mengembangkan Usaha Anda?
        </h2>
        <p class="text-lg sm:text-xl text-gray-100 mb-8 max-w-2xl mx-auto">
            Bergabunglah dengan ribuan UMKM yang telah merasakan manfaat program pembiayaan kami.
        </p>
        <a href="{{ url('datadiri') }}" class="inline-block px-8 py-4 bg-white text-primary hover:text-secondary font-semibold rounded-xl transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
            Mulai Sekarang
        </a>
    </div>
</section>
@endsection
