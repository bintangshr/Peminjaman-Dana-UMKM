@extends('layouts.app') {{-- Atau layout lain yang sesuai --}}

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Formulir Pengajuan Dana UMKM') }}
        <link rel="stylesheet" href="datadiri.css">
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 md:p-8 bg-white dark:bg-gray-800">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 text-center">Formulir Pengajuan Dana UMKM</h1>
                
                {{-- Tampilkan error validasi jika ada --}}
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

                <form id="PengajuanForm" action="{{ route('pinjaman.storeDiri') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                    @csrf {{-- CSRF Token Laravel --}}

                    {{-- NID --}}
                    <div>
                        <label for="nid" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nomor Identitas (NID/NIK)</label>
                        <input type="text" id="nid" name="nid" value="{{ old('nid') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    {{-- Nama Lengkap --}}
                    <div>
                        <label for="nama" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Jenis Kelamin</label>
                        <div class="mt-2 space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }} required class="text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-offset-gray-800">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }} required class="text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-offset-gray-800">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Perempuan</span>
                            </label>
                        </div>
                    </div>
                    
                    {{-- Tempat Lahir --}}
                    <div>
                        <label for="tempat_lahir" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>
                    
                    {{-- Tanggal Lahir --}}
                    <div>
                        <label for="tanggal_lahir" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    {{-- Alamat Domisili --}}
                    <div>
                        <label for="alamat" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Alamat Domisili</label>
                        <textarea id="alamat" name="alamat" rows="3" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('alamat') }}</textarea>
                    </div>

                    {{-- Dusun --}}
                    <div>
                        <label for="dusun" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Dusun</label>
                        <select id="dusun" name="dusun" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">- Pilih Dusun -</option>
                            <option value="BEJEN" {{ old('dusun') == 'BEJEN' ? 'selected' : '' }}>BEJEN</option>
                            <option value="BAREPAN" {{ old('dusun') == 'BAREPAN' ? 'selected' : '' }}>BAREPAN</option>
                            <option value="NGENTAK" {{ old('dusun') == 'NGENTAK' ? 'selected' : '' }}>NGENTAK</option>
                            <option value="BROJONALAN" {{ old('dusun') == 'BROJONALAN' ? 'selected' : '' }}>BROJONALAN</option>
                            <option value="GEDONGAN" {{ old('dusun') == 'GEDONGAN' ? 'selected' : '' }}>GEDONGAN</option>
                            <option value="SOROPADAN" {{ old('dusun') == 'SOROPADAN' ? 'selected' : '' }}>SOROPADAN</option>
                            <option value="TINGAL" {{ old('dusun') == 'TINGAL' ? 'selected' : '' }}>TINGAL</option>
                            <option value="JOWAHAN" {{ old('dusun') == 'JOWAHAN' ? 'selected' : '' }}>JOWAHAN</option>
                        </select>
                    </div>
                    
                    {{-- Email Pemohon --}}
                     <div>
                        <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email Pemohon</label>
                        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>
                    
                    {{-- Nomor Telepon --}}
                    <div>
                        <label for="telepon" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                        <input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    </div>

                    {{-- KTP Pemohon --}}
                    <div>
                        <label for="ktp" class="block font-medium text-sm text-gray-700 dark:text-gray-300">KTP Pemohon (PDF)</label>
                        <input type="file" id="ktp" name="ktp" accept=".pdf" required class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>

                    {{-- Kartu Keluarga Pemohon --}}
                    <div>
                        <label for="kk" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Kartu Keluarga Pemohon (PDF)</label>
                        <input type="file" id="kk" name="kk" accept=".pdf" required class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>

                    {{-- Tambahkan input untuk field lain dari model Pengajuan jika diperlukan di tahap ini --}}
                    {{-- Misal: Nominal, Tujuan Pendanaan, dll. --}}
                     <div>
                        <label for="nominal" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nominal Pinjaman (Rp)</label>
                        <input type="number" id="nominal" name="nominal" value="{{ old('nominal') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Contoh: 5000000">
                    </div>

                    <div>
                        <label for="tujuan_pendanaan" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tujuan Pendanaan</label>
                        <textarea id="tujuan_pendanaan" name="tujuan_pendanaan" rows="3" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('tujuan_pendanaan') }}</textarea>
                    </div>


                    <div class="mt-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Ajukan Pinjaman
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection