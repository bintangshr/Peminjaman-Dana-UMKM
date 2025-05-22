<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ ganti ini
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // ✅ ganti ini
{
    use Notifiable; // ✅ penting untuk notifikasi/verifikasi email

    protected $table = 'users';

    protected $fillable = [
        'email', 'name', 'address', 'idNumber', 'username', 'password', 'role'
    ];
}
