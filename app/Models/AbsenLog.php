<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenLog extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if your table name matches the pluralized model name)
    protected $table = 'absenlogs';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'absensi_id',
        'device',
        'ip',
        'keterangan',
    ];

    // Define the relationship with the Absensi model
    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}

