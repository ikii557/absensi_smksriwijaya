<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAbsen extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if your table name matches the pluralized model name)
    protected $table = 'jadwalabsens';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'nama_sesi',
        'waktu_mulai',
        'waktu_selesai',
    ];
}
