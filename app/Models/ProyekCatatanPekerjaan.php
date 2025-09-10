<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekCatatanPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'proyek_catatan_pekerjaan';

    protected $fillable = [
        'proyek_fitur_id',
        'user_id',
        'jenis',
        'catatan',
    ];

    // Relasi ke fitur
    public function proyekFitur()
    {
        return $this->belongsTo(ProyekFitur::class, 'proyek_fitur_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
