<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if your table name matches the pluralized model name)
    protected $table = 'absensis';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'foto',
        'waktu_absen',
        'latitude',
        'longitude',
        'status',
    ];

    // Define the relationship with the User model (assuming there is a User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optionally, you can define any custom casts or attributes for model attributes
    protected $casts = [
        'waktu_absen' => 'datetime', // ensure 'waktu_absen' is always cast to a datetime
    ];

    // Optionally, you can define a mutator for the 'foto' if you want to automatically store it in a particular way
    // For example, if you use a storage path for images, you can set a custom path when saving the 'foto'
}
