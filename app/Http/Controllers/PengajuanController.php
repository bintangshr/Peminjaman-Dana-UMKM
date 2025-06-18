<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse; // <-- DITAMBAHKAN
use Illuminate\Support\Facades\DB;   // <-- DITAMBAHKAN

class PengajuanController extends Controller
{
    /**
     * Menampilkan halaman status pengajuan untuk pengguna atau semua pengajuan untuk admin jika diakses dari /status.
     */
    public function showStatus(): View
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            // Admin bisa melihat semua jika mengakses /status.
            // Atau, jika Anda ingin halaman /status hanya untuk user, redirect admin ke admin.pengajuan.index
            // return redirect()->route('admin.pengajuan.index');
            $pengajuanItems = Pengajuan::orderBy('tgl_pengajuan', 'desc')->orderBy('created_at', 'desc')->paginate(10); // Contoh paginasi
        } else {
            // User biasa hanya melihat pengajuannya berdasarkan email
            $pengajuanItems = Pengajuan::where('email', $user->email)
                                        ->orderBy('tgl_pengajuan', 'desc')
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(10); // Contoh paginasi
        }
        return view('pinjaman.status', compact('pengajuanItems'));
    }

    /**
     * Menampilkan daftar semua pengajuan untuk Admin dengan paginasi.
     */
    public function indexAdmin(Request $request): View // Tambahkan Request untuk filter
    {
        $query = Pengajuan::orderBy('tgl_pengajuan', 'desc')->orderBy('created_at', 'desc');

        // Contoh implementasi filter status sederhana
        if ($request->has('status_filter') && $request->status_filter != '') {
            if ($request->status_filter == 'pending') { // Jika filter 'pending' mencakup beberapa status
                 $query->whereIn('status', ['pending_review', 'pending_detail_usaha']);
            } else {
                $query->where('status', $request->status_filter);
            }
        }

        $pengajuanItems = $query->paginate(10); // Ganti get() dengan paginate(), misal 10 item per halaman
        return view('admin.pengajuan.index', compact('pengajuanItems'));
    }

    /**
     * Menampilkan formulir data diri (tahap 1).
     */
    public function create(): View
    {
        return view('pinjaman.create');
    }

    /**
     * Menyimpan data diri (tahap 1) dan mengarahkan ke tahap 2.
     */
    public function storeDiri(Request $request)
    {
        $validatedData = $request->validate([
            'nid' => ['required', 'string', 'max:255', Rule::unique('pengajuan', 'nid')],
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'dusun' => 'required|string|in:BEJEN,BAREPAN,NGENTAK,BROJONALAN,GEDONGAN,SOROPADAN,TINGAL,JOWAHAN',
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'kk' => 'required|file|mimes:pdf|max:2048',
            'nominal' => 'required|numeric|min:0',
            'tujuan_pendanaan' => 'required|string|max:255',
        ]);

        $dataToSave = [
            'nid' => $validatedData['nid'],
            'nama' => $validatedData['nama'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'telepon' => $validatedData['telepon'],
            'email' => $validatedData['email'],
            'alamat' => $validatedData['alamat'],
            'dusun' => $validatedData['dusun'],
            'nominal' => $validatedData['nominal'],
            'tujuan_pendanaan' => $validatedData['tujuan_pendanaan'],
            'tgl_pengajuan' => now(),
            'status' => 'pending_detail_usaha',
            // 'user_id' => Auth::id(),
        ];

        if ($request->hasFile('ktp')) {
            $dataToSave['ktp_path'] = $request->file('ktp')->store('dokumen_pengajuan/ktp', 'public');
        }
        if ($request->hasFile('kk')) {
            $dataToSave['kk_path'] = $request->file('kk')->store('dokumen_pengajuan/kk', 'public');
        }

        $pengajuan = Pengajuan::create($dataToSave);

        return redirect()->route('pinjaman.createDetails', ['pengajuan_nid' => $pengajuan->nid])
                         ->with('success', 'Data diri berhasil disimpan. Silakan lengkapi detail usaha Anda.');
    }

    /**
     * Menampilkan formulir detail usaha dan pinjaman (tahap 2).
     */
    public function createDetails($pengajuan_nid): View
    {
        try {
            $pengajuan = Pengajuan::where('nid', $pengajuan_nid)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Data pengajuan tidak ditemukan.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Error di createDetails saat mengambil NID $pengajuan_nid: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            abort(500, 'Terjadi kesalahan pada server.');
        }
        return view('pinjaman.create_details', compact('pengajuan'));
    }

    /**
     * Menyimpan/Update detail usaha dan pinjaman (tahap 2).
     */
    public function storeDetails(Request $request, $pengajuan_nid)
    {
        $pengajuan = Pengajuan::where('nid', $pengajuan_nid)->firstOrFail();
        
        $validatedData = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'norek' => 'required|string|max:50',
            'bank' => 'required|string|max:100',
            'pemilik_rekening' => 'required|string|max:255',
            'tenor' => 'required|integer|min:1',
            'proposal' => 'sometimes|file|mimes:pdf|max:5120',
            'setuju' => 'required|accepted',
        ]);
        
        $dataToUpdate = [
            'nama_usaha' => $validatedData['nama_usaha'],
            'jenis_usaha' => $validatedData['jenis_usaha'],
            'norek' => $validatedData['norek'],
            'bank' => $validatedData['bank'],
            'pemilik_rekening' => $validatedData['pemilik_rekening'],
            'tenor' => $validatedData['tenor'],
            'status' => 'pending_review',
            'setuju' => true,
        ];

        if ($request->hasFile('proposal')) {
            if ($pengajuan->proposal_path && Storage::disk('public')->exists($pengajuan->proposal_path)) {
                Storage::disk('public')->delete($pengajuan->proposal_path);
            }
            $dataToUpdate['proposal_path'] = $request->file('proposal')->store('dokumen_pengajuan/proposal', 'public');
        }
        
        $pengajuan->update($dataToUpdate);

        return redirect()->route('pinjaman.status')->with('success', 'Pengajuan pinjaman Anda telah lengkap dan berhasil dikirim untuk direview!');
    }

    /**
     * Menampilkan form edit pengajuan untuk Admin.
     */
    public function editPengajuan(Pengajuan $pengajuan): View
    {
        return view('admin.pengajuan.edit', compact('pengajuan'));
    }

    /**
     * Memproses update pengajuan dari Admin.
     */
    public function updatePengajuan(Request $request, Pengajuan $pengajuan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nid' => ['required','string','max:255', Rule::unique('pengajuan', 'nid')->ignore($pengajuan->id)],
            'email' => 'required|email|max:255',
            'dusun' => 'required|string|in:BEJEN,BAREPAN,NGENTAK,BROJONALAN,GEDONGAN,SOROPADAN,TINGAL,JOWAHAN',
            'nominal' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending_detail_usaha,pending_review,approved,rejected,completed',
        ]);

        $pengajuan->update($validatedData);
        return redirect()->route('admin.pengajuan.index')->with('success', 'Data pengajuan berhasil diupdate.');
    }
    
    /**
     * Mengubah status pengajuan oleh Admin.
     */
    public function updateStatusPengajuan(Request $request, Pengajuan $pengajuan)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending_detail_usaha,pending_review,approved,rejected,completed',
        ]);
        $pengajuan->update(['status' => $validatedData['status']]);
        return redirect()->route('admin.pengajuan.index')->with('success', 'Status pengajuan berhasil diubah.');
    }

    /**
     * Menghapus pengajuan oleh Admin.
     */
    public function destroyPengajuan(Pengajuan $pengajuan)
    {
        if ($pengajuan->ktp_path && Storage::disk('public')->exists($pengajuan->ktp_path)) {
            Storage::disk('public')->delete($pengajuan->ktp_path);
        }
        if ($pengajuan->kk_path && Storage::disk('public')->exists($pengajuan->kk_path)) {
            Storage::disk('public')->delete($pengajuan->kk_path);
        }
        if ($pengajuan->proposal_path && Storage::disk('public')->exists($pengajuan->proposal_path)) {
            Storage::disk('public')->delete($pengajuan->proposal_path);
        }
        $pengajuan->delete();
        return redirect()->route('admin.pengajuan.index')->with('success', 'Data pengajuan berhasil dihapus.');
    }

    /**
     * Menyediakan data untuk chart berdasarkan dusun. (METODE BARU)
     */
    public function getApprovedByDusunData(): JsonResponse
    {
        $data = Pengajuan::whereIn('status', ['approved', 'completed'])
            ->select('dusun', DB::raw('count(*) as total'))
            ->groupBy('dusun')
            ->orderBy('dusun')
            ->get();

        // Mengambil label (dusun) dan data (total) dari hasil query
        $labels = $data->pluck('dusun');
        $data = $data->pluck('total');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    /**
     * Mengambil statistik pengajuan yang disetujui per dusun.
     */
    public function getStatistikPerDusun(): JsonResponse
    {
        $statistik = Pengajuan::select('dusun', DB::raw('count(*) as total'))
            ->whereIn('status', ['approved', 'completed'])
            ->groupBy('dusun')
            ->orderBy('dusun')
            ->get();

        $labels = $statistik->pluck('dusun')->toArray();
        $data = $statistik->pluck('total')->toArray();

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }
}