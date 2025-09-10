<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekFiturUser extends Model
{
    use HasFactory;

    protected $table = 'proyek_fitur_user';

    protected $fillable = [
        'proyek_fitur_id',
        'user_id',
        'keterangan',
    ];

    // Relasi ke ProyekFitur
    public function proyekFitur()
    {
        return $this->belongsTo(ProyekFitur::class, 'proyek_fitur_id');
    }

    // Relasi ke User (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
