@extends('layouts.app') {{-- Atau layout utama Anda yang sudah bertema hijau --}}

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Status Pengajuan Dana Anda') }}
    </h2>
@endsection

@section('content')
<div class="py-8 sm:py-12 bg-gray-50 dark:bg-gray-900/50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 px-4 sm:px-0">
            <h3 class="text-2xl sm:text-3xl font-semibold text-white5 dark:text-white">Status Pengajuan Dana Anda</h3>
            <a href="{{ route('pinjaman.create') }}" class="mt-4 sm:mt-0 inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 border border-transparent rounded-lg shadow-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Ajukan Pinjaman Baru
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 mx-4 sm:mx-0 bg-green-50 dark:bg-green-800/30 border-l-4 border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 p-4 rounded-md shadow-lg" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-green-500 dark:text-green-400 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold">Berhasil!</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if($pengajuanItems->isEmpty())
            <div class="text-center py-16 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg mx-4 sm:mx-0">
                <svg class="mx-auto h-16 w-20 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-gray-200">Belum Ada Pengajuan</h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Anda belum memiliki riwayat pengajuan dana. <br class="sm:hidden">Mulai ajukan pinjaman untuk UMKM Anda sekarang.
                </p>
                
            </div>
        @else
            <div class="space-y-6">
                @foreach ($pengajuanItems as $item)
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden mx-4 sm:mx-0">
                    <div class="p-6 sm:p-8">
                        <div class="sm:flex sm:items-start sm:justify-between">
                            <div>
                                <div class="flex items-center">
                                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                        @if($item->status == 'approved' || $item->status == 'completed') bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100
                                        @elseif($item->status == 'rejected') bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100
                                        @elseif($item->status == 'pending_detail_usaha') bg-blue-100 text-blue-800 dark:bg-blue-700 dark:text-blue-100
                                        @else bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100 @endif"
                                        title="{{ $item->status == 'pending_detail_usaha' ? 'Silakan lengkapi detail usaha Anda' : ($item->status == 'pending_review' ? 'Pengajuan Anda sedang kami tinjau' : ucfirst(str_replace('_', ' ', $item->status))) }}">
                                        {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                                    </span>
                                    @if($item->status == 'pending_detail_usaha')
                                        <a href="{{ route('pinjaman.createDetails', ['pengajuan_nid' => $item->nid]) }}" class="ml-4 text-sm text-orange-500 hover:text-orange-700 dark:text-orange-400 dark:hover:text-orange-300 font-semibold flex items-center">
                                            Lanjutkan Pengisian
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                <h4 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white">{{ $item->nama_usaha ?? 'Pengajuan Dana' }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">NID: {{ $item->nid }}</p>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-6 flex-shrink-0">
                                <p class="text-2xl font-bold text-green-600 dark:text-green-400">Rp {{ number_format($item->nominal, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 text-right">Tenor: {{ $item->tenor ?? '-' }} bulan</p>
                            </div>
                        </div>
                        <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Pengajuan</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ \Carbon\Carbon::parse($item->tgl_pengajuan)->isoFormat('dddd, D MMMM YYYY') }}</dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Pemohon</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $item->nama }}</dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $item->email }}</dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Jenis Usaha</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $item->jenis_usaha ?? '-' }}</dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Dokumen Terlampir</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 space-x-3">
                                        @if($item->ktp_path)<a href="{{ Storage::url($item->ktp_path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" /></svg>KTP</a>@endif
                                        @if($item->kk_path)<a href="{{ Storage::url($item->kk_path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" /></svg>KK</a>@endif
                                        @if($item->proposal_path)<a href="{{ Storage::url($item->proposal_path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" /></svg>Proposal</a>@endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Paginasi jika $pengajuanItems adalah instance Paginator --}}
            @if($pengajuanItems->hasPages())
            <div class="mt-8 px-4 sm:px-0">
                {{ $pengajuanItems->links() }}
            </div>
            @endif
        @endif

        @if(!$pengajuanItems->isEmpty())
        <div class="mt-10 text-center pb-6">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-green-700 border border-transparent rounded-lg shadow-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
        @endif

    </div>
</div>
@endsection
