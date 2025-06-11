@extends('layouts.app') {{-- Atau layout yang sesuai, misal layouts.admin --}}

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Detail Usaha dan Pinjaman') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 md:p-8 bg-white dark:bg-gray-800">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-2 text-center">Formulir Detail Usaha & Pinjaman</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 text-center">
                    NID Pengajuan: {{ $pengajuan->nid }} - Pemohon: {{ $pengajuan->nama }}
                </p>

                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Oops! Ada kesalahan:</strong>
                        <ul class="mt-1 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="PengajuanDetailForm" action="{{ route('pinjaman.storeDetails', ['pengajuan_nid' => $pengajuan->nid]) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nama_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama Usaha Yang Diajukan</label>
                        <input type="text" id="nama_usaha" name="nama_usaha" value="{{ old('nama_usaha', $pengajuan->nama_usaha) }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="jenis_usaha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Jenis Usaha</label>
                        <select id="jenis_usaha" name="jenis_usaha" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">- Pilih Jenis Usaha -</option>
                            <option value="kuliner" {{ old('jenis_usaha', $pengajuan->jenis_usaha) == 'kuliner' ? 'selected' : '' }}>Usaha Kuliner</option>
                            <option value="furnitur" {{ old('jenis_usaha', $pengajuan->jenis_usaha) == 'furnitur' ? 'selected' : '' }}>Furnitur dan Peralatan Rumah Tangga</option>
                            <option value="pakaian" {{ old('jenis_usaha', $pengajuan->jenis_usaha) == 'pakaian' ? 'selected' : '' }}>Pakaian dan Souvenir</option>
                            <option value="perkebunan" {{ old('jenis_usaha', $pengajuan->jenis_usaha) == 'perkebunan' ? 'selected' : '' }}>Perkebunan</option>
                        </select>
                    </div>

                    <div>
                        <label for="tujuan_pendanaan" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tujuan Pendanaan</label>
                        <select id="tujuan_pendanaan" name="tujuan_pendanaan" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">- Pilih Tujuan -</option>
                            <option value="modal" {{ old('tujuan_pendanaan', $pengajuan->tujuan_pendanaan) == 'modal' ? 'selected' : '' }}>Modal Usaha</option>
                            <option value="pengembangan" {{ old('tujuan_pendanaan', $pengajuan->tujuan_pendanaan) == 'pengembangan' ? 'selected' : '' }}>Mengembangkan Usaha</option>
                            <option value="investasi" {{ old('tujuan_pendanaan', $pengajuan->tujuan_pendanaan) == 'investasi' ? 'selected' : '' }}>Investasi</option>
                        </select>
                    </div>

                    <div>
                        <label for="nominal" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Ekspektasi Nominal Pendanaan (Rp)</label>
                        <input type="number" id="nominal" name="nominal" value="{{ old('nominal', $pengajuan->nominal) }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="norek" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nomor Rekening Tujuan</label>
                        <input type="text" id="norek" name="norek" value="{{ old('norek', $pengajuan->norek) }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="bank" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama Bank</label>
                        <select id="bank" name="bank" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">- Pilih Bank -</option>
                            <option value="BCA" {{ old('bank', $pengajuan->bank) == 'BCA' ? 'selected' : '' }}>BCA</option>
                            <option value="BNI" {{ old('bank', $pengajuan->bank) == 'BNI' ? 'selected' : '' }}>BNI</option>
                            <option value="Mandiri" {{ old('bank', $pengajuan->bank) == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                            <option value="BRI" {{ old('bank', $pengajuan->bank) == 'BRI' ? 'selected' : '' }}>BRI</option>
                            <option value="BSI" {{ old('bank', $pengajuan->bank) == 'BSI' ? 'selected' : '' }}>BSI</option>
                            <option value="BTN" {{ old('bank', $pengajuan->bank) == 'BTN' ? 'selected' : '' }}>BTN</option>
                        </select>
                    </div>

                    <div>
                        <label for="pemilik_rekening" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama Pemilik Rekening</label>
                        <input type="text" id="pemilik_rekening" name="pemilik_rekening" value="{{ old('pemilik_rekening', $pengajuan->pemilik_rekening) }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="tenor" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Durasi Tenor</label>
                        <select id="tenor" name="tenor" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">- Pilih Tenor -</option>
                            <option value="3" {{ old('tenor', $pengajuan->tenor) == '3' ? 'selected' : '' }}>3 bulan</option>
                            <option value="6" {{ old('tenor', $pengajuan->tenor) == '6' ? 'selected' : '' }}>6 bulan</option>
                            <option value="12" {{ old('tenor', $pengajuan->tenor) == '12' ? 'selected' : '' }}>1 tahun (12 bulan)</option>
                            {{-- Jika ada tenor lain, misalnya 24 untuk 2 tahun --}}
                        </select>
                    </div>

                    <div>
                        <label for="proposal" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Proposal Bisnis UMKM (PDF)</label>
                        <input type="file" id="proposal" name="proposal" accept=".pdf" {{ $pengajuan->proposal_path ? '' : 'required' }} class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        @if($pengajuan->proposal_path)
                        <p class="text-xs text-gray-500 mt-1">Proposal sudah diunggah: <a href="{{ Storage::url($pengajuan->proposal_path) }}" target="_blank" class="text-indigo-500 hover:underline">Lihat Proposal</a>. Unggah file baru untuk mengganti.</p>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label for="setuju" class="inline-flex items-center">
                            <input type="checkbox" id="setuju" name="setuju" required class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Dengan ini, saya menyatakan bahwa data yang saya isi dalam formulir ini adalah benar...</span>
                        </label>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Kirim Pengajuan Lengkap
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection