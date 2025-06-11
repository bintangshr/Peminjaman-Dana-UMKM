<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    // Jika NID adalah primary key Anda, uncomment dan sesuaikan:
    // protected $primaryKey = 'nid';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'nid',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'alamat',
        'email',
        'ktp_path',     // <--- PASTIKAN INI BENAR (BUKAN 'ktp')
        'kk_path',      // <--- PASTIKAN INI BENAR (BUKAN 'kk')
        'nominal',
        'norek',
        'pemilik_rekening',
        'bank',
        'nama_usaha',
        'jenis_usaha',
        'tujuan_pendanaan',
        'proposal_path',// <--- PASTIKAN INI BENAR (BUKAN 'proposal')
        'setuju',
        'status',
        'tgl_pengajuan',
        'tgl_pencairan',
        'tgl_pengembalian',
        'tenor',
        // 'user_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tgl_pengajuan' => 'date',
        'tgl_pencairan' => 'date',
        'tgl_pengembalian' => 'date',
        'setuju' => 'boolean',
        'nominal' => 'decimal:2',
    ];
}
