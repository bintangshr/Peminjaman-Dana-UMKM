@extends('layouts.admin') {{-- Pastikan menggunakan layout admin Anda --}}

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Manajemen Semua Pengajuan Dana') }}
    </h2>
@endsection

@section('content')
<div class="py-8 sm:py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 px-4"> {{-- max-w-full dan padding horizontal --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                    <h3 class="text-2xl sm:text-3xl font-semibold text-gray-800 dark:text-white">Daftar Semua Pengajuan Dana UMKM</h3>
                    {{-- Tambahkan tombol aksi global jika perlu, misal "Export Data" --}}
                </div>

                @if (session('success'))
                    <div class="mb-6 bg-green-50 dark:bg-green-800/30 border-l-4 border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 p-4 rounded-md shadow-lg" role="alert">
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

                {{-- Form Filter Status --}}
                <div class="mb-6">
                    <form method="GET" action="{{ route('admin.pengajuan.index') }}">
                        <div class="flex flex-col sm:flex-row items-end space-y-2 sm:space-y-0 sm:space-x-3">
                            <div>
                                <label for="status_filter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Filter Status:</label>
                                <select name="status_filter" id="status_filter" class="block w-full sm:w-auto rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                                    <option value="">Semua Status</option>
                                    <option value="pending_detail_usaha" {{ request('status_filter') == 'pending_detail_usaha' ? 'selected' : '' }}>Pending Detail Usaha</option>
                                    <option value="pending_review" {{ request('status_filter') == 'pending_review' ? 'selected' : '' }}>Pending Review</option>
                                    <option value="approved" {{ request('status_filter') == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ request('status_filter') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="completed" {{ request('status_filter') == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                Filter
                            </button>
                        </div>
                    </form>
                </div>

                <div class="overflow-x-auto mt-6 align-middle inline-block min-w-full shadow-lg sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-green-700 dark:bg-green-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tgl Pengajuan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Pemohon</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Dusun</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Usaha</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">Nominal (Rp)</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Dokumen</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($pengajuanItems as $item)
                                <tr class="{{ $loop->even ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-white dark:bg-gray-800' }} hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $pengajuanItems->firstItem() + $loop->index }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($item->tgl_pengajuan)->isoFormat('D MMM YY, HH:mm') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $item->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $item->dusun }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $item->nama_usaha ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 text-right">{{ number_format($item->nominal, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        <form action="{{ route('admin.pengajuan.updateStatus', $item->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" 
                                                    class="text-xs p-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 rounded-md shadow-sm 
                                                        @if($item->status == 'approved' || $item->status == 'completed') bg-green-100 text-green-800 dark:bg-green-600 dark:text-green-100
                                                        @elseif($item->status == 'rejected') bg-red-100 text-red-800 dark:bg-red-600 dark:text-red-100
                                                        @elseif($item->status == 'pending_detail_usaha') bg-blue-100 text-blue-800 dark:bg-blue-600 dark:text-blue-100
                                                        @else bg-yellow-100 text-yellow-800 dark:bg-yellow-600 dark:text-yellow-100 @endif">
                                                <option value="pending_detail_usaha" {{ $item->status == 'pending_detail_usaha' ? 'selected' : '' }}>Pending Detail</option>
                                                <option value="pending_review" {{ $item->status == 'pending_review' ? 'selected' : '' }}>Pending Review</option>
                                                <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Setujui</option>
                                                <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Tolak</option>
                                                <option value="completed" {{ $item->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                        @if($item->ktp_path)<a href="{{ Storage::url($item->ktp_path) }}" target="_blank" class="text-indigo-500 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.022 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>KTP</a>@endif
                                        @if($item->kk_path)<a href="{{ Storage::url($item->kk_path) }}" target="_blank" class="text-indigo-500 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.022 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>KK</a>@endif
                                        @if($item->proposal_path)<a href="{{ Storage::url($item->proposal_path) }}" target="_blank" class="text-indigo-500 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.022 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" /></svg>Proposal</a>@endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('admin.pengajuan.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 inline-flex items-center px-3 py-1.5 border border-blue-500 dark:border-blue-700 rounded-md text-xs hover:bg-blue-50 dark:hover:bg-blue-700/50">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.pengajuan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini? Ini tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 inline-flex items-center px-3 py-1.5 border border-red-500 dark:border-red-700 rounded-md text-xs hover:bg-red-50 dark:hover:bg-red-700/50">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-6 py-8 whitespace-nowrap text-lg text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                            </svg>
                                            Belum ada data pengajuan dana.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Paginasi --}}
                @if($pengajuanItems->hasPages())
                <div class="mt-8 px-2">
                    {{ $pengajuanItems->appends(request()->query())->links() }} {{-- Menambahkan parameter filter ke link paginasi --}}
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection