@extends('layouts.admin')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Dashboard - Peminjaman Dana UMKM Desa') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold mb-6">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-8">Pusat kendali untuk mengelola aplikasi peminjaman dana UMKM Desa.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                            <h4 class="text-lg font-semibold mb-2">Pengajuan Perlu Review</h4>
                            <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">
                                {{ $pendingApplicationsCount ?? 0 }}
                            </p>
                            <a href="{{ route('admin.pengajuan.index', ['status' => 'pending_review']) }}" class="mt-3 inline-block text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Lihat Detail &rarr;</a>
                        </div>

                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                            <h4 class="text-lg font-semibold mb-2">Pengajuan Disetujui</h4>
                            <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                                {{ $approvedApplicationsCount ?? 0 }}
                            </p>
                            <a href="{{ route('admin.pengajuan.index', ['status' => 'approved']) }}" class="mt-3 inline-block text-sm text-green-600 dark:text-green-400 hover:underline">Lihat Detail &rarr;</a>
                        </div>

                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                            <h4 class="text-lg font-semibold mb-2">Total Pengguna Terdaftar</h4>
                            <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                                {{ $totalUsersCount ?? 0 }}
                            </p>
                            <a href="{{ route('admin.users.index') }}" class="mt-3 inline-block text-sm text-blue-600 dark:text-blue-400 hover:underline">Kelola Pengguna &rarr;</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
