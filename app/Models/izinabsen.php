<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinAbsen extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if your table name matches the pluralized model name)
    protected $table = 'izinabsens';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'tanggal',
        'status',
        'alasan',
        'bukti',
    ];

    // Define the relationship with the User model (assuming there is a User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optionally, you can define any custom casts or attributes for model attributes
    protected $casts = [
        'tanggal' => 'date', // ensure 'tanggal' is always cast to a date
    ];
}
