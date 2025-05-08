<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atribut yang bisa diisi (mass assignable).
     */
    protected $fillable = [
        'nama_lengkap',
        'nis',
        'nisn',
        'nip',
        'kelas',
        'jurusan',
        'email',
        'password',
        'opsi',
        'sekolah',
        'alamat',
        'foto',
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi (misalnya API).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang harus di-cast ke tipe tertentu.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi: User (guru) memiliki banyak absensi.
     */
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'guru_id');
    }

    /**
     * Relasi: User bisa memiliki banyak izin absensi.
     */
    public function izinAbsens()
    {
        return $this->hasMany(Izinabsen::class);
    }
}
