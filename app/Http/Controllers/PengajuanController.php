<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::all();
        return view('pengajuan.index', compact('pengajuan'));
    }
}
