<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'nid';
    public $timestamps = false;

    protected $fillable = [
        'nid', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'telepon', 'alamat', 'email',
        'nominal', 'norek', 'pemilik_rekening', 'bank', 'nama_usaha', 'jenis_usaha', 'tujuan_pendanaan',
        'ktp', 'kk', 'proposal', 'setuju', 'status', 'tgl_pengajuan', 'tgl_pencairan', 'tgl_pengembalian', 'tenor'
    ];
}
